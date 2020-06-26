<?php

namespace App\Exports;

use App\Siswa;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\FromQuery;
use Maatwebsite\Excel\Concerns\WithEvents;
use Maatwebsite\Excel\Events\AfterSheet;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;


class SiswaExport implements WithHeadings, FromQuery, WithEvents, ShouldAutoSize
{
    /**
    * @return \Illuminate\Support\Collection
    */

 
    
    public function __construct(string $aktif)
    {
        $this->aktif = $aktif;
    }

    public function query()
    {
        return Siswa::query()->select('nis','nama','kelas')->where('aktif',$this->aktif);
    }

    public function registerEvents(): array
    {
        return [
            AfterSheet::class    => function(AfterSheet $event) {
                $cellRange = 'A1:C1'; // All headers
                $event->sheet->getDelegate()->getStyle($cellRange)->getFont()->setSize(13);
                
            },
        ];
    }

    public function headings(): array
    {
        return [
            'Nis',
            'Nama',
            'Kelas',
        ];
    }
}
