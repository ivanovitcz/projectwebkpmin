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
                  <h3 class="panel-title font-weight-bold">Daftar Siswa Aktif</h3>
                  <br>
                  <a type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
                    Tambah Data Siswa
                  </a>
                </div>
              </div>
              <div class="col-md-4">
                <form class="navbar-form navbar-left" action='/daftarsiswa/aktif' method='get'>
                  <div class="input-group">
                    <input type="search" name='cari' class="form-control" placeholder="Cari Siswa...">
                    <span class="input-group-btn"><input type="submit" value='Cari' class="btn btn-primary"></span>
                  </div>
                </form>
              </div>
            </div>
            <div class="panel-body">
              <div class="table-responsive">
                <table class="table table-hover ">
                  <thead>
                    <tr>
                      <th>Nama</th>
                      <th>NIS</th>
                      <th>Kelas</th>
                      <th>Total Pinjam</th>
                      <th>Buku Pinjam</th>
                      <th>Edit</th>
                      <th>Hapus</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php $count = $data_siswa -> count();?>
                    @if($count!=0)
                    @foreach($data_siswa as $siswa)
                      <tr>
                        <td><a href="/daftarsiswa/{{$siswa -> id}}/detail">{{$siswa -> nama}}</a></td>
                        <td>{{$siswa -> nis}}</td>
                        <td>{{$siswa -> kelas}}</td>
                        <?php $jumlah = 0 ?>
                        @foreach($trans as $datas)
                        @if($datas -> siswa_id == $siswa -> nis)
                          <?php 
                            $jumlah++;
                          ?>
                        @endif
                        @endforeach
                        <td>{{$jumlah.' Buku'}}</td>
  
                        <?php $jumlahA = 0 ?>
                        @foreach($trans as $datas)
                        @if(($datas -> siswa_id == $siswa -> nis) && ($datas -> Keterangan == 'Pinjam'))
                          <?php 
                            $jumlahA++;
                          ?>
                        @endif
                        @endforeach
                        <td>{{$jumlahA.' Buku'}}</td>
                        <td><a href='/daftarsiswa/{{$siswa -> id}}/edit' class='btn btn-warning'>Edit</a></td>
                        @if($jumlah == 0)
                        <td><a href='#' class='btn btn-danger delete' siswa-nama="{{$siswa -> nama}}" siswa-id="{{$siswa -> id}}">Hapus</a></td>
                        @else
                        <td><button class='btn btn-danger' disabled>Tidak Dapat Dihapus</button></td>
                        @endif
                      </tr>
                    @endforeach
                    @else
                    <tr class='text-center' ><td colspan='7'><h3 class="panel-title font-weight-bold">Siswa yang Dicari Tidak Ada</h3></td></tr>
                    @endif
                  </tbody>
                </table>
              </div>
              
            </div>
            <div class="text-center">
            {{$data_siswa -> links()}}
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <span class="modal-title font-weight-bold" id="exampleModalLabel">Tambah Siswa</span>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form action="/daftarsiswa/buat" method='post'>
          {{ csrf_field() }}
          <div class="form-group">
            <label for="exampleFormControlInput1">Nama</label>
            <input type="text" name='nama' class="form-control" id="exampleFormControlInput1" placeholder="Nama...">
          </div>
          <div class="form-group">
            <label for="exampleFormControlInput1">NIS</label>
            <input type="text" name='nis' class="form-control" id="exampleFormControlInput1" placeholder="NIS...">
          </div>
          <div class="form-group">
            <label for="exampleFormControlInput1">Kelas</label>
            <input type="text" name='kelas' class="form-control" id="exampleFormControlInput1" placeholder="Kelas...">
          </div>
          <div class="form-group">
            <label for="exampleFormControlSelect1">Status Siswa</label>
            <select class="form-control" name='aktif'>
              <option disabled selected>Status...</option>
              <option value='Aktif'>Aktif</option>
              <option value='Non-Aktif'>Non-Aktif</option>
            </select>
          </div>
      </div>
      <div class="modal-footer">
        <button type="reset" class="btn btn-secondary" >Reset</button>
        <button type="submit" class="btn btn-primary">Simpan</button>
        </form>
      </div>
    </div>
  </div>
</div>
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>

<script>
  $('.delete').click(function() {
    var siswa = $(this).attr('siswa-nama');
    var id = $(this).attr('siswa-id');
    swal({
      title: "Yakin?",
      text: "Hapus siswa "+siswa+"? Sekali dihapus data tidak dapat dikembalikan!",
      icon: "warning",
      buttons: true,
      dangerMode: true,
    })
    .then((willDelete) => {
      if (willDelete) {
        window.location = "/daftarsiswa/"+id+"/hapus";
      } else {
        swal("Siswa Tidak Dihapus!");
      }
    });
  });
</script>
@endsection
