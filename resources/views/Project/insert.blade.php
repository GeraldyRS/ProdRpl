@extends('layout.master')
@section('content')
<br><br><br><br><br><br>
  <div class="main-content">
    @foreach($select as $sel)
    <a href="/project/{{$sel->id_jadwal}}/detail">
      <button class="btn btn-primary">
        {{$sel->tanggal}}
                </button><a>
    @endforeach
  </div>
  <script type="text/javascript">
  </script>
  @stop
