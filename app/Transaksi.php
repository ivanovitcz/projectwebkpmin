<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Transaksi extends Model
{
  protected $table = 'buku_siswa';
  protected $fillable = ['siswa_id', 'buku_id', 'tanggal_pinjam','tanggal_kembali','denda','Keterangan'];

  
}
