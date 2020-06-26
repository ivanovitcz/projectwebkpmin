@extends('layouts.master')
@section('content')
<div class="main">
  <div class="main-content">
    <div class="container-fluid">
      <div class="row">
        <div class="col-md-12">
          <div class="panel">
            <div class="panel-heading">
              <h3 class="panel-title font-weight-bold">Detail Buku</h3>
            </div>
            <div class="panel-body">
              <form >
                {{ csrf_field() }}
                <div class="row">
                  <div class="col-md-6">
                    <img src="{{$buku -> getGambar()}}" style='  display: inline-block;
                        width: 100%;
                        height: 100%;
                        object-fit: cover;' alt="Avatar">
                  </div>
                  <div class="col-md-6">
                    <div class="form-group row">
                      <label for="exampleFormControlInput1" class='col-sm-4 col-form-label'>Sinopsis</label>
                      <div class="col-sm-8">
                        <p class="form-control-plaintext">{{$buku -> sinopsis}}</p>
                      </div>
                    </div>
                    <div class="form-group row">
                      <label for="exampleFormControlInput1" class='col-sm-4 col-form-label'>Judul</label>
                      <div class="col-sm-8">
                        <span class="form-control-plaintext">{{$buku -> judul}}</span>
                      </div>
                    </div><div class="form-group row">
                      <label for="exampleFormControlInput1" class='col-sm-4 col-form-label'>Jenis Buku</label>
                      <div class="col-sm-8">
                        <span class="form-control-plaintext">{{$buku -> jenis}}</span>
                      </div>
                    </div>
                    <div class="form-group row">
                      <label for="exampleFormControlInput1" class='col-sm-4 col-form-label'>Pengarang</label>
                      <div class="col-sm-8">
                        <span class="form-control-plaintext">{{$buku -> pengarang}}</span>
                      </div>
                    </div>
                    <div class="form-group row">
                      <label for="exampleFormControlInput1" class='col-sm-4 col-form-label'>Penerbit</label>
                      <div class="col-sm-8">
                        <span class="form-control-plaintext">{{$buku -> penerbit}}</span>
                      </div>
                    </div>
                    <div class="form-group row">
                      <label for="exampleFormControlInput1" class='col-sm-4 col-form-label'>Tahun Terbit</label>
                      <div class="col-sm-8">
                        <span class="form-control-plaintext">{{$buku -> thn_terbit}}</span>
                      </div>
                    </div>
                    <div class="form-group row">
                      <label for="exampleFormControlInput1" class='col-sm-4 col-form-label'>Jumlah Buku</label>
                      <div class="col-sm-8">
                        <span class="form-control-plaintext">{{$buku -> jumlah}}</span>
                      </div>
                    </div>
                    <div class="form-group row">
                      <label for="exampleFormControlInput1" class='col-sm-4 col-form-label'>Sumber</label>
                      <div class="col-sm-8">
                        <span class="form-control-plaintext">{{$buku -> sumber}}</span>
                      </div>
                    </div>
                    <div class="form-group row">
                      <label for="exampleFormControlInput1" class='col-sm-4 col-form-label'>Harga</label>
                      <div class="col-sm-8">
                        <span class="form-control-plaintext">{{$buku -> harga}}</span>
                      </div>
                    </div>
                    <div class="form-group row">
                      <label for="exampleFormControlInput1" class='col-sm-4 col-form-label'>Keterangan</label>
                      <div class="col-sm-8">
                        <span class="form-control-plaintext">{{$buku -> keterangan}}</span>
                      </div>
                    </div>   
                  </div>
                </div>
            </form>
            <div class="row mt-5">
            <div class="panel-heading">
              <h3 class="panel-title">Riwayat Peminjaman Buku</h3>
            </div>
              <div class="table-responsive">
                <table class="table table-hover">
                  <thead>
                    <tr>
                      <th>Nama Peminjam</th>
                      <th>Tanggal Pinjam</th>
                      <th>Tanggal Kembali</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php $count = $data_trans -> count();?>
                    @if($count!=0)
                    @foreach($data_trans as $trans)
                      <tr>
                        @if($trans -> buku_id == $buku -> id) 
                          <td>
                            @foreach($data_siswa as $siswa) @if($trans -> siswa_id == $siswa -> nis) {{$siswa -> nama}} @endif @endforeach
                          </td>
                          <?php 
                          $tgl_p = explode(" ",$trans -> tanggal_pinjam);
                          $tgl_p = explode("-",$tgl_p[0]);
                          $tgl_p = $tgl_p[2]."-".$tgl_p[1]."-".$tgl_p[0];
                          if(empty($trans -> tanggal_kembali)) {
                            $tgl_k = '-';
                          } else {
                            $tgl_k = explode("-",$trans -> tanggal_kembali);
                            $tgl_k = $tgl_k[2]."-".$tgl_k[1]."-".$tgl_k[0];
                          }
                          
                          ?>
                          <td>{{$tgl_p}}</td>
                          <td>{{$tgl_k}}</td>
                        @endif
                      </tr>
                    @endforeach
                    @else
                    <tr class='text-center' ><td colspan='3'><h3 class="panel-title font-weight-bold">Buku Belum Pernah Dipinjam</h3></td></tr>
                    @endif
                  </tbody>
                </table>
              </div>
              
              <div class="text-center">
                {{$data_trans -> links()}}
              </div>
            </div>
            </div>
            
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection


