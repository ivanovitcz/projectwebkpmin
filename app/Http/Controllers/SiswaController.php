<?php

namespace App\Http\Controllers;
use App\Exports\SiswaExport;
use Maatwebsite\Excel\Facades\Excel;
use Illuminate\Http\Request;

class SiswaController extends Controller
{
    public function index(Request $request) {
      if($request -> has('cari')) {
        $data_siswa = \App\Siswa::where('aktif','Aktif') -> where('nama','LIKE','%'.$request->cari.'%') -> paginate(5) -> appends('cari', request('cari'));
      } else {
        $data_siswa = \App\Siswa::where('aktif','Aktif') -> paginate(5);
      }
      $trans = \App\Transaksi::all();
      return view('siswa.index', ['data_siswa' => $data_siswa, 'trans' => $trans]);
    }
    public function home() {
      $data_trans = \App\Transaksi::all();
      $data_siswa = \App\Siswa::all();
      $data_buku = \App\Buku::all();
      return view('welcome', ['data_trans' => $data_trans,'data_siswa' => $data_siswa, 'data_buku' => $data_buku]);
    }

    public function detail($id) {
      $data_siswa = \App\Siswa::find($id);
      $data_trans = \App\Transaksi::orderBy('tanggal_pinjam','desc') -> where('siswa_id',$data_siswa -> nis) -> paginate(10) ;
      $data_buku = \App\Buku::all();
      return view('siswa.detail', ['data_trans' => $data_trans,'data_siswa' => $data_siswa, 'data_buku' => $data_buku]);
    }

    public function tidakaktif(Request $request) {
      if($request -> has('cari')) {
        $data_siswa = \App\Siswa::where('aktif','Non-Aktif') -> where('nama','LIKE','%'.$request->cari.'%') -> paginate(5) -> appends('cari', request('cari'));
      } else {
        $data_siswa = \App\Siswa::where('aktif','Non-Aktif') -> paginate(5);
      }
      $trans = \App\Transaksi::all();
      return view('siswa.indexNon', ['data_siswa' => $data_siswa, 'trans' => $trans]);
    }

    public function buat(Request $request) {
      \App\Siswa::create($request->all());
      if($request -> aktif == 'Aktif') {
        return redirect('/daftarsiswa/aktif') -> with('sukses','Siswa Berhasil Ditambahkan!');
      } else {
        return redirect('/daftarsiswa/tidakaktif') -> with('sukses','Siswa Berhasil Ditambahkan!');
      }
    }

    public function edit($id) {
      $siswa = \App\Siswa::find($id);
      return view('siswa.edit',['siswa' => $siswa]);
    }

    public function hapus($id) {
      $siswa = \App\Siswa::find($id);
      $siswa -> delete($siswa);
      if($siswa -> aktif == 'Aktif') {
        return redirect('/daftarsiswa/aktif') -> with('sukses','Siswa Berhasil Dihapus!');
      } else {
        return redirect('/daftarsiswa/tidakaktif') -> with('sukses','Siswa Berhasil Dihapus!');
      }

    }

    public function update(Request $request, $id) {
      $siswa = \App\Siswa::find($id);
      $siswa -> update($request -> all());
      if($request -> aktif == 'Aktif') {
        return redirect('/daftarsiswa/aktif') -> with('sukses','Siswa Berhasil Diperbarui!');
      } else {
        return redirect('/daftarsiswa/tidakaktif') -> with('sukses','Siswa Berhasil Diperbarui!');
      }
    }

    public function export($aktif) 
    {
        return Excel::download(new SiswaExport($aktif), 'siswa.xlsx');
    }
}
