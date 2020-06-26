@extends('layouts.master')
@section('header')

@endsection
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
                  <h3 class="panel-title font-weight-bold">Daftar Buku Tematik</h3>
                  <br>
                  <a type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
                    Tambah Data Buku
                  </a>
                </div>
              </div>
              <div class="col-md-4">
                <form class="navbar-form navbar-left" action='/daftarbuku/tematik' method='get'>
                  <div class="input-group">
                    <input type="search" name='cari' class="form-control" placeholder="Cari Buku...">
                    <span class="input-group-btn"><input type="submit" value='Cari' class="btn btn-primary"></span>
                  </div>
                </form>
              </div>
            </div>
            <div class="panel-body">
              <div class="table-responsive">
                <table class="table table-hover">
                  <thead>
                    <tr>
                      <th>Gambar</th>
                      <th>Judul</th>
                      <th>Penerbit</th>
                      <th>Sumber</th>
                      <th>Keterangan</th>
                      <th>Jumlah</th>
                      <th>Pinjam</th>
                      <th>Edit</th>
                      <th>Hapus</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php $count = $data_buku -> count();?>
                    @if($count!=0)
                    @foreach($data_buku as $buku)
                      <tr>
                        <td><img src="{{$buku -> getGambar()}}" style='display: inline-block;
                          width: 150px;
                          height: 150px;
                          object-fit: cover;' alt="Avatar"></td>
                        <td><a href='/daftarbuku/{{$buku -> id}}/detail'>{{$buku -> judul}}</a></td>
                        <td>{{$buku -> penerbit}}</td>
                        <td>{{$buku -> sumber}}</td>
                        <td>{{$buku -> keterangan}}</td>
                        <td><a href="#" disabclass="jumlah" data-type="text" data-pk="{{$buku -> id}}" data-url="/api/buku/{{$buku -> id}}/editjumlah" data-title="Masukkan Nilai">{{$buku -> jumlah}}</a></td>
                        <td>
                        @if($buku -> jumlah != 0)
                        <a href='/daftarbuku/{{$buku -> id}}/pinjam' class="btn btn-success" >Pinjam</a> 
                        @else
                        <button class="btn btn-danger" disabled>Stock Habis</button> 
                        @endif
                        </td>
                        <td>
                        <a href='/daftarbuku/{{$buku -> id}}/edit' class='btn btn-warning'>edit</a>
                        </td>
                        <td>
                        <?php $jumlah = 0; ?>
                        @foreach($trans as $datas)
                        @if($datas -> buku_id == $buku -> id)
                        <?php $jumlah++?>
                        @endif
                        @endforeach
  
                        @if($jumlah == 0)
                        <a href='#' class='btn btn-danger delete' buku-judul="{{$buku -> judul}}" buku-id="{{$buku -> id}}">hapus</a>
                        @else
                        <button class='btn btn-danger' disabled>Tidak Bisa Dihapus</button>
                        @endif
                        </td>
                      </tr>
                    @endforeach
                    @else
                    <tr class='text-center' ><td colspan='9'><h3 class="panel-title font-weight-bold">Buku yang Dicari Tidak Ditemukan</h3></td></tr>
                    @endif
                  </tbody>
                </table>
              </div>
              
            </div>
            <div class="text-center">
              {{$data_buku -> links()}}
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
        <span class="modal-title font-weight-bold" id="exampleModalLabel">Tambah Buku</span>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form action="/daftarbuku/buat" method='post' enctype='multipart/form-data'>
          {{ csrf_field() }}
          <div class="row">
            <div class="col-md-6">
              <div class="form-group">
                <label for="exampleFormControlInput1">Judul</label>
                <input type="text" name='judul' class="form-control" id="exampleFormControlInput1" placeholder="Judul...">
              </div>
            </div>
            <div class="col-md-6">
              <div class="form-group">
                <label for="exampleFormControlSelect1">Jenis Buku</label>
                <select class="form-control" name='jenis'>
                  <option disabled selected>Jenis...</option>
                  <option value='Tematik'>Buku Tematik/Pegangan</option>
                  <option value='Non-Tematik'>Non-Tematik</option>
                </select>
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-md-6">
              <div class="form-group">
                <label for="exampleFormControlInput1">Pengarang</label>
                <input type="text" name='pengarang' class="form-control" id="exampleFormControlInput1" placeholder="Pengarang...">
              </div>
            </div>
            <div class="col-md-6">
              <div class="form-group">
                <label for="exampleFormControlInput1">Penerbit</label>
                <input type="text" name='penerbit' class="form-control" id="exampleFormControlInput1" placeholder="Penerbit...">
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-md-6">
              <div class="form-group">
                <label for="exampleFormControlInput1">Tahun Terbit</label>
                <input type="text" name='thn_terbit' class="form-control" id="exampleFormControlInput1" placeholder="Tahun Terbit...">
              </div>
            </div>
            <div class="col-md-6">
              <div class="form-group">
                <label for="exampleFormControlInput1">Jumlah</label>
                <input type="text" name='jumlah' class="form-control" id="exampleFormControlInput1" placeholder="Jumlah...">
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-md-6">
              <div class="form-group">
                <label for="exampleFormControlInput1">Sumber</label>
                <input type="text" name='sumber' class="form-control" id="exampleFormControlInput1" placeholder="Sumber...">
              </div>
            </div>
            <div class="col-md-6">
              <div class="form-group">
                <label for="exampleFormControlInput1">Harga</label>
                <input type="text" name='harga' class="form-control" id="exampleFormControlInput1" placeholder="Harga...">
              </div>
            </div>
          </div>
          <div class="form-group">
            <label for="exampleFormControlInput1">Keterangan</label>
            <input type="text" name='keterangan' class="form-control" id="exampleFormControlInput1" placeholder="Keterangan...">
          </div>
          <div class="form-group">
            <label for="exampleFormControlInput1">Sinopsis</label>
            <textarea row='4' name='sinopsis' class="form-control" placeholder="Sinopsis..."></textarea>
          </div>
          <div class="form-group">
            <label for="exampleFormControlInput1">Gambar</label>
            <input type="file" name='gambar' class="form-control" >
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
<script>
  $(document).ready(function() {
    $('.jumlah').editable({
      mode: 'inline',
    });
  });
</script>
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>

<script>
  $('.delete').click(function() {
    var buku = $(this).attr('buku-judul');
    var id = $(this).attr('buku-id');
    swal({
      title: "Yakin?",
      text: "Hapus Buku "+buku+"? Sekali dihapus data tidak dapat dikembalikan!",
      icon: "warning",
      buttons: true,
      dangerMode: true,
    })
    .then((willDelete) => {
      if (willDelete) {
        window.location = "/daftarbuku/"+id+"/hapus";
      } else {
        swal("Buku Tidak Dihapus!");
      }
    });
  });
</script>
@endsection