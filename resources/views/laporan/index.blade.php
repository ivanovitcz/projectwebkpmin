@extends('layouts.master')
@section('content')
<div class="main">
  <div class="main-content">
    <div class="container-fluid">
      <div class="row">
        <div class="col-md-12">
          <div class="row">
            <div class="col-md-6">
              <div class="panel">
                <div class="row">
                  <div class="col-md-8">
                    <div class="panel-heading">
                      <h3 class="panel-title font-weight-bold">Export Excel Data Siswa</h3>
                    </div>
                  </div>
                </div>
                <div class="panel-body">
                  <div class="row">
                    <div class="col-md-6">
                      <a href="/laporan/Aktif/exportsiswa" class="btn btn-success btn-block"><i class="fa fa-users"></i>&emsp;Siswa Aktif</a>
                    </div>
                    <div class="col-md-6">
                      <a href="/laporan/Non-Aktif/exportsiswa" class="btn btn-warning btn-block"><i class="fa fa-users"></i>&emsp;Siswa Non-Aktif</a>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-md-6">
              <div class="panel">
                <div class="row">
                  <div class="col-md-8">
                    <div class="panel-heading">
                      <h3 class="panel-title font-weight-bold">Export Excel Data Buku</h3>
                    </div>
                  </div>
                </div>
                <div class="panel-body">
                  <div class="row">
                    <div class="col-md-6">
                      <a href="/laporan/Tematik/exportbuku" class="btn btn-success btn-block"><i class="fa fa-book"></i>&emsp;Buku Tematik</a>
                    </div>
                    <div class="col-md-6">
                      <a href="/laporan/Non-Tematik/exportbuku" class="btn btn-warning btn-block"><i class="fa fa-book"></i>&emsp;Buku Non-Tematik</a>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
          
          
          <div class="panel">
            <div class="row">
              <div class="col-md-8">
                <div class="panel-heading">
                  <h3 class="panel-title font-weight-bold">Export PDF Transaksi Buku Cetak Berdasarkan Bulan dan Tahun</h3>
                </div>
              </div>
            </div>
            <div class="panel-body">
              <div class="row">
                <div class="col-md-12">
                  <form action='/laporan/transaksi' method='post'>
                    {{ csrf_field() }}
                    <div class="form-group">
                      <label for="exampleFormControlInput1">Bulan</label>
                      <select class="form-control" name='bulan' required>
                        <option disabled selected>Bulan...</option>
                        <option value="01">Januari</option>
                        <option value="02">Februari</option>
                        <option value="03">Maret</option>
                        <option value="04">April</option>
                        <option value="05">Mei</option>
                        <option value="06">Juni</option>
                        <option value="07">Juli</option>
                        <option value="08">Agustus</option>
                        <option value="09">September</option>
                        <option value="10">Oktober</option>
                        <option value="11">November</option>
                        <option value="12">Desember</option>
                      </select>
                    </div>
                    <div class="form-group">
                      <label for="exampleFormControlInput1">Tahun</label>
                      <select class="form-control" name='tahun' required>
                        <option disabled selected>Tahun...</option>
                        <option value="2019">2019</option>
                        <option value="2020">2020</option>
                        <option value="2021">2021</option>
                        <option value="2022">2022</option>
                        <option value="2023">2023</option>
                        <option value="2024">2024</option>
                        <option value="2025">2025</option>
                        <option value="2026">2026</option>
                        <option value="2027">2027</option>
                        <option value="2028">2028</option>
                      </select>
                    </div>
                    <button type='submit' name='submit' class="btn btn-block btn-success"><i class="fa fa-align-left"></i>&emsp;Cetak Transaksi</button>
                  </form>
                </div>
              </div>
            </div>
            <div class="row">
              <div class="col-md-8">
                <div class="panel-heading">
                  <h3 class="panel-title font-weight-bold">Export PDF Semua Transaksi Buku </h3>
                </div>
              </div>
            </div>
            <div class="panel-body">
              <div class="row">
                <div class="col-md-12">
                  <a href="/laporan/semuatransaksi" class="btn btn-warning btn-block"><i class="fa fa-align-left"></i>&emsp;Cetak Semua Transaksi</a>
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