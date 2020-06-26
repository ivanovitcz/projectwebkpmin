@extends('layouts.master')
@section('content')
<?php 
 $Jansemua = 0;
 $Jantematik = 0;
 $Jannontematik = 0;
 $Febsemua = 0;
 $Febtematik = 0;
 $Febnontematik = 0;
 $Marsemua = 0;
 $Martematik = 0;
 $Marnontematik = 0;
 $Aprsemua = 0;
 $Aprtematik = 0;
 $Aprnontematik = 0;
 $Meisemua = 0;
 $Meitematik = 0;
 $Meinontematik = 0;
 $Junsemua = 0;
 $Juntematik = 0;
 $Junnontematik = 0;
 $Julsemua = 0;
 $Jultematik = 0;
 $Julnontematik = 0;
 $Agusemua = 0;
 $Agutematik = 0;
 $Agunontematik = 0;
 $Sepsemua = 0;
 $Septematik = 0;
 $Sepnontematik = 0;
 $Oktsemua = 0;
 $Okttematik = 0;
 $Oktnontematik = 0;
 $Novsemua = 0;
 $Novtematik = 0;
 $Novnontematik = 0;
 $Dessemua = 0;
 $Destematik = 0;
 $Desnontematik = 0;

 $tahun = date('Y');
?>

@foreach($data_trans as $trans)
  <?php 
    $timestamp = strtotime($trans -> tanggal_pinjam);
    $year = date('Y', $timestamp);
  ?>
  @if($year == $tahun)
  @foreach($data_buku as $buku)
    @if(($trans -> buku_id == $buku -> id) and ($buku -> jenis == 'Tematik'))
      <?php 
        $timestamp = strtotime($trans -> tanggal_pinjam);
        $month = date('F', $timestamp);
      ?>
      @if($month == 'January')
        <?php $Jansemua++ ?>
        <?php $Jantematik++ ?>
      @endif
      @if($month == 'February')
        <?php $Febsemua++ ?>
        <?php $Febtematik++ ?>
      @endif
      @if($month == 'March')
        <?php $Marsemua++ ?>
        <?php $Martematik++ ?>
      @endif
      @if($month == 'April')
        <?php $Aprsemua++ ?>
        <?php $Aprtematik++ ?>
      @endif
      @if($month == 'May')
        <?php $Meisemua++ ?>
        <?php $Meitematik++ ?>
      @endif
      @if($month == 'June')
        <?php $Junsemua++ ?>
        <?php $Juntematik++ ?>
      @endif
      @if($month == 'July')
        <?php $Julsemua++ ?>
        <?php $Jultematik++ ?>
      @endif
      @if($month == 'August')
        <?php $Agusemua++ ?>
        <?php $Agutematik++ ?>
      @endif
      @if($month == 'September')
        <?php $Sepsemua++ ?>
        <?php $Septematik++ ?>
      @endif
      @if($month == 'October')
        <?php $Oktsemua++ ?>
        <?php $Okttematik++ ?>
      @endif
      @if($month == 'November')
        <?php $Novsemua++ ?>
        <?php $Novtematik++ ?>
      @endif
      @if($month == 'December')
        <?php $Dessemua++ ?>
        <?php $Destematik++ ?>
      @endif
    @endif
  @endforeach
  @endif
@endforeach

@foreach($data_trans as $trans)
  <?php 
    $timestamp = strtotime($trans -> tanggal_pinjam);
    $year = date('Y', $timestamp);
  ?>
  @if($year == $tahun)
  @foreach($data_buku as $buku)
    @if(($trans -> buku_id == $buku -> id) and ($buku -> jenis == 'Non-Tematik'))
      <?php 
        $timestamp = strtotime($trans -> tanggal_pinjam);
        $month = date('F', $timestamp);
      ?>
      @if($month == 'January')
        <?php $Jansemua++ ?>
        <?php $Jannontematik++ ?>
      @endif
      @if($month == 'February')
        <?php $Febsemua++ ?>
        <?php $Febnontematik++ ?>
      @endif
      @if($month == 'March')
        <?php $Marsemua++ ?>
        <?php $Marnontematik++ ?>
      @endif
      @if($month == 'April')
        <?php $Aprsemua++ ?>
        <?php $Aprnontematik++ ?>
      @endif
      @if($month == 'May')
        <?php $Meisemua++ ?>
        <?php $Meinontematik++ ?>
      @endif
      @if($month == 'June')
        <?php $Junsemua++ ?>
        <?php $Junnontematik++ ?>
      @endif
      @if($month == 'July')
        <?php $Julsemua++ ?>
        <?php $Julnontematik++ ?>
      @endif
      @if($month == 'August')
        <?php $Agusemua++ ?>
        <?php $Agunontematik++ ?>
      @endif
      @if($month == 'September')
        <?php $Sepsemua++ ?>
        <?php $Sepnontematik++ ?>
      @endif
      @if($month == 'October')
        <?php $Oktsemua++ ?>
        <?php $Oktnontematik++ ?>
      @endif
      @if($month == 'November')
        <?php $Novsemua++ ?>
        <?php $Novnontematik++ ?>
      @endif
      @if($month == 'December')
        <?php $Dessemua++ ?>
        <?php $Desnontematik++ ?>
      @endif
    @endif
  @endforeach
  @endif
@endforeach
<div class="main">
  <div class="main-content">
    <div class="container-fluid">
      <div class="row">
        <div class="col-md-12">
          <div class="panel">
            <div class="panel-body" id='transaksi'>
            </div>
          </div>
        </div>
      </div>


    </div>
  </div>
</div>












<input type="hidden" value={{$Jansemua}} id='Jansemua'>
<input type="hidden" value={{$Febsemua}} id='Febsemua'>
<input type="hidden" value={{$Marsemua}} id='Marsemua'>
<input type="hidden" value={{$Aprsemua}} id='Aprsemua'>
<input type="hidden" value={{$Meisemua}} id='Meisemua'>
<input type="hidden" value={{$Junsemua}} id='Junsemua'>
<input type="hidden" value={{$Julsemua}} id='Julsemua'>
<input type="hidden" value={{$Agusemua}} id='Agusemua'>
<input type="hidden" value={{$Sepsemua}} id='Sepsemua'>
<input type="hidden" value={{$Oktsemua}} id='Oktsemua'>
<input type="hidden" value={{$Novsemua}} id='Novsemua'>
<input type="hidden" value={{$Dessemua}} id='Dessemua'>

<input type="hidden" value={{$Jantematik}} id='Jantematik'>
<input type="hidden" value={{$Febtematik}} id='Febtematik'>
<input type="hidden" value={{$Martematik}} id='Martematik'>
<input type="hidden" value={{$Aprtematik}} id='Aprtematik'>
<input type="hidden" value={{$Meitematik}} id='Meitematik'>
<input type="hidden" value={{$Juntematik}} id='Juntematik'>
<input type="hidden" value={{$Jultematik}} id='Jultematik'>
<input type="hidden" value={{$Agutematik}} id='Agutematik'>
<input type="hidden" value={{$Septematik}} id='Septematik'>
<input type="hidden" value={{$Okttematik}} id='Okttematik'>
<input type="hidden" value={{$Novtematik}} id='Novtematik'>
<input type="hidden" value={{$Destematik}} id='Destematik'>

<input type="hidden" value={{$Jannontematik}} id='Jannontematik'>
<input type="hidden" value={{$Febnontematik}} id='Febnontematik'>
<input type="hidden" value={{$Marnontematik}} id='Marnontematik'>
<input type="hidden" value={{$Aprnontematik}} id='Aprnontematik'>
<input type="hidden" value={{$Meinontematik}} id='Meinontematik'>
<input type="hidden" value={{$Junnontematik}} id='Junnontematik'>
<input type="hidden" value={{$Julnontematik}} id='Julnontematik'>
<input type="hidden" value={{$Agunontematik}} id='Agunontematik'>
<input type="hidden" value={{$Sepnontematik}} id='Sepnontematik'>
<input type="hidden" value={{$Oktnontematik}} id='Oktnontematik'>
<input type="hidden" value={{$Novnontematik}} id='Novnontematik'>
<input type="hidden" value={{$Desnontematik}} id='Desnontematik'>

<script src="{{asset('js/highcharts.js')}}"></script>
<script>
  var Jansemua=parseInt(document.getElementById("Jansemua").value);  
  var Febsemua=parseInt(document.getElementById("Febsemua").value);  
  var Marsemua=parseInt(document.getElementById("Marsemua").value);  
  var Aprsemua=parseInt(document.getElementById("Aprsemua").value);  
  var Meisemua=parseInt(document.getElementById("Meisemua").value);  
  var Junsemua=parseInt(document.getElementById("Junsemua").value);  
  var Julsemua=parseInt(document.getElementById("Julsemua").value);  
  var Agusemua=parseInt(document.getElementById("Agusemua").value);  
  var Sepsemua=parseInt(document.getElementById("Sepsemua").value);  
  var Oktsemua=parseInt(document.getElementById("Oktsemua").value);  
  var Novsemua=parseInt(document.getElementById("Novsemua").value);  
  var Dessemua=parseInt(document.getElementById("Dessemua").value);  

  var Jantematik=parseInt(document.getElementById("Jantematik").value);  
  var Febtematik=parseInt(document.getElementById("Febtematik").value);  
  var Martematik=parseInt(document.getElementById("Martematik").value);  
  var Aprtematik=parseInt(document.getElementById("Aprtematik").value);  
  var Meitematik=parseInt(document.getElementById("Meitematik").value);  
  var Juntematik=parseInt(document.getElementById("Juntematik").value);  
  var Jultematik=parseInt(document.getElementById("Jultematik").value);  
  var Agutematik=parseInt(document.getElementById("Agutematik").value);  
  var Septematik=parseInt(document.getElementById("Septematik").value);  
  var Okttematik=parseInt(document.getElementById("Okttematik").value);  
  var Novtematik=parseInt(document.getElementById("Novtematik").value);  
  var Destematik=parseInt(document.getElementById("Destematik").value); 

  var Jannontematik=parseInt(document.getElementById("Jannontematik").value);  
  var Febnontematik=parseInt(document.getElementById("Febnontematik").value);  
  var Marnontematik=parseInt(document.getElementById("Marnontematik").value);  
  var Aprnontematik=parseInt(document.getElementById("Aprnontematik").value);  
  var Meinontematik=parseInt(document.getElementById("Meinontematik").value);  
  var Junnontematik=parseInt(document.getElementById("Junnontematik").value);  
  var Julnontematik=parseInt(document.getElementById("Julnontematik").value);  
  var Agunontematik=parseInt(document.getElementById("Agunontematik").value);  
  var Sepnontematik=parseInt(document.getElementById("Sepnontematik").value);  
  var Oktnontematik=parseInt(document.getElementById("Oktnontematik").value);  
  var Novnontematik=parseInt(document.getElementById("Novnontematik").value);  
  var Desnontematik=parseInt(document.getElementById("Desnontematik").value); 

  var d = new Date();
  var sekarang = d.getFullYear();
  Highcharts.chart('transaksi', {
    chart: {
        type: 'column'
    },
    title: {
        text: 'Peminjaman Buku Perpustakaan '+sekarang
    },
    subtitle: {
        text: 'E-Perpus MIN Negeri Surakarta'
    },
    xAxis: {
        categories: [
            'Jan',
            'Feb',
            'Mar',
            'Apr',
            'Mei',
            'Jun',
            'Jul',
            'Agu',
            'Sep',
            'Okt',
            'Nov',
            'Des'
        ],
        crosshair: true
    },
    yAxis: {
        min: 0,
        title: {
            text: 'Jumlah Buku'
        }
    },
    tooltip: {
        headerFormat: '<span style="font-size:10px">{point.key}</span><table>',
        pointFormat: '<tr><td style="color:{series.color};padding:0">{series.name}: </td>' +
            '<td style="padding:0"><b>{point.y} Buku</b></td></tr>',
        footerFormat: '</table>',
        shared: true,
        useHTML: true
    },
    plotOptions: {
        column: {
            pointPadding: 0.2,
            borderWidth: 0
        }
    },
    series: [{
        name: 'Semua',
        data: [Jansemua, Febsemua, Marsemua, Aprsemua, Meisemua, Junsemua, Julsemua, Agusemua, Sepsemua, Oktsemua, Novsemua, Dessemua]

    }, {
        name: 'Buku Tematik',
        data: [Jantematik, Febtematik, Martematik, Aprtematik, Meitematik, Juntematik, Jultematik, Agutematik, Septematik, Okttematik, Novtematik, Destematik]


    }, {
        name: 'Buku Non-Tematik',
        data: [Jannontematik, Febnontematik, Marnontematik, Aprnontematik, Meinontematik, Junnontematik, Julnontematik, Agunontematik, Sepnontematik, Oktnontematik, Novnontematik, Desnontematik]


    }]
});
</script>
@endsection
