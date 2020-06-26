<?php

namespace App\Exports;

use App\Buku;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\FromQuery;
use Maatwebsite\Excel\Concerns\WithEvents;
use Maatwebsite\Excel\Events\AfterSheet;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;

class Bukuxport implements WithHeadings, FromQuery, WithEvents, ShouldAutoSize
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function __construct(string $jenis)
    {
        $this->jenis = $jenis;
    }

    public function query()
    {
        return Buku::query()->select('judul','pengarang','penerbit','thn_terbit','jumlah','sumber','harga','keterangan')->where('jenis',$this->jenis);
    }

    public function registerEvents(): array
    {
        return [
            AfterSheet::class    => function(AfterSheet $event) {
                $cellRange = 'A1:H1'; // All headers
                $event->sheet->getDelegate()->getStyle($cellRange)->getFont()->setSize(13);
                
            },
        ];
    }

    public function headings(): array
    {
        return [
            'Judul',
            'Pengarang',
            'Penerbit',
            'Tahun Terbit',
            'Jumlah Buku',
            'Sumber',
            'Harga',
            'Keterangan',
        ];
    }
}
