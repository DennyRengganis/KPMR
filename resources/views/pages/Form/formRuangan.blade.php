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
    <div class="col-s-12 col-w-12">
      <h1>Room form</h1>
    </div>
  </div>
</div>

@if(session('success'))
{{session('success')}}
@endif


@if(isset($gedungcreate))
@php
  $actionstring="/admin/saveRoom";
@endphp
@elseif(isset($buildings))
  @php
  $actionstring="/admin/saveRoom";
  @endphp
@elseif(isset($rooms))
  @php
  $actionstring="/admin/updateRoom";
  @endphp
@endif

<div class="bodybr">
  <form action="{{$actionstring}}" method="post">
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
   <div class="col-w-4 col-s-4 left">
    Building :
      <br>
      <select name="building">
        @if(isset($rooms))
        <option value="{{$rooms->id_gedung}}">{{$rooms->building_nama}}</option>
        @elseif(isset($buildings))
        <option value="{{$buildings->id}}">{{$buildings->nama_gedung}}</option>
        @elseif(isset($gedungcreate))
        <option value="0">-Building-</option>
        @foreach($gedungcreate as $gedung)
        <option value="{{$gedung->id}}">{{$gedung->nama_gedung}}</option>
        @endforeach
        @endif
      </select>
   </div>
   <div class="col-w-2 col-s-2 left">
         Floor: 
      <br>
      <select name="floor">
        @if(isset($rooms))
        <option value="{{$rooms->lantai}}">{{$rooms->lantai}}</option>
        @elseif(isset($lantai))
        <option value="{{$lantai}}">{{$lantai}}</option>
        @elseif(isset($gedungcreate))
        <option value="0">-Building-</option>
        @endif
        
      </select>
   </div>
   <div class="col-w-3 col-s-3 left">
      Nama Ruangan :
      @if(isset($rooms))
     <input type="text" name="nama_ruangan" value="{{$rooms->nama_ruangan}}">
     <input type="hidden" name="id" value="{{$rooms->id}}">
     @else
     <input type="text" name="nama_ruangan" value="">
     @endif
   </div>
   <div class="col-w-1 col-s-1"></div>
  </div>
  <div class="row">
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
    <button type="button" onclick="window.location.href = '/admin/home'" class="btn btn-secondary col-w-2 col-s-2 center">Cancel</button>
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