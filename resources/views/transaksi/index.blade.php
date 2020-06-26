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
                  <h3 class="panel-title  font-weight-bold">Daftar Transaksi Aktif</h3>
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
                      <th>Tanggal Pinjam</th>
                      <th>Kembali</th>
                      <th>Perpanjang</th>
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
                        <td>{{$tgl_p}}</td>
                        <?php if($trans -> Keterangan == 'Pinjam') { ?>
                        <td><a href='/daftartransaksi/{{$trans -> id}}/kembali' class='btn btn-success'>Kembali</a></td>
                        <?php } else { ?>
                        <td><a  class='btn btn-secondary'>Kembali</a></td>
                        <?php } ?>
                        
                        <?php 
                        $date = date("Y-m-d H:i:s");
                        if($trans -> Keterangan == 'Pinjam') { ?>
                          <form action='/daftartransaksi/{{$trans -> id}}/perpanjang' method='post'>
                          {{ csrf_field() }}
                          <input type='hidden' name='tanggal_pinjam' value='{{$date}}'>
                          <td><button class='btn btn-primary' type='submit'>Perpanjang</button></form></td>
                          <?php } else { ?>
                          <td><a  class='btn btn-secondary'>Perpanjang</a></td>
                          <?php } ?>
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
