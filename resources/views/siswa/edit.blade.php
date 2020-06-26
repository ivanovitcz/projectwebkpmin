@extends('layouts.master')
@section('content')
<div class="main">
  <div class="main-content">
    <div class="container-fluid">
      <div class="row">
        <div class="col-md-12">
          <div class="panel">
            <div class="panel-heading">
              <h3 class="panel-title font-weight-bold">Edit Data Siswa</h3>
            </div>
            <div class="panel-body">
              <form action="/daftarsiswa/{{$siswa -> id}}/update" method='post'>
                {{ csrf_field() }}
                <div class="form-group">
                  <label for="exampleFormControlInput1">Nama</label>
                  <input type="text" name='nama' value='{{$siswa -> nama}}' class="form-control" id="exampleFormControlInput1" placeholder="Nama...">
                </div>
                <div class="form-group">
                  <label for="exampleFormControlSelect1">Status Siswa</label>
                  <select class="form-control" name='aktif'>
                    <option value='Aktif' <?php if($siswa -> aktif == 'Aktif'){ ?> selected <?php } ?>>Aktif</option>
                    <option value='Non-Aktif' <?php if($siswa -> aktif == 'Non-Aktif'){ ?> selected <?php } ?>>Non-Aktif</option>
                  </select>
                </div>
                <div class="form-group">
                  <label for="exampleFormControlInput1">NIS</label>
                  <input type="text" name='nis' value='{{$siswa -> nis}}' class="form-control" id="exampleFormControlInput1" placeholder="NIS...">
                </div>
                <div class="form-group">
                  <label for="exampleFormControlInput1">Kelas</label>
                  <input type="text" name='kelas' value='{{$siswa -> kelas}}' class="form-control" id="exampleFormControlInput1" placeholder="Kelas...">
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


