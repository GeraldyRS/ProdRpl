@extends('layout.master')
@section('content')
{{-- class tooltip --}}
<style>
</style>
<?php $i=0?>
<br><br><br><br><br>
<div class="main-content">
  <form action="/user/1/">
    <div class="table-responsive"> 
    <input required type="date" name="tanggal" id="tanggal" >
    *format waktu 24 jam (1 siang = 13)
    <br><br> 
     <table border="1" class="table table-bordered" id="jadwal">  
      <thead>
        <tr>
          <td>No</td>
          <td>Waktu Mulai</td>
          <td>Waktu Selesai</td>
          <td>Kegiatan</td>
          <td>Mata pelajaran</td>
        </tr>
      </thead>
      <tbody>
      </tbody>
    </table>
    <br>
    <button type="button" name="addrow" onclick="addrows()" id="addrow" class="btn btn-success">Add More</button>
    <button type="button" onclick="remove()" name="remove" id="remove" class="btn btn-danger btn_remove">Remove row</button>
    <button type="submit" class="btn btn-primary">Submit</button>
    <input  type="hidden" name="no" id="no"/>
  </div>
</form>
</div>
<script type="text/javascript">
  var i=0; 
  function addrows(){  
   i++;  
   $('#jadwal').append('<tr id="row'+i+'"><td style="text-align:center;">'+i+'</td><td><input required type="time" id="mulai'+i+'" name="mulai'+i+'"></td><td><input required type="time" id="selesai'+i+'" name="selesai'+i+'"></td><td><input required type="textarea" name="kegiatan'+i+'" id="kegiatan'+i+'" placeholder="Kegiatan" class="form-control name_list"/><label>Perlu Lampiran ?</label><br><input required type="radio" name="r'+i+'" id="r'+i+'" value="1"><label for="r'+i+'">Yes</label><input required type="radio" name="r'+i+'" id="r'+i+'"><label for="r'+i+'">No</label></td><td><select id="mapel'+i+'" name="mapel'+i+'"><option value="PJOK">PJOK</option><option value="PPKN">PPKN</option><option value="PABP">PABP</option></select></td></tr>');
   document.getElementById("no").value = i; 
 };  
 function remove() {
  if (i>0) {
  i--;
  document.getElementById("jadwal").deleteRow(-1);
  document.getElementById("no").value = i;
  }  
}
document.querySelector("#tanggal").valueAsDate = new Date();
</script>
@stop