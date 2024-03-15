<?php

namespace App\Exports;

use App\Models\HistoryLaptop;
use Maatwebsite\Excel\Concerns\FromQuery;
use Maatwebsite\Excel\Concerns\WithMapping;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\Exportable;

class HistoryLaptopsExport implements FromQuery, WithMapping, WithHeadings
{
    use Exportable;

    public function headings(): array
    {
        return[
            '#',
            'NIP',
            'Nama',
            'SN Laptop',
            'Merek Laptop',
            'Tanggal Penyerahan',
            'Tanggal Rotasi',
            'Tanggal Pengembalian',
            'Status',
            'BA'
        ];
    }

    public function map($historyLaptop): array
    {
        if($historyLaptop->status == 1) {
            $status = 'Penyerahan';
        }

        if($historyLaptop->status == 2) {
            $status = 'Rotasi';
        }

        if($historyLaptop->status == 3) {
            $status = 'Pengembalian';
        }

         return[
             $historyLaptop->id,
             $historyLaptop->pegawais[0]['nip'],
             $historyLaptop->pegawais[0]['nama_pegawai'],
             $historyLaptop->laptops[0]['sn'],
             $historyLaptop->laptops[0]['merek'],
             $historyLaptop->penyerahan,
             $historyLaptop->rotasi,
             $historyLaptop->kembali,
             $status,
             $historyLaptop->ba,
         ];
    }

    public function query()
    {
        return HistoryLaptop::with(['pegawais:id,nip,nama_pegawai', 'laptops:id,sn,merek']);
    }
}
