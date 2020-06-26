@extends('liat.layouts.master')
@section('header')

@endsection
@section('content')
<div class="main liat">
  <div class="main-content">
    <div class="container-fluid">
      <div class="row">
        <div class="col-md-12">
          <div class="panel">
            <div class="row">
              <div class="col-md-8">
                <div class="panel-heading">
                  <h3 class="panel-title font-weight-bold">Daftar Buku Perpustakaan</h3>
                  <br>
                </div>
              </div>
              <div class="col-md-4 pr-5">
                <form class="navbar-form navbar-right" action='/view' method='get'>
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
  
                    </tr>
                  </thead>
                  <tbody>
                    <?php $count = $data_buku -> count();?>
                    @if($count!=0)
                    @foreach($data_buku as $buku)
                      <tr>
                        <td><img src="{{$buku -> getGambar()}}" style='  display: inline-block;
                          width: 200px;
                          height: auto;
                          object-fit: cover;' alt="Avatar"></td>
                        <td><a href='/view/{{$buku -> id}}/detail'>{{$buku -> judul}}</a></a></td>
                        <td>{{$buku -> penerbit}}</td>
                        <td>{{$buku -> sumber}}</td>
                        <td>{{$buku -> keterangan}}</td>
                        <td>{{$buku -> jumlah}}</td>
                     
                      </tr>
                    @endforeach
                    @else
                    <tr class='text-center' ><td colspan='6'><h3 class="panel-title font-weight-bold">Buku yang Dicari Tidak Ditemukan</h3></td></tr>
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