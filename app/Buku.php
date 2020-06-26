<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Buku extends Model
{
  protected $table = 'buku';
  protected $fillable = ['judul', 'jenis', 'pengarang', 'penerbit', 'thn_terbit', 'sumber', 'harga', 'gambar', 'keterangan', 'sinopsis','jumlah'];

  public function getGambar() {
    if(!$this -> gambar) {
      return asset('images/default.jpg');
    }

    return asset('images/'.$this->gambar);
  }

  public function siswa() {
    return $this -> belongsToMany(Siswa::class) -> withPivot(['denda']);
  }
}
