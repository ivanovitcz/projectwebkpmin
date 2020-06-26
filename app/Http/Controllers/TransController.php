<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TransController extends Controller
{
    public function index() {

        $data_trans = \App\Transaksi::where('Keterangan','Pinjam') -> paginate(5);
        $data_siswa = \App\Siswa::all();
        $data_buku = \App\Buku::all();

      return view('transaksi.index', ['data_trans' => $data_trans,'data_siswa' => $data_siswa, 'data_buku' => $data_buku]);
    }

    public function semua() {

      $data_trans = \App\Transaksi::where('Keterangan','Kembali') -> paginate(5);
      $data_siswa = \App\Siswa::all();
      $data_buku = \App\Buku::all();

      return view('transaksi.semua', ['data_trans' => $data_trans,'data_siswa' => $data_siswa, 'data_buku' => $data_buku]);
    }
    public function transaksi(Request $request) {

      $data_trans = \App\Transaksi::whereMonth('tanggal_pinjam', $request -> bulan)->whereYear('tanggal_pinjam', $request -> tahun)->get();
      $data_siswa = \App\Siswa::all();
      $data_buku = \App\Buku::all();
      $denda = \App\Denda::all();
      //dd($request -> all());
      return view('laporan.transaksi', ['denda' => $denda,'data_trans' => $data_trans,'data_siswa' => $data_siswa, 'data_buku' => $data_buku]);
    }
    public function semuatransaksi() {

      $data_trans = \App\Transaksi::all();
      $data_siswa = \App\Siswa::all();
      $data_buku = \App\Buku::all();
      $denda = \App\Denda::all();
      //dd($request -> all());
      return view('laporan.transaksi', ['denda' => $denda,'data_trans' => $data_trans,'data_siswa' => $data_siswa, 'data_buku' => $data_buku]);
    }

    public function kembali($id) {

      $data_trans = \App\Transaksi::find($id);
      $data_siswa = \App\Siswa::all();
      $data_buku = \App\Buku::all();
      $denda = \App\Denda::all();

      return view('transaksi.kembali', ['denda' => $denda, 'data_trans' => $data_trans,'data_siswa' => $data_siswa, 'data_buku' => $data_buku]);   
   }

    public function laporan() {
      return view('laporan.index');
    }
    
    public function kembalikan(Request $request, $id, $buku) {
      $trans = \App\Transaksi::find($id);
      $trans -> update($request -> all());
      $buku = \App\Buku::find($buku);
      $buku -> update($request -> all());
      return redirect('/daftartransaksi/aktif') -> with('sukses','Buku Berhasil Dikembalikan!');
    }

    public function pinjam() {
      return view('transaksi.pinjam');
    }

    public function perpanjang(Request $request, $id) {
      $trans = \App\Transaksi::find($id);
      $trans -> update($request -> all());
      return redirect('/daftartransaksi/aktif') -> with('sukses','Peminjaman Buku Berhasil Diperpanjang!');
    }

    
}
