<?php

namespace App\Imports;

use App\Models\Unit;
use App\Models\Laptop;
use App\Models\Pegawai;
use Illuminate\Support\Str;
use App\Models\HistoryLaptop;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Session;
use Maatwebsite\Excel\Concerns\SkipsEmptyRows;
use Maatwebsite\Excel\Concerns\ToCollection;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Maatwebsite\Excel\Concerns\WithMultipleSheets;

class HistoryLaptopImport implements ToCollection, WithHeadingRow, WithMultipleSheets, SkipsEmptyRows
{
    public function sheets(): array
    {
        return [
            3 => new HistoryLaptopImport(),
        ];
    }

    public function collection(Collection $collection)
    {
        $historyLaptop = request()->input('save');
        if($historyLaptop == 'penyerahan') {
            $this->penyerahan($collection);
        } elseif ($historyLaptop == 'rotasi') {
            $this->rotasi($collection);
        } elseif ($historyLaptop == 'pengembalian') {
            $this->pengembalian($collection);
        } else {
            return redirect()->route('history-laptop.index');
        }
    }

    public function penyerahan($collection)
    {
        $i = 0;
        $imageI = 0;
        foreach ($collection as $row) {
            $validateQuery = $this->validateQuery($row);

            $dirImage = $row['ba'];
            $extension = explode('.', $dirImage);

            $image = $this->image($dirImage, $validateQuery[0][0]['sn'], $validateQuery[1][0]['nip'], ++$imageI, "peyerahan");
            if (Str::lower($extension[1]) == 'jpg' or Str::lower($extension[1]) == 'jpeg' or Str::lower($extension[1]) == 'png') {
                $image;
            } else {
                $i++;
                break;
            }
            if (count($validateQuery[0]) == 1 and count($validateQuery[1]) == 1 and count($validateQuery[2]) == 1 and $row['penyerahan'] != null) {
                if (Str::lower($row['status']) == 'penyerahan') $status = 1;
                HistoryLaptop::create([
                    'ba' => $image,
                    'unit' => $validateQuery[2][0]['nama_unit'],
                    'penyerahan' => date("Y-m-d", ($row['penyerahan'] - 25569) * 86400),
                    'status' => $status,
                    'laptop_id' => $validateQuery[0][0]['id'],
                    'pegawai_id' => $validateQuery[1][0]['id'],
                ]);

                Laptop::findOrFail($validateQuery[0][0]['id'])->update([
                    'status' => $status
                ]);

                $i++;
            } else {
                $i++;
                break;
            }
        }

        if (count($collection) != $i) {
            Session::flash('error', "Import data penyerahan laptop terdapat kesalahan pada baris ke-$i");
        } else {
            Session::flash('success', "Import data penyerahan laptop berhasil");
        }
    }

    public function rotasi($collection)
    {
        $i = 0;
        foreach ($collection as $row) {
            $validateQuery = $this->validateQuery($row);

            if (count($validateQuery[0]) == 1 and count($validateQuery[1]) == 1 and count($validateQuery[2]) == 1 and $row['rotasi'] != null) {
                if (Str::lower($row['status']) == 'rotasi') $status = 2;
                $historyLaptop = HistoryLaptop::select('penyerahan')->where('laptop_id', $validateQuery[0][0]['id'])->whereNull('rotasi')->get();
                HistoryLaptop::create([
                    'unit' => $validateQuery[2][0]['nama_unit'],
                    'rotasi' => date("Y-m-d", ($row['rotasi'] - 25569) * 86400),
                    'penyerahan' => $historyLaptop[0]['penyerahan'],
                    'status' => $status,
                    'laptop_id' => $validateQuery[0][0]['id'],
                    'pegawai_id' => $validateQuery[1][0]['id'],
                ]);

                Laptop::findOrFail($validateQuery[0][0]['id'])->update([
                    'status' => $status
                ]);

                $i++;
            } else {
                $i++;
                break;
            }
        }

        if (count($collection) != $i) {
            Session::flash('error', "Import data rotasi laptop terdapat kesalahan pada baris ke-$i");
        } else {
            Session::flash('success', "Import data rotasi laptop berhasil");
        }
    }

    public function pengembalian($collection)
    {
        $i = 0;
        $imageI = 0;
        foreach ($collection as $row) {
            $validateQuery = $this->validateQuery($row);

            $dirImage = $row['ba'];
            $extension = explode('.', $dirImage);

            $image = $this->image($dirImage, $validateQuery[0][0]['sn'], $validateQuery[1][0]['nip'], ++$imageI, "kembali");
            if (Str::lower($extension[1]) == 'jpg' or Str::lower($extension[1]) == 'jpeg' or Str::lower($extension[1]) == 'png') {
                $image;
            } else {
                $i++;
                break;
            }

            if (count($validateQuery[0]) == 1 and count($validateQuery[1]) == 1 and count($validateQuery[2]) == 1 and $row['kembali'] != null) {
                if (Str::lower($row['status']) == 'kembali') $status = 3;
                $historyLaptop = HistoryLaptop::select('penyerahan', 'rotasi')->where('sn', $validateQuery[0][0]['sn'])->whereNull('kembali')->get();
                HistoryLaptop::create([
                    'ba' => $image,
                    'unit' => $validateQuery[2][0]['nama_unit'],
                    'penyerahan' => $historyLaptop[0]['penyerahan'],
                    'rotasi' => $historyLaptop[0]['rotasi'],
                    'kembali' => date("Y-m-d", ($row['kembali'] - 25569) * 86400),
                    'status' => $status,
                    'laptop_id' => $validateQuery[0][0]['id'],
                    'pegawai_id' => $validateQuery[1][0]['id'],
                ]);

                Laptop::findOrFail($validateQuery[0][0]['id'])->update([
                    'status' => $status
                ]);

                $i++;
            } else {
                $i++;
                break;
            }
        }

        if (count($collection) != $i) {
            Session::flash('error', "Import data pengembalian laptop terdapat kesalahan pada baris ke-$i");
        } else {
            Session::flash('success', "Import data pengembalian laptop berhasil");
        }
    }

