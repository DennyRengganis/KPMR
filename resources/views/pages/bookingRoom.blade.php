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
      <h1>Booking form</h1>
    </div>
    <div class="col-w-2 col-s-2 hide">
      <button type="button" onclick="window.location.href = '/'" class="btn btn-secondary">home</button>
    </div>
  </div>
</div>

<div class="">
  <ul>
        @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
        @endforeach
    </ul>
</div>

@if (Session::has('input'))
<div class="book-popup-w book-popup-s" id="notif">
      @php
        $notice= Session::get('input'); 
      @endphp
      <b>Confirmation PIN</b>
      <br>
      <br>
      Thank you <b>{{$notice->nama}}!</b> Your Reservartion is confirmed.<br>
      Please check your e-mail and Save this Details for check-in in tablet:
      <br>
      <br>
      Booking ID : {{$notice->id}}<br>
      PIN : <b>{{$notice->PIN}}</b><br>
      <div class="row">
        <div class="col-s-9 col-w-9"></div>
        <div class="col-w-3 col-s-3">
          <button type="button" class="btn btn-primary" onclick="closeForm()">Ok</button>
        </div>
      </div>
</div>
@endif


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
      Building :
      <br>
      <select name="building">
        <option value="0">-Building-</option>
        @if(@isset($pickedbuilding))
        @foreach($gedung as $gd)
        @if($gd->id===$pickedbuilding->id)
        <option value="{{$gd->id}}" selected="selected">{{$gd->nama_gedung}}</option>
        @else
        <option value="{{$gd->id}}">{{$gd->nama_gedung}}</option>
        @endif
        @endforeach
        @else
        @foreach($gedung as $gd)
        <option value="{{$gd->id}}">{{$gd->nama_gedung}}</option>
        @endforeach
        @endif
      </select>
    </div>
    <div class="col-w-1 col-s-1"></div>
    <div class="col-w-3 col-s-3 left">
      Floor: 
      <br>
      <select name="floor">
        <option value="0">--</option>
        @if(@isset($pickedroom))
        @for($i=1;$i<=$pickedbuilding->jumlah_lantai;$i++)
        @if($i==$pickedfloor)
        <option value="{{$i}}" selected="selected">{{$i}}</option>
        @else
        <option value="{{$i}}">{{$i}}</option>
        @endif
        @endfor
        @endif
      </select>
    </div>
    <div class="col-w-3 col-s-3 left">
      Room: 
      <br>
      <select name="id_Ruangan">
       <option value="0">--</option>
       @if(@isset($pickedroom))
       @foreach($roompool as $ruangan)
       @if($ruangan->id===$pickedroom->id)
       <option value="{{$ruangan->id}}" selected="selected">{{$ruangan->nama_ruangan}}</option>
       @else
       <option value="{{$ruangan->id}}">{{$ruangan->nama_ruangan}}</option>
       @endif
       @endforeach
       @endif
      </select>
    </div>
    <div class="col-w-1 col-s-1"></div>
  </div>
  <div class="row">
   <div class="col-w-1 col-s-1"></div>
   <div class="col-w-4 col-s-4 left">
     Start Book:
     <br> 
     <div class="input-group date form_datetime" data-date="" data-date-format="yyyy-mm-dd hh:ii" data-link-field="dtp_input1">
     <span class="input-group-addon"><span class="glyphicon glyphicon-remove"></span></span>
     <span class="input-group-addon"><span class="glyphicon glyphicon-th"></span></span>
     <input class="form-control" size="16" type="text" value="" readonly>

     <!-- </div> -->
     <input type="hidden" name="waktu_Pinjam_Mulai" value="" /><br/>
     <!-- <input type="date" name="start_booking"> -->
     </div>
   </div>
   <div class="col-w-3 col-s-3 left">
    End Booking :
    <br>
       <div class="input-group date form_datetime" data-date-format="yyyy-mm-dd hh:ii" data-link-field="dtp_input1">
        <span class="input-group-addon"><span class="glyphicon glyphicon-remove"></span></span>
        <span class="input-group-addon"><span class="glyphicon glyphicon-th"></span></span>
        <input class="form-control" size="16" type="text" value="" readonly>
        <!-- </div> -->
        <input type="hidden" name="waktu_Pinjam_Selesai" value=""/><br/>
        <!--     <input type="date" name="end_booking"> -->
      </div>
   </div>

   <div class="col-w-3 col-s-3 left">
     Purpose :
     <input type="text" name="keperluan" value="">
   </div>
   <div class="col-w-1 col-s-1"></div>
  </div>
  <div class="row">
   <div class="col-w-1 col-s-1"></div>
   <div class="col-w-3 col-s-3 left">
      NPK :
      <br>
        <input type="integer" name="NPK" value="">
   </div>
   <div class="col-w-1 col-s-1"></div>
   <div class="col-w-3 col-s-3 left">
     Nama :
     <br>
     <input type="text" name="nama" value="">
   </div>
   <div class="col-w-3 col-s-3 left">
     Email:
     <br>
     <input type="text" name="email" value="">
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
    @if(@isset($backflag))
    <button type="button" onclick="window.location.href = '/detailRoom/{{$pickedroom->id}}'" class="btn btn-secondary col-w-2 col-s-2 center">cancel</button>
    @else
    <button type="button" onclick="window.location.href = '/'" class="btn btn-secondary col-w-2 col-s-2 center">cancel</button>
    @endif  
    <div class="col-w-1 col-s-1"></div>
    <button type="submit" value="Book" class="btn btn-primary col-w-2 col-s-2 center">Book</button>
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