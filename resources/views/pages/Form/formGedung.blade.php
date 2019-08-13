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
  </div>
</div>

<div class="">
  <ul>
        @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
        @endforeach
    </ul>
</div>

@if(isset($buildings))
@php
  $actionstring="/AdminXmeetingYroomZ/updateGedung";
@endphp
@else
@php
  $actionstring="/AdminXmeetingYroomZ/saveGedung";
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
   <div class="col-w-5 col-s-5 left">
     Nama Gedung:
     <br>
     @if(isset($buildings))
     <input type="hidden" name="id" value="{{$buildings->id}}">
     <input type="text" name="nama_gedung" value="{{$buildings->nama_gedung}}">
     @else
     <input type="text" name="nama_gedung" value="">
     @endif
   </div>
   <div class="col-w-5 col-s-5 left">
     Jumlah Lantai :
     <br>
     @if(isset($buildings))
     <input type="text" name="jumlah_lantai" value="{{$buildings->jumlah_lantai}}">
     @else
     <input type="text" name="jumlah_lantai" value="">
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
    <div class="col-w-1 col-s-1"></div>
    <button type="button" onclick="window.location.href = '/adminXmeetingYroomZhome'" class="btn btn-secondary col-w-2 col-s-2 center">Cancel</button>
    <div class="col-w-3 col-s-3"></div>
    @if(isset($buildings))
    <button type="button" onclick="window.location.href = '/AdminXmeetingYroomZ/deleteGedung/'" class="btn btn-secondary col-w-2 col-s-2 center">Delete</button>
    @endif
    <div class="col-w-1 col-s-1"></div>
    <button type="submit" value="Book" class="btn btn-primary col-w-2 col-s-2 center">Tambah/Update</button>
    <div class="col-w-1 col-s-1"></div>
  </div>
  </form>
</div>
<script type="text/javascript" src="/js/bootstrap.bundle.js" ></script>
<script type="text/javascript" src="/js/bootstrap-datetimepicker.js" charset="UTF-8"></script>
<script type="text/javascript" src="/js/locales/bootstrap-datetimepicker.id.js" charset="UTF-8"></script>

@endsection