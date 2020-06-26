<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Denda extends Model
{
  protected $table = 'denda';
  protected $fillable = ['hari', 'bayar'];

}
