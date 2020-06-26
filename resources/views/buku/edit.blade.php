@extends('layouts.master')
@section('content')
<div class="main">
  <div class="main-content">
    <div class="container-fluid">
      <div class="row">
        <div class="col-md-12">
          <div class="panel">
            <div class="panel-heading">
              <h3 class="panel-title font-weight-bold">Edit Data Buku</h3>
            </div>
            <div class="panel-body">
              <form action="/daftarbuku/{{$buku -> id}}/update" method='post'  enctype='multipart/form-data'>
                {{ csrf_field() }}
                <div class="form-group">
                  <label for="exampleFormControlInput1">Judul</label>
                  <input type="text" name='judul' value='{{$buku -> judul}}' class="form-control" id="exampleFormControlInput1" placeholder="Nama...">
                </div>
                <div class="form-group">
                  <label for="exampleFormControlSelect1">Jenis Buku</label>
                  <select class="form-control" name='jenis'>
                    <option value='Tematik' <?php if($buku -> jenis == 'Tematik'){ ?> selected <?php } ?>>Buku Tematik/Pegangan</option>
                    <option value='Non-Tematik' <?php if($buku -> jenis == 'Non-Tematik'){ ?> selected <?php } ?>>Non-Tematik</option>
                  </select>
                </div>
                <div class="form-group">
                  <label for="exampleFormControlInput1">Sinopsis</label>
                  <textarea row='4' name='sinopsis' class="form-control">{{$buku -> sinopsis}}</textarea>
                </div>
                <div class="form-group">
                  <label for="exampleFormControlInput1">Pengarang</label>
                  <input type="text" name='pengarang' value='{{$buku -> pengarang}}' class="form-control" id="exampleFormControlInput1" placeholder="NIS...">
                </div>
                <div class="form-group">
                  <label for="exampleFormControlInput1">Penerbit</label>
                  <input type="text" name='penerbit' value='{{$buku -> penerbit}}' class="form-control" id="exampleFormControlInput1" placeholder="Kelas...">
                </div>
                <div class="form-group">
                  <label for="exampleFormControlInput1">Tahun Terbit</label>
                  <input type="text" name='thn_terbit' value='{{$buku -> thn_terbit}}' class="form-control" id="exampleFormControlInput1" placeholder="Tahun Terbit...">
                </div>
                <div class="form-group">
                  <label for="exampleFormControlInput1">Jumlah Buku</label>
                  <input type="text" name='jumlah' value='{{$buku -> jumlah}}' class="form-control" id="exampleFormControlInput1" placeholder="Tahun Terbit...">
                </div>
                <div class="form-group">
                  <label for="exampleFormControlInput1">Sumber</label>
                  <input type="text" name='sumber' value='{{$buku -> sumber}}' class="form-control" id="exampleFormControlInput1" placeholder="Sumber...">
                </div>
                <div class="form-group">
                  <label for="exampleFormControlInput1">Harga</label>
                  <input type="text" name='harga' value='{{$buku -> harga}}' class="form-control" id="exampleFormControlInput1" placeholder="Harga...">
                </div>
                <div class="form-group">
                  <label for="exampleFormControlInput1">Keterangan</label>
                  <input type="text" name='keterangan' value='{{$buku -> keterangan}}' class="form-control" id="exampleFormControlInput1" placeholder="Keterangan...">
                </div>
                <div class="form-group">
                  <label for="exampleFormControlInput1">Gambar</label>
                  <input type="file" name='gambar' class="form-control" >
                </div>
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


