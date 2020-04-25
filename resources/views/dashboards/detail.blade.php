@extends('layout.master')

@section('content')

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
        @if($sel->status == 1)
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

@stop
