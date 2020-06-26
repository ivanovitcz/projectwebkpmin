<html>
<body onLoad="window.print();">

<p align="center">LAPORAN DATA TRANSAKSI E-PERPUSTAKAAN</p>
  <table width="100%" cellspacing="0" cellpadding="2" border="1px" class="style1">
   	      
  <tr>
    <th width="5%" align="center" class="style1" bgcolor="#CCCCCC">No</th>
    <th width="24%" align="center" class="style1" bgcolor="#CCCCCC">Judul Buku</th>
    <th width="25%" align="center" class="style1" bgcolor="#CCCCCC">Peminjam</th>
    <th width="18%" align="center" class="style1" bgcolor="#CCCCCC">Tgl Pinjam</th>
    <th width="18%" align="center" class="style1" bgcolor="#CCCCCC">Tgl Kembali</th>
    <th width="10%" align="center" class="style1" bgcolor="#CCCCCC">Status</th>
    <th width="10%" align="center" class="style1" bgcolor="#CCCCCC">Denda</th>
  </tr>
  <?php 
  $no = 0;
  ?>
  @foreach($data_trans as $trans)
    <?php $no++ ?>
    <tr>
      <td>{{ $no }}</td>
      <td>@foreach($data_buku as $dataB) @if($dataB -> id == $trans -> buku_id) {{$dataB -> judul}} @endif @endforeach</td>
      <td>@foreach($data_siswa as $dataS) @if($dataS -> nis == $trans -> siswa_id) {{$dataS -> nama}} @endif @endforeach</td>
      <?php 
      $tgl_p = explode(" ",$trans -> tanggal_pinjam);
      $tgl_p = explode("-",$tgl_p[0]);
      $tgl_p = $tgl_p[2]."-".$tgl_p[1]."-".$tgl_p[0];
      if(empty($trans -> tanggal_kembali)) {
        $tgl_k = '-';
      } else {
        $tgl_k = explode("-",$trans -> tanggal_kembali);
        $tgl_k = $tgl_k[2]."-".$tgl_k[1]."-".$tgl_k[0];
      }
      
      ?>
      <td>{{$tgl_p}}</td>
      <td>{{$tgl_k}}</td>
      @if($tgl_k == '-')
      <td>Pinjam</td>
      @else
      <td>Kembali</td>
      @endif

    
      
      @if(empty($trans -> denda)) 
      <td>-</td>
      @else
      <td>{{$trans -> denda}}</td>
      @endif
    </tr>
  @endforeach
  
</table>
          
</body>
</html>