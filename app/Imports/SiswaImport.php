<?php

namespace App\Imports;

use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\ToCollection;
use App\Siswa;
class SiswaImport implements ToCollection
{
    /**
    * @param Collection $collection
    */
    public function collection(Collection $collection)
    {
      foreach($collection as $key => $row) {
        if($key >=2) {
          Siswa::create([
            'nis' => sprintf('%d',$row[0]),
            'nama' => $row[1],
            'kelas' => $row[2],
            'aktif' => 'Aktif',
          ]);
        }
      }
    }
}
