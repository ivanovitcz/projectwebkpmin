<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ApiController extends Controller
{
    public function editjumlah(Request $request, $id) {
      $buku = \App\Buku::find($id);
      $buku -> update(['jumlah' => $request -> value]);
    }
}
