@extends('layouts.default')
<script type="text/javascript" src="/js/jquery-1.8.3.min.js" charset="UTF-8"></script>
@section('css')
<link rel="stylesheet" type="text/css" href="/css/open-iconic-bootstrap.css">
<link rel="stylesheet" type="text/css" href="/css/size.css">
<link rel="stylesheet" type="text/css" href="/css/page.css">
@endsection
@section('content')
	<div class="col-s-12 center pageRoomFont">
		TODAY:
		<br>
		@if(count($detail))
		@foreach($detail as $dt)
		
		@php
		$date = "$dt->waktu_Pinjam_Mulai";
		$date = strtotime($date);
		echo date('H:i', $date);
		echo " - ";
		$datedone= "$dt->waktu_Pinjam_Selesai";
		$datedone = strtotime($datedone);
		echo date('H:i', $datedone);
		@endphp
		
		<br> 
		{{$dt->keperluan}}<br>
		{{$dt->nama}}<br>
		@endforeach
		@endif
		<br>
		<br>
		TOMORROW:
		@php
		$hari = "tomorrow";
		$hari = strtotime($hari);
		echo date('D, d-m-Y', $hari);
		@endphp
		
		@if(count($besok))
		@foreach($besok as $dt)
		
		@php
		$date = "$dt->waktu_Pinjam_Mulai";
		$date = strtotime($date);
		echo date('H:i', $date);
		echo " - ";
		$datedone= "$dt->waktu_Pinjam_Selesai";
		$datedone = strtotime($datedone);
		echo date('H:i', $datedone);
		@endphp
		<br>
		{{$dt->keperluan}}<br>
		{{$dt->nama}}<br>
		<br>
		<br>
		@endforeach
		@endif
	</div>
</div>
@endsection