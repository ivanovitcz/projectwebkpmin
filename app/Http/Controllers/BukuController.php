<?php

namespace App\Http\Controllers;
use App\Exports\Bukuxport;
use Maatwebsite\Excel\Facades\Excel;
use Illuminate\Http\Request;

class BukuController extends Controller
{
  public function index(Request $request) {
    if($request -> has('cari')) {
      $data_buku = \App\Buku::where('jenis','Tematik') -> where('judul','LIKE','%'.$request->cari.'%') -> paginate(5) -> appends('cari', request('cari'));
    } else {
      $data_buku = \App\Buku::where('jenis','Tematik')  -> paginate(5);
    }
    $trans = \App\Transaksi::all();
    return view('buku.index', ['data_buku' => $data_buku],['trans' => $trans]);
  }

  public function liat(Request $request) {
    if($request -> has('cari')) {
      $data_buku = \App\Buku::where('judul','LIKE','%'.$request->cari.'%') -> paginate(5) -> appends('cari', request('cari'));
    } else {
      $data_buku = \App\Buku::paginate(5);
    }
    $trans = \App\Transaksi::all();
    return view('liat.liat', ['data_buku' => $data_buku],['trans' => $trans]);
  }

  public function liatdetail($id) {
    $buku = \App\Buku::find($id);
    return view('liat.detail',['buku' => $buku]);
  }

  public function nontematik(Request $request) {
    if($request -> has('cari')) {
      $data_buku = \App\Buku::where('jenis','Non-Tematik') -> where('judul','LIKE','%'.$request->cari.'%') -> paginate(5) -> appends('cari', request('cari'));
    } else {
      $data_buku = \App\Buku::where('jenis','Non-Tematik')  -> paginate(5);
    }
    $trans = \App\Transaksi::all();
    return view('buku.indexNon', ['data_buku' => $data_buku],['trans' => $trans]);
  }

  public function buat(Request $request) {
    $buku = \App\Buku::create($request->all());
    if($request->hasFile('gambar')) {
      $request -> file('gambar') -> move('images/',$request->file('gambar') -> getClientOriginalName());
      $buku -> gambar = $request -> file('gambar') -> getClientOriginalName();
      $buku -> save();
    }
    if($request -> jenis == 'Tematik') {
      return redirect('/daftarbuku/tematik') -> with('sukses','Buku Berhasil Ditambahkan!');
    } else {
      return redirect('/daftarbuku/nontematik') -> with('sukses','Buku Berhasil Ditambahkan!');
    }

  }

  public function pinjambuku(Request $request, $id) {
    $buku = \App\Buku::find($id);
    $buku -> update($request -> all());
    $buku = \App\Transaksi::create($request->all());
    return redirect('/daftartransaksi/aktif') -> with('sukses','Buku Berhasil Dipinjam!');
  }


  public function hapus($id) {
    $buku = \App\Buku::find($id);
    $buku -> delete($buku);
    if($buku -> jenis == 'Tematik') {
      return redirect('/daftarbuku/tematik') -> with('sukses','Buku Berhasil Dihapus!');
    } else {
      return redirect('/daftarbuku/nontematik') -> with('sukses','Buku Berhasil Dihapus!');
    }
  }

  public function edit($id) {
    $buku = \App\Buku::find($id);
    return view('buku.edit',['buku' => $buku]);
  }

  public function detail($id) {
    $buku = \App\Buku::find($id);
    $data_siswa = \App\Siswa::all();
    $data_trans = \App\Transaksi::orderBy('tanggal_pinjam','desc') -> where('buku_id',$id) -> paginate(10) ;
    return view('buku.detail',['buku' => $buku,'data_siswa' => $data_siswa,'data_trans' => $data_trans]);
  }

  public function pinjam($id) {
    $buku = \App\Buku::find($id);
    $data_siswa = \App\Siswa::all();
    return view('buku.pinjam',['buku' => $buku,'data_siswa' => $data_siswa]);
  }

  public function update(Request $request, $id) {
    $buku = \App\Buku::find($id);
    $buku -> update($request -> all());
    if($request->hasFile('gambar')) {
      $request -> file('gambar') -> move('images/',$request->file('gambar') -> getClientOriginalName());
      $buku -> gambar = $request -> file('gambar') -> getClientOriginalName();
      $buku -> save();
    }
    if($request -> jenis == 'Tematik') {
      return redirect('/daftarbuku/tematik') -> with('sukses','Buku Berhasil Diperbarui!');
    } else {
      return redirect('/daftarbuku/nontematik') -> with('sukses','Buku Berhasil Diperbarui!');
    }
  }

  public function export($jenis) 
    {
        return Excel::download(new Bukuxport($jenis), 'buku.xlsx');
    }
}
