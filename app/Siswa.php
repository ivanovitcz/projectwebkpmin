<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Siswa extends Model
{
    protected $table = 'siswa';
    protected $fillable = ['nama', 'nis', 'kelas','aktif'];

    public function buku() {
      return $this -> belongsToMany(Buku::class) -> withPivot(['denda']);
    }
}
