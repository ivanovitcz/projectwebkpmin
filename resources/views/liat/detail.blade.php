@extends('liat.layouts.master')
@section('content')
<div class="main liat">
  <div class="main-content">
    <div class="container-fluid">
      <div class="row">
        <div class="col-md-12">
          <div class="panel">
            <div class="panel-heading">
              <h3 class="panel-title">Detail Buku</h3>
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
            </div>
            
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection


