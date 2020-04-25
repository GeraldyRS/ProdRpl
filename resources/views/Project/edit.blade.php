@extends('layout.master')

@section('content')
<br><br><br><br><br>
<style>
  a.tooltips {
    position: relative;
    display: inline;
    text-decoration: none;
  }

  a.tooltips span {
    position: absolute;
    width: 100px;
    color: #FFFFFF;
    background: #000000;
    height: 25px;
    line-height: 25px;
    text-align: center;
    visibility: hidden;
    border-radius: 3px;
  }

  a.tooltips span:after {
    content: '';
    position: absolute;
    bottom: 100%;
    left: 50%;
    margin-left: -8px;
    width: 0;
    height: 0;
    border-bottom: 8px solid #000000;
    border-right: 8px solid transparent;
    border-left: 8px solid transparent;
  }

  a:hover.tooltips span {
    visibility: visible;
    opacity: 0.8;
    top: 30px;
    left: 50%;
    margin-left: -76px;
    z-index: 999;
  }
</style>
<div class="main-content">
  <span id="datetime"></span>
    <table border="1" class="table table-bordered" id="jadwal">  
      <thead>
        <tr>
          <td>Waktu Mulai</td>
          <td>Waktu Selesai</td>
          <td>Kegiatan</td>
          <td>Mata pelajaran</td>
          <td>Status kegiatan</td>
        </tr>
      </thead>
      <tbody>
    @foreach($select as $sel)
    <tr>
      <td>{{$sel->mulai}}</td>
      <td>{{$sel->selesai}}</td>
      <td>{{$sel->kegiatan}}</td>
      <td>{{$sel->mapel}}</td>
        <?php $jam=date('H:i');$hari=date('Y-m-d');?>
        @if($sel->lampiran == 1)
        @if($sel->status == 1)
        <td style="background-color: #0f6">Sudah</td>
        @elseif($sel->status == 0)
        <td style="background-color: #e00">Belum</td>
        @elseif($sel->status == 2)
        <td style="background-color: #fd0">Telat</td>
        @endif
        @else
        @if($sel->tanggal > $hari)
        <td style="background-color: #e00">Belum</td>
        @else
        @if($sel->selesai > $jam)
        <td style="background-color: #e00">Belum</td>
        @else
        <td style="background-color: #0f6">Sudah</td>
        @endif
        @endif
        @endif
      </td>
    </tr>
    @endforeach
      </tbody>
    </table>
    *sudah = Sudah mengumpulkan tepat waktu<br>
    *telat = Sudah mengumpulkan namun melebihi waktu<br>
    *belum = Belum mengumpulkan sama sekali
<script type="text/javascript">
  var dt = new Date();
document.getElementById("datetime").innerHTML = dt.toLocaleTimeString();
</script>
@stop
