@extends('layouts.default')
<script type="text/javascript" src="/js/jquery-3.4.1.min.js" charset="UTF-8"></script>
@section('css')
<link rel="stylesheet" type="text/css" href="/css/open-iconic-bootstrap.css">
<link rel="stylesheet" type="text/css" href="/css/size.css">
<link rel="stylesheet" type="text/css" href="/css/page.css">
<!-- <link rel="stylesheet" type="text/css" href="/css/bootstrap3.css"> -->
<link rel="stylesheet" type="text/css" href="/css/bootstrap-datetimepicker.css">
@endsection
@section('content')
<div class="header">
  <div class="row">
    <div class="col-s-12 col-w-10">
      <h1>Masterize time</h1>
    </div>
  </div>
</div>

<div class="bodybr">
  <form action="/bookroom" method="post">
  @csrf
  <div class="row">
    <div class="col-w-1 col-s-1"></div>
    <div class="col-w-1 col-s-1"></div>
    <div class="col-w-1 col-s-1"></div>
    <div class="col-w-1 col-s-1"></div>
    <div class="col-w-1 col-s-1"></div>
    <div class="col-w-1 col-s-1"></div>
    <div class="col-w-1 col-s-1"></div>
    <div class="col-w-1 col-s-1"></div>
    <div class="col-w-1 col-s-1"></div>
    <div class="col-w-1 col-s-1"></div>
    <div class="col-w-1 col-s-1"></div>
    <div class="col-w-1 col-s-1"></div>
  </div>
  <div class="row pageRoomFont">
    <div class="col-w-1 col-s-1"></div>
    <div class="col-w-3 col-s-3 left">
    </div>
    <div class="col-w-1 col-s-1"></div>
    <div class="col-w-3 col-s-3 left">
    </div>
    <div class="col-w-3 col-s-3 left">
    </div>
    <div class="col-w-1 col-s-1"></div>
  </div>
  <div class="row">
   <div class="col-w-1 col-s-1"></div>
   <div class="col-w-10 col-s-10 center">
      Masterize waiting time(in minute) :
      <br>
        <input type="integer" name="time in minute" value="">
   </div>
   <div class="col-w-1 col-s-1"></div>
  </div>
  <div class="row">
   <div class="col-w-1 col-s-1"></div>
   <div class="col-w-3 col-s-3 left">
   </div>
   <div class="col-w-1 col-s-1"></div>
   <div class="col-w-3 col-s-3 left">
     Nama :
     <br>
     <input type="text" name="nama" value="">
   </div>
   <div class="col-w-3 col-s-3 left">
   </div>
   <div class="col-w-1 col-s-1"></div>
  </div>
  <div class="row">
    <div class="col-w-1 col-s-1"></div>
    <div class="col-w-1 col-s-1"></div>
    <div class="col-w-1 col-s-1"></div>
    <div class="col-w-1 col-s-1"></div>
    <div class="col-w-1 col-s-1"></div>
    <div class="col-w-1 col-s-1"></div>
    <div class="col-w-1 col-s-1"></div>
    <div class="col-w-1 col-s-1"></div>
    <div class="col-w-1 col-s-1"></div>
    <div class="col-w-1 col-s-1"></div>
    <div class="col-w-1 col-s-1"></div>
    <div class="col-w-1 col-s-1"></div>
  </div>
  <div class="row">
    <div class="col-w-6 col-s-6"></div>
    <button type="button" onclick="window.location.href = '/adminXmeetingYroomZhome'" class="btn btn-secondary col-w-2 col-s-2 center">Cancel</button>
    <div class="col-w-1 col-s-1"></div>
    <button type="submit" value="Book" class="btn btn-primary col-w-2 col-s-2 center">Update</button>
    <div class="col-w-1 col-s-1"></div>
  </div>
  </form>
</div>
<script type="text/javascript" src="/js/bootstrap.bundle.js" ></script>
<script type="text/javascript" src="/js/bootstrap-datetimepicker.js" charset="UTF-8"></script>
<script type="text/javascript" src="/js/locales/bootstrap-datetimepicker.id.js" charset="UTF-8"></script>
<script type="text/javascript">
  $('.form_datetime').datetimepicker({
        //language:  'fr',
        weekStart: 1,
        todayBtn:  1,
        autoclose: 1,
        todayHighlight: 1,
        startView: 2,
        forceParse: 0,
        showMeridian: 1
      });
  $('.form_date').datetimepicker({
    language:  'id',
    weekStart: 1,
    todayBtn:  1,
    autoclose: 1,
    todayHighlight: 1,
    startView: 2,
    minView: 2,
    forceParse: 0
  });
  $('.form_time').datetimepicker({
    language:  'id',
    weekStart: 1,
    todayBtn:  1,
    autoclose: 1,
    todayHighlight: 1,
    startView: 1,
    minView: 0,
    maxView: 1,
    forceParse: 0
  });
</script>

@endsection


<script type="text/javascript">
  var buildingID=0;

  $(document).ready(function() {
    $('select[name="building"]').on('change', function() {
      buildingID = $(this).val();
      console.log(buildingID);
      if(buildingID) {
        $.ajax({
          url: '/home/ajax/'+buildingID,
          type: "GET",
          dataType: "json",
          success:function(data) {

            console.log(data); 


            $('select[name="floor"]').empty();
            $('select[name="id_Ruangan"]').empty();
            $('select[name="floor"]').append('<option value="0">--</option>');
            $('select[name="id_Ruangan"]').append('<option value="0">--</option>');
            var max_floor = data[0]["jumlah_lantai"];
            var i;
            for(i=1;i<=max_floor;i++){
              $('select[name="floor"]').append('<option value="'+ i +'">'+ i +'</option>');
            }

          }
        });
      }else{
        $('select[name="floor"]').empty();
        $('select[name="id_Ruangan"]').empty();
        $('select[name="floor"]').append('<option value="0">--</option>');
        $('select[name="id_Ruangan"]').append('<option value="0">--</option>');
      }
    });
  });
</script>

<script type="text/javascript">
  $(document).ready(function() {
    $('select[name="floor"]').on('change', function() {
      floorpick = $(this).val();
      console.log(floorpick);
      console.log("buid: ")
      console.log(buildingID);
      if(floorpick) {
        $.ajax({
          url: '/home/ajax/'+buildingID+'/'+floorpick,
          type: "GET",
          dataType: "json",
          success:function(data) {

            console.log(data);


            $('select[name="id_Ruangan"]').empty();
            $('select[name="id_Ruangan"]').append('<option value="0">--</option>');
            var room= data;
            $.each(data,function(id,val){
              console.log("masuk each");
              console.log("data each:")
              console.log(id);
              console.log(val);
              console.log(val['id']);
              console.log(val['nama_ruangan']);
              console.log(val['status_now']);
              $('select[name="id_Ruangan"]').append('<option value="'+ val['id'] +'">'+ val['nama_ruangan'] +'</option>');
            });
          }
        });
      }else{
        $('select[name="id_Ruangan"]').empty();
        $('select[name="id_Ruangan"]').append('<option value="0">--</option>');
      }
    });
  });
  function closeForm() {
    document.getElementById("notif").style.display = "none";
  }

</script>

<script type="text/javascript">

  $(document).ready(function(){
    $('input[name="waktu_Pinjam_Selesai"]').on('change', function(){
      var wselesai= $(this).val();
      var wmulai= $('input[name="waktu_Pinjam_Mulai"').val();
      var wm = new Date(wmulai).getTime();
      var ws = new Date(wselesai).getTime();
      if(ws<=wm){
        alert("Waktu Selesai tidak bisa sebelum Waktu Mulai");
        location.reload();
      }

    });
  });    

</script>