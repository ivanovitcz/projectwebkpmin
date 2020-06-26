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
                      <h3 class="panel-title font-weight-bold">Pengaturan Denda</h3>
                    </div>
                  </div>
                </div>
                <div class="panel-body">
                  <form action="/pengaturan/denda/update" method='post'>
                    {{ csrf_field() }}
                    @foreach($denda as $dendas)
                    @if($dendas -> id == 'denda')
                    <div class="form-group">
                      <label for="exampleFormControlInput1">Telat Hari</label>
                      <input type="text" name='hari' value='{{$dendas -> hari}}' class="form-control" id="exampleFormControlInput1" placeholder="Nama...">
                    </div>
                    <div class="form-group">
                      <label for="exampleFormControlInput1">Bayar Denda</label>
                      <input type="text" name='bayar' value='{{$dendas -> bayar}}' class="form-control" id="exampleFormControlInput1" placeholder="Nama...">
                    </div>
                    @endif
                    @endforeach
                  <button type="submit" class="btn btn-primary">Simpan</button>
                </form>
                </div>
              </div>
            </div>
            <div class="col-md-6">
              <div class="panel">
                <div class="row">
                  <div class="col-md-8">
                    <div class="panel-heading">
                      <h3 class="panel-title font-weight-bold">Ubah Password</h3>
                    </div>
                  </div>
                </div>
                <div class="panel-body">
                  <form action="/pengaturan/pass" method='post'>
                    {{ csrf_field() }}
                    
                    <div class="form-group">
                      <label for="exampleFormControlInput1">Password Lama</label>
                      <input type="password" name='passwordlama' class="form-control" id="exampleFormControlInput1" placeholder="Password Lama...">
                    </div>
                    <div class="form-group">
                      <label for="exampleFormControlInput1">Password Baru</label>
                      <input type="password" name='passwordbaru' class="form-control" id="exampleFormControlInput1" placeholder="Password Baru...">
                    </div>
                    <div class="form-group">
                      <label for="exampleFormControlInput1">Konfirmasi Password Baru</label>
                      <input type="password" name='passwordbaru2' class="form-control" id="exampleFormControlInput1" placeholder="Konfirmasi Password Baru...">
                    </div>
                  <button type="submit" class="btn btn-primary">Simpan</button>
                </form>
                </div>
              </div>
            </div>
          </div>          
          <div class="panel">
            <div class="row">
              <div class="col-md-8">
                <div class="panel-heading">
                  <h3 class="panel-title font-weight-bold">Pengaturan Siswa</h3>
                </div>
              </div>
            </div>
            <div class="panel-body">
              <div class="row">
                <div class="col-md-12">
                   <div class="row">
                      <div class="col-md-4">
                        <form action="/pengaturan/lulus" method='get'>
                          {{ csrf_field() }}
                          <input type="hidden" name='aktif' value='Non-Aktif'>
                          <button type="submit" class="btn btn-success btn-block"><i class="fa fa-check-circle"></i>&emsp;Siswa Sudah Lulus</button>
                        </form>
                      </div>
                      <div class="col-md-4">
                        <a href="/pengaturan/hapus"><button type="button" class="btn btn-danger btn-block"><i class="fa fa-trash-o"></i>&emsp;Hapus Data Siswa</button></a>
                      </div>
                      <div class="col-md-4">
                        <button type="button" data-toggle="modal" data-target="#import" class="btn btn-primary btn-block"><i class="fa fa-plus-square"></i>&emsp;Upload Data Siswa</button>
                      </div>
                   </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>

<div class="modal fade" id="import" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <span class="modal-title font-weight-bold" id="exampleModalLabel">Upload</span>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form action="pengaturan/import" enctype='multipart/form-data' method='post'>
          {{ csrf_field() }}
          <div class="form-group">
            <label for="exampleFormControlInput1">Upload Data Siswa</label>
            <input type="file" name='data_siswa' class="form-control" >
          </div>
        
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary">Import</button>
      </form>
      </div>
    </div>
  </div>
</div>
@endsection
