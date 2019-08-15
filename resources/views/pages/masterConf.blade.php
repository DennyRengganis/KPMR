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
     <button class="btn btn-primary" onclick="window.location.href = 'time'">Masterize waiting time</button>  
    </div>
    <div class="col-w-1 col-s-1"></div>
    <div class="col-w-3 col-s-3 left">
    </div>
    <div class="col-w-3 col-s-3 left">
    </div>
    <div class="col-w-1 col-s-1"></div>
  </div>
  <div class="row">
   <div class="col-w-4 col-s-4"></div>
   <div class="col-w-4 col-s-4 center">
   </div>
   <div class="col-w-4 col-s-4"></div>
  </div>
  <div class="row">
   <div class="col-w-1 col-s-1"></div>
   <div class="col-w-3 col-s-3 left">
   </div>
   <div class="col-w-1 col-s-1"></div>
   <div class="col-w-4 col-s-4 left">
   </div>
   <div class="col-w-2 col-s-2 left">
        <button type="button" onclick="window.location.href = '/admin/home'" class="btn btn-secondary">Back</button>
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
</div>
<script type="text/javascript" src="/js/bootstrap.bundle.js" ></script>
<script type="text/javascript" src="/js/bootstrap-datetimepicker.js" charset="UTF-8"></script>
<script type="text/javascript" src="/js/locales/bootstrap-datetimepicker.id.js" charset="UTF-8"></script>
@endsection

