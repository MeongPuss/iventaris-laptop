<?php

namespace App\Imports;

use App\Models\Unit;
use Illuminate\Support\Str;
use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\ToCollection;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Maatwebsite\Excel\Concerns\WithMultipleSheets;

class UnitImport implements ToCollection, WithHeadingRow, WithMultipleSheets
{
    public function sheets(): array
    {
        return [
            0 => new UnitImport(),
        ];
    }

    public function collection(Collection $collection)
    {
        foreach ($collection as $row) {
            $findUnit = Unit::select('nama_unit')->withTrashed()->where('nama_unit', $row['unit'])->get();
            if (count($findUnit) == 0) {
                Unit::create([
                    'nama_unit' => Str::upper($row['unit']),
                ]);
            } else {
                continue;
            }
        }
    }
}
