<?php

namespace App\Imports;

use App\Models\Unit;
use App\Models\Pegawai;
use Illuminate\Support\Str;
use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\ToCollection;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Maatwebsite\Excel\Concerns\WithMultipleSheets;

class PegawaiImport implements ToCollection, WithHeadingRow, WithMultipleSheets
{
    public $data = [];

    public function sheets(): array
    {
        return [
            1 => new PegawaiImport(),
        ];
    }

    public function collection(Collection $collection)
    {
        foreach ($collection as $row) {
            $findPegawai = Pegawai::select('nip')->withTrashed()->where('nip', $row['nip'])->get();
            $idUnit = Unit::select('id')->withTrashed()->where('nama_unit', $row['unit'])->get();
            if (count($findPegawai) == 0 and count($idUnit) == 1) {
                $status = (Str::lower($row['status']) == 'aktif') ? 1 : 2;
                Pegawai::create([
                    'nip' => Str::upper($row['nip']),
                    'nama_pegawai' => Str::upper($row['nama']),
                    'status_pegawai' => $status,
                    'unit_id' => $idUnit[0]['id'],
                ]);
            } else {
                array_push($this->data, $row['nip']);
                continue;
            }
        }
    }
}
