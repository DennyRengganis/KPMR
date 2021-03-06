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
      <h1>Masterize {{$config->key}}</h1>
    </div>
  </div>
</div>

<div class="bodybr">
  <form action="/admin/masterconfig/updateConfig" method="post">
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
   <div class="col-w-4 col-s-4"></div>
   <div class="col-w-4 col-s-4 center">
      Manage {{$config->key}} :
      <br>
        <input type="text" name="value" value="{{$config->value}}" style="text-align: center;">
        <input type="hidden" name="key" value="{{$config->key}}">
        <input type="hidden" name="id" value="{{$config->id}}">
   </div>
   <div class="col-w-4 col-s-4"></div>
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
    <button type="button" onclick="window.location.href = '/admin/masterconfig'" class="btn btn-secondary col-w-2 col-s-2 center">Cancel</button>
    <div class="col-w-1 col-s-1"></div>
    <button type="submit" class="btn btn-primary col-w-2 col-s-2 center">Update</button>
    <div class="col-w-1 col-s-1"></div>
  </div>
  </form>
</div>
<script type="text/javascript" src="/js/bootstrap.bundle.js" ></script>
<script type="text/javascript" src="/js/bootstrap-datetimepicker.js" charset="UTF-8"></script>
<script type="text/javascript" src="/js/locales/bootstrap-datetimepicker.id.js" charset="UTF-8"></script>
@endsection


