@extends('layouts.master')
@section('content')
<div class="main">
  <div class="main-content">
    <div class="container-fluid">
      <div class="row">
        <div class="col-md-12">
          <div class="panel">
            <div class="row">
              <div class="col-md-8">
                <div class="panel-heading">
                  <h3 class="panel-title font-weight-bold">Daftar Riwayat Transaksi</h3>
                </div>
              </div>
            </div>
            <div class="panel-body">
              <div class="table-responsive">
                <table class="table table-hover">
                  <thead>
                    <tr>
                      <th>Nama</th>
                      <th>Buku</th>
                      <th>Denda</th>
                      <th>Tanggal Pinjam</th>
                      <th>Tanggal Kembali</th>
                    </tr>
                  </thead>
                  <tbody>
                    
                    @foreach($data_trans as $trans)
                      <tr>
                        <td>@foreach($data_siswa as $dataS) @if($dataS -> nis == $trans -> siswa_id) {{$dataS -> nama}} @endif @endforeach</td>
                        <td>@foreach($data_buku as $dataB) @if($dataB -> id == $trans -> buku_id) {{$dataB -> judul}} @endif @endforeach</td>
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
                        <td>{{$trans -> denda}}</td>
                        <td>{{$tgl_p}}</td>
                        <td>{{$tgl_k}}</td>
                      </tr>
                    @endforeach
                  </tbody>
                </table>
              </div>
              
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
@endsection
