@extends('layout.master')
@section('content')
<br><br><br><br><br>
<style type="text/css">
</style>
  <div class="main-content">
    <table border="1" class="table table-bordered" id="jadwal">  
      <thead>
        <tr>
          <td>Waktu Mulai</td>
          <td>Waktu Selesai</td>
          <td>Kegiatan</td>
          <td>Mata pelajaran</td>
          <td>Lampiran tugas<br><font size="1">(Bukti foto atau dokumen)</font></td>
        </tr>
      </thead>
      <tbody>
    @foreach($select as $sel)
    <tr>
      <td>{{$sel->mulai}}</td>
      <td>{{$sel->selesai}}</td>
      <td>{{$sel->kegiatan}}</td>
      <td>{{$sel->mapel}}</td>
      <td>
        @if($sel->lampiran == 1)
        @if($sel->status == 1 ||$sel->status == 2)
        <form style="display:flex; flex-flow:row wrap; align-items: center;" action="/project/{{$sel->id}}/delete">
         <a href="{{URL::asset('../file/'.@$sel->bukti)}}"
 download="{{$sel->bukti}}"><i class="fa fa-download"></i>
 {{$sel->bukti}} </a><input class="btn btn-danger" type="submit" value="Remove">
        </form>
        @else
        <form style="display:flex; flex-flow:row wrap; align-items: center;" action="/project/{{$sel->id}}/info">
        <input type="file" name="bukti" id="bukti"><input class="btn btn-primary" type="submit">
        </form>
        @endif
        @endif
      </td>
    </tr>
    @endforeach
      </tbody>
    </table>
    </div>
    @stop
