@extends('layouts.master')
@section('content')
<div class="main">
  <div class="main-content">
    <div class="container-fluid">
      <div class="row">
        <div class="col-md-12">
          <div class="panel">
            <div class="panel-heading">
              <h3 class="panel-title font-weight-bold">Pinjam Buku</h3>
            </div>
            <div class="panel-body">
              <form action="/daftarbuku/{{$buku -> id}}/pinjambuku" method='post'  enctype='multipart/form-data'>
                {{ csrf_field() }}
                <input type="hidden" name='buku_id'  value="{{$buku -> id}}">
                <input type="hidden" name='Keterangan'  value="Pinjam">
                <?php 
                  $pinjam = date("Y/m/d");
                ?>
                <input type="hidden" name='tanggal_pinjam'  value="{{$pinjam}}">
                <input type="hidden" name='denda'  value="">
                <div class="form-group">
                  <label for="exampleFormControlInput1">Judul</label>
                  <p> {{$buku -> judul}} </p>
                </div>
                <div class="form-group">
                  <label for="exampleFormControlInput1">Gambar</label><br>
                  <img src="{{$buku -> getGambar()}}" style='  display: inline-block;
                        width: 50%;
                        height: 50%;
                        object-fit: cover;' alt="Avatar">
                </div>
                <div class="form-group">
                  <label for="exampleFormControlSelect1">Peminjam</label>
                  <select class="form-control" name='siswa_id' id="exampleFormControlSelect1" required>
                    <option disabled selected>Peminjam...</option>
                    @foreach ($data_siswa as $data)
                      @if($data -> aktif == 'Aktif')
                        <option value='{{$data -> nis}}'>{{$data -> nama}}</option>
                      @endif
                    @endforeach
                  </select>
                </div>
                <?php 
                  $jumlah = $buku -> jumlah - 1;
                ?>
                
                <input type="hidden" name='jumlah' value='{{$jumlah}}'>
              <button type="submit" class="btn btn-primary">Simpan</button>
            </form>
            </div>
            
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection


