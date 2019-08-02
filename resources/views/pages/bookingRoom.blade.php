@extends('layouts.default')
@section('css')
<link rel="stylesheet" type="text/css" href="/css/open-iconic-bootstrap.css">
<link rel="stylesheet" type="text/css" href="/css/size.css">
<link rel="stylesheet" type="text/css" href="/css/page.css">
<!-- <link rel="stylesheet" type="text/css" href="/css/bootstrap3.css"> -->
<link rel="stylesheet" type="text/css" href="/css/bootstrap-datetimepicker.css">
@endsection
@section('content')
<div class="header">
  <h1>Booking form</h1>
</div>
<form action="/action_page.php">
  <div class="row">
    <div class="col-w-1 col-s-1">h</div>
    <div class="col-w-1 col-s-1">h</div>
    <div class="col-w-1 col-s-1">h</div>
    <div class="col-w-1 col-s-1">h</div>
    <div class="col-w-1 col-s-1">h</div>
    <div class="col-w-1 col-s-1">h</div>
    <div class="col-w-1 col-s-1">h</div>
    <div class="col-w-1 col-s-1">h</div>
    <div class="col-w-1 col-s-1">h</div>
    <div class="col-w-1 col-s-1">h</div>
    <div class="col-w-1 col-s-1">h</div>
    <div class="col-w-1 col-s-1">h</div>
  </div>
  <div class="row">
    <div class="col-w-1 col-s-1"></div>
    <div class="col-w-4 col-s-4 center">
      Building :
      <select name="Building">
        <option value="ACCF">ACCF</option>
        <option value="TBS">TBS</option>
      </select>
    </div>
    <div class="col-w-1 col-s-1"></div>
    <div class="col-w-2 col-s-2 center">
      Floor: 
      <select name="Floor">
        <option value="1">1</option>
        <option value="2">2</option>
        <option value="3">3</option>
        <option value="4">4</option>
        <option value="4">5</option>
      </select>
    </div>
    <div class="col-w-1 col-s-1"></div>
    <div class="col-w-2 col-s-2 center">
     Floor: 
     <select name="Room">
      <option value="1">1</option>
      <option value="2">2</option>
      <option value="3">3</option>
      <option value="4">4</option>
      <option value="4">5</option>
    </select>
  </div>
  <div class="col-w-1 col-s-1"></div>
</div>
<div class="row">
  <div class="col-w-1 col-s-1"></div>
    <div class="input-group date form_datetime col-w-3 col-s-3 center" data-date="2019-06-16T05:25:07Z" data-date-format="dd MM yyyy - HH:ii p" data-link-field="dtp_input1">
    Start Booking : 
      <input class="form-control" size="16" type="text" value="" readonly>
      <span class="input-group-addon"><span class="glyphicon glyphicon-remove"></span></span>
      <span class="input-group-addon"><span class="glyphicon glyphicon-th"></span></span>
      <!-- </div> -->
    <input type="hidden" id="dtp_input1" value="" /><br/>
    <!-- <input type="date" name="start_booking"> -->
  </div>
  <div class="col-w-1 col-s-1"></div>
 <div class="input-group date form_datetime col-w-3 col-s-3 center" data-date="2019-06-16T05:25:07Z" data-date-format="dd MM yyyy - HH:ii p" data-link-field="dtp_input1">
    End Booking :
    <input class="form-control" size="16" type="text" value="" readonly>
      <span class="input-group-addon"><span class="glyphicon glyphicon-remove"></span></span>
      <span class="input-group-addon"><span class="glyphicon glyphicon-th"></span></span>
      <!-- </div> -->
    <input type="hidden" id="dtp_input1" value="" /><br/>
<!--     <input type="date" name="end_booking"> -->
  </div>
  <div class="col-w-3 col-s-3 center">
    Purpose :
    <input type="text" name="purpose" value="purpose">
  </div>
  <div class="col-w-1 col-s-1"></div>
</div>
<div class="row">
  <div class="col-w-1 col-s-1"></div>
  <div class="col-w-3 col-s-3 center">
    NPK :
    <input type="integer" name="npk" value="npk">
  </div>
  <div class="col-w-1 col-s-1"></div>
  <div class="col-w-3 col-s-3 center">
    Nama :
    <input type="text" name="nama" value="nama">
  </div>
  <div class="col-w-3 col-s-3 center">
    Email:
    <input type="text" name="email" value="email">
  </div>
  <div class="col-w-1 col-s-1"></div>
</div>
<div class="row">
  <div class="col-w-6 col-s-6"></div>
  <button type="submit" value="Book" class="btn btn-primary col-w-2 col-s-2 center">Book</button>
  <div class="col-w-1 col-s-1"></div>
  <button type="button" class="btn btn-secondary col-w-2 col-s-2 center">cancel</button>
  <div class="col-w-1 col-s-1"></div>
</div>
<script type="text/javascript" src="/js/bootstrap.bundle.js" ></script>
<script type="text/javascript" src="/js/jquery-1.8.3.min.js" charset="UTF-8"></script>
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