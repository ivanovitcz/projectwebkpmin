@extends('layouts.master')
@section('content')
<div class="main">
  <div class="main-content">
    <div class="container-fluid">
      <div class="row">
        <div class="col-md-12">
          <div class="panel">
            <div class="panel-heading">
              <h3 class="panel-title font-weight-bold">Kembalikan Buku</h3>
            </div>
            <div class="panel-body">
              <div class="row">
                <div class="col-md-6">
                  <label>Gambar</label>
                  @foreach($data_buku as $dataB) @if($dataB -> id == $data_trans -> buku_id) <img src="{{$dataB -> getGambar()}}" style='  display: inline-block;
                  width: 100%;
                  height: 100%;
                  object-fit: cover;' alt="Avatar"> @endif @endforeach
                </div>
                <div class="col-md-6">
                  <label>Judul Buku</label>
                  <br>
                  @foreach($data_buku as $dataB) @if($dataB -> id == $data_trans -> buku_id) {{$dataB -> judul}} @endif @endforeach
                  <br>
                  <label>Peminjam</label>
                  <br>
                  @foreach($data_siswa as $dataS) @if($dataS -> nis  == $data_trans -> siswa_id) {{$dataS -> nama}} @endif @endforeach
                  <br>
                  <label>Tanggal Pinjam</label>
                  <br>
                  @foreach($denda as $dendas) 
                  @if($dendas -> id == 'denda')
                    <?php 
                      $hari = $dendas -> hari;
                      $bayar = $dendas -> bayar;
                    ?>
                  @endif
                  @endforeach
                  <?php
                    use Carbon\Carbon; 
                    $tgl_p = explode(" ",$data_trans -> tanggal_pinjam);
                    $tgl_p = explode("-",$tgl_p[0]);
                    $tgl_p = $tgl_p[2]."-".$tgl_p[1]."-".$tgl_p[0];
                    $t1 = strtotime(date('Y-m-d', strtotime($tgl_p. ' + '.$hari.' days')));
                    $t2 = strtotime(date('Y/m/d'));
                    $telat = ($t2 - $t1)/(60 * 60 * 24);
                    
                    foreach($data_buku as $dataB) {
                      if($dataB -> id == $data_trans -> buku_id) {
                        if($dataB -> jenis != 'Tematik') {
                          if($telat < 0) {
                            $telat = 0;
                          }
                          $denda = $telat * $bayar;
                        } else {
                          $telat = "Tematik";
                          $denda = "Tematik";
                        }
                      } 
                    }
                    


                    ?>
                  {{$tgl_p}}
                  <br>
                  <label>Denda</label>
                  <br>
                  @if($telat != "Tematik")
                  Telat {{$telat}} Hari, Denda Rp {{$denda}}
                  @else
                  Buku Tematik Tidak Ada Denda
                  @endif
                  <form action='/daftartransaksi/{{$data_trans -> id}}/{{$data_trans -> buku_id}}/kembalikan' method='get'>
                    {{ csrf_field() }}
                    <input type='hidden' name='tanggal_kembali' value='{{date('Y/m/d')}}'>
                    <input type="hidden" name='denda' value='{{$denda}}'>
                    <input type="hidden" name='Keterangan' value='Kembali'>
                    @foreach($data_buku as $dataB) 
                      @if($dataB -> id == $data_trans -> buku_id)
                        <input type="hidden" name='jumlah' value='{{$dataB -> jumlah + 1}}'>
                      @endif 
                    @endforeach
                    <br>
                    <button type="submit" class="btn btn-success">Kembalikan Buku</button>
                  </form>
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


