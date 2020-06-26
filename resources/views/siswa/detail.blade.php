@extends('layouts.master')
@section('content')
<div class="main">
  <div class="main-content">
    <div class="container-fluid">
      <div class="row">
        <div class="col-md-12">
          <div class="panel">
            <div class="panel-heading">
              <h3 class="panel-title font-weight-bold">Riwayat Peminjaman Buku</h3>
            </div>
            <div class="panel-body">
              <div class="table-responsive">
                <table class="table table-hover">
                  <thead>
                    <tr>
                      <th>Judul Buku</th>
                      <th>Tanggal Pinjam</th>
                      <th>Tanggal Kembali</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php $count = $data_trans -> count();?>
                    @if($count!=0)
                      @foreach($data_trans as $trans)
                        <tr>
                          @if($trans -> siswa_id == $data_siswa -> nis) 
                            <td>
                              @foreach($data_buku as $buku) @if($trans -> buku_id == $buku -> id) {{$buku -> judul}} @endif @endforeach
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
                    <tr class='text-center' ><td colspan='3'><h3 class="panel-title font-weight-bold">Siswa Belum Pernah Meminjam Buku</h3></td></tr>
                    @endif
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
</div>
@endsection


