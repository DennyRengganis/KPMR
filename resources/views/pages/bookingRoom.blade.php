@extends('layouts.default')
@section('css')
<link rel="stylesheet" type="text/css" href="/css/open-iconic-bootstrap.css">
<link rel="stylesheet" type="text/css" href="/css/size.css">
<link rel="stylesheet" type="text/css" href="/css/page.css">
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
    <div class="col-w-1"></div>
    <div class="col-w-4 center">
      Building :
      <select name="Building">
        <option value="ACCF">ACCF</option>
        <option value="TBS">TBS</option>
      </select>
    </div>
    <div class="col-w-1"></div>
    <div class="col-w-2 center">
      Floor: 
      <select name="Floor">
        <option value="1">1</option>
        <option value="2">2</option>
        <option value="3">3</option>
        <option value="4">4</option>
        <option value="4">5</option>
      </select>
    </div>
    <div class="col-w-1"></div>
    <div class="col-w-2 center">
     Floor: 
     <select name="Room">
      <option value="1">1</option>
      <option value="2">2</option>
      <option value="3">3</option>
      <option value="4">4</option>
      <option value="4">5</option>
    </select>
  </div>
  <div class="col-w-1"></div>
</div>
<div class="row">
  <div class="col-w-1"></div>
  <div class="col-w-3 center">
    Start Booking :
    <input type="date" name="start_booking">
  </div>
  <div class="col-w-1"></div>
  <div class="col-w-3 center">
    End Booking :
    <input type="date" name="end_booking">
  </div>
  <div class="col-w-1"></div>
  <div class="col-w-3 center">
    Purpose :
    <input type="text" name="purpose" value="purpose">
  </div>
</div>
<div class="row">
<div class="col-w-1"></div>
<div class="col-w-3 center">
NPK :
<input type="integer" name="npk" value="npk">
</div>
<div class="col-w-1"></div>
<div class="col-w-3 center">
Nama :
<input type="text" name="nama" value="nama">
</div>
<div class="col-w-1"></div>
<div class="col-w-3 center">
Email:
<input type="text" name="email" value="email">
</div>
</div>
<br><br>
<input type="submit" value="Book">

<script type="text/javascript" href="/js/bootstrap.bundle.js" ></script>
@endsection