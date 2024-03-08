<?php

namespace App\Imports;

use App\Models\Laptop;
use Illuminate\Support\Str;
use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\ToCollection;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Maatwebsite\Excel\Concerns\WithMultipleSheets;

class LaptopImport implements ToCollection, WithHeadingRow, WithMultipleSheets
{
    public function sheets(): array
    {
        return [
            2 => new LaptopImport(),
        ];
    }

    public function collection(Collection $collection)
    {
        foreach ($collection as $row) {
            if ($row['remote'] == null) {
                $remote = "-";
            } else {
                $remote = $row['remote'];
            }

            $findLaptop = Laptop::select('sn')->withTrashed()->where('sn', $row['sn'])->get();
            if (count($findLaptop) == 0) {
                $penyimpanan = $row['penyimpanan']. " " . $row['kapasitas'];
                $garansi = date("Y-m-d",($row['garansi'] - 25569) * 86400);

                if (Str::lower($row['status']) == 'penyerahan') $status = 1;
                if (Str::lower($row['status']) == 'rotasi') $status = 2;
                if (Str::lower($row['status']) == 'kembali') $status = 3;

                Laptop::create([
                    'sn' => Str::upper($row['sn']),
                    'tipe' => Str::upper($row['tipe']),
                    'merek' => Str::upper($row['merek']),
                    'garansi' => $garansi,
                    'processor' => Str::upper($row['processor']),
                    'ram' => $row['ram'],
                    'penyimpanan' => $penyimpanan,
                    'remote' => Str::upper($remote),
                    'status' => $status,
                ]);
            } else {
                continue;
            }
        }
    }
}
