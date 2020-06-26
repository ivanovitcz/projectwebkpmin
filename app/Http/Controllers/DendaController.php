<?php

namespace App\Http\Controllers;

use Maatwebsite\Excel\Facades\Excel;
use Illuminate\Http\Request;
use Auth;
use Illuminate\Support\Facades\Hash;

class DendaController extends Controller
{
  public function index() {
    $denda = \App\Denda::all();
    $user = \App\Users::find(1);
    return view('transaksi.setting', ['denda' => $denda, 'user' => $user]);
  }

  public function gantipass(request $request) {
    if (!(Hash::check($request -> passwordlama, Auth::user() -> password))) {
      // The passwords matches
      return redirect('/pengaturan') -> with('error','Password Lama Tidak Cocok!');
    }

    if(strcmp($request->passwordlama, $request->passwordbaru) == 0){
      //Current password and new password are same
      return redirect('/pengaturan') -> with("error","Password Baru Tidak Boleh Sama Dengan Password Lama!");
    }

    if(!(strcmp($request->passwordbaru, $request->passwordbaru2)) == 0){
      //New password and confirm password are not same
      return redirect('/pengaturan')  -> with("error","Konfirmasi Password Dengan Benar!");
    }

    $user = Auth::user();
    $user->password = bcrypt($request -> passwordbaru);
    $user->save();
    return redirect('/pengaturan')  -> with("sukses","Password Berhasil Diganti!");

  }

  public function update(request $request, $id) {
    $denda = \App\Denda::find($id);
    $denda -> update($request -> all());
    return redirect('/pengaturan') -> with('sukses','Denda Berhasil Diperbarui');
  }

  public function lulus(request $request) {
    $siswa = \App\Siswa::where('kelas','LIKE','%6%');
    $siswa ->update(['aktif' => $request->aktif]);
    return redirect('/pengaturan') -> with('sukses','Siswa Berhasil Diperbarui');
  }

  public function hapus(request $request) {
    $siswa = \App\Siswa::where('id','LIKE','%%') -> where('aktif','Aktif');
    $siswa -> delete();
    return redirect('/pengaturan') -> with('sukses','Siswa Berhasil Dihapus');
  }

  public function importexcel(request $request) {
    Excel::import(new \App\Imports\SiswaImport, $request -> file('data_siswa'));
    //dd($request -> all());
    return redirect('/pengaturan') -> with('sukses','Siswa Berhasil Import');
    
  }
}