    public function validateQuery($row)
    {
        $sn = Laptop::select('id', 'sn')->where('sn', $row['sn_laptop'])->get();
        $nip = Pegawai::select('id', 'nip')->where('nip', $row['nip_pegawai'])->get();
        $unit = Unit::select('id', 'nama_unit')->where('nama_unit', $row['unit'])->get();

        return [$sn, $nip, $unit];
    }

    public function image(string $ba, string $sn, string $nip, int $i, string $status)
    {
        $path = 'file:///' . $ba;

        $img = public_path('assets/images/temp/temp.png');

        $local = public_path('assets/images/temp');
        $toDir = public_path('assets/images/ba');

        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $path);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        $output = curl_exec($ch);
        curl_close($ch);
        //ganti file image dengan image baru
        file_put_contents($img, $output);

        $files = array_values(array_diff(scandir($local), array('..', '.')));
        //ambil extension file image
        $extension = explode('.', $files[0]);
        //lakukan proses copy image
        $nameImage = $status . "-" .$nip . "-" . $sn . "-" . Str::random(10) . time() . $i . "." . $extension[1];
        copy("$local/$files[0]", "$toDir/$nameImage");

        return $nameImage;
    }

    // public function collection(Collection $collection)
    // {
    //     //load file excel
    //     $spreadsheet = IOFactory::load(request()->file('file'));
    //     $i = 0;
    //     //lakukan perulangan data dari excel yang diambil dari parameter collection
    //     foreach ($collection as $key => $value) {
    //         //ambil gambar dari variabel $spreadsheet
    //         $drawing = $spreadsheet->getActiveSheet()->getDrawingCollection()[$key];
    //         if ($drawing instanceof MemoryDrawing) {
    //             ob_start();
    //             call_user_func(
    //                 $drawing->getRenderingFunction(),
    //                 $drawing->getImageResource()
    //             );
    //             $imageContents = ob_get_contents();
    //             ob_end_clean();
    //             switch ($drawing->getMimeType()) {
    //                 case MemoryDrawing::MIMETYPE_PNG:
    //                     $extension = 'png';
    //                     break;
    //                 case MemoryDrawing::MIMETYPE_JPEG:
    //                     $extension = 'jpg';
    //                     break;
    //             }
    //         } else {
    //             //get image
    //             $zipReader = fopen($drawing->getPath(), 'r');
    //             $imageContents = '';
    //             while (!feof($zipReader)) {
    //                 $imageContents .= fread($zipReader, 1024);
    //             }
    //             fclose($zipReader);
    //             $extension = $drawing->getExtension();
    //         }

    //         //get data laptop dan pegawai
    //         $snLaptop = Laptop::select('id', 'sn')->withTrashed()->where('sn', $value['sn_laptop'])->get();
    //         $nipPegawai = Pegawai::select('id', 'nip')->withTrashed()->where('nip', $value['nip_pegawai'])->get();
    //         $unit = Unit::select('id', 'nama_unit')->withTrashed()->where('nama_unit', $value['unit'])->get();

    //         //rename foto
    //         $myFileName = $nipPegawai[0]['nip']. "-". $snLaptop[0]['sn']. "-" . time() . ++$i . '.' . $extension;
    //         file_put_contents(public_path('assets/images/ba/') . $myFileName, $imageContents);

    //         if (count($snLaptop) == 1 and count($nipPegawai) == 1 and count($unit) == 1) {
    //             $kembali = ($value['kembali'] == "-") ? null : date("Y-m-d",($value['kembali'] - 25569) * 86400);
    //             $rotasi = ($value['rotasi'] == "-") ? null : date("Y-m-d",($value['rotasi'] - 25569) * 86400);
    //             $penyerahan = ($value['penyerahan'] == "-") ? null : date("Y-m-d",($value['penyerahan'] - 25569) * 86400);
    //             //lakukan proses simpan data ke dalam database
    //             HistoryLaptop::create([
    //             'ba' => $myFileName,
    //             'unit' => $unit[0]['nama_unit'],
    //             'kembali' => $kembali,
    //             'rotasi' => $rotasi,
    //             'penyerahan' => $penyerahan,
    //             'status' => $value['status'],
    //             'laptop_id' => $snLaptop[0]['id'],
    //             'pegawai_id' => $nipPegawai[0]['id'],
    //         ]);
    //     } else {
    //         array_push($this->data, $unit[0]['nama_unit'], $snLaptop[0]['sn'], $nipPegawai[0]['nip']);
    //         continue;
    //     }
    //     }
    // }
}
