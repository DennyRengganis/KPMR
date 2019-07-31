@extends('layouts.default')
@section('css')
<link rel="stylesheet" type="text/css" href="/css/open-iconic-bootstrap.css">
<link rel="stylesheet" type="text/css" href="/css/size.css">
@endsection
@section('content')
	@if($room->status_now==="FREE")
	<div class="big">
	<td>
	{{$room->id}}
	{{$room->nomor}}
	{{$room->gedung}}
	{{$room->lantai}}
	{{$room->status_now}}
	room is free
	<br>
	</td>
	</div>
	@endif

	@if($room->status_now==="BOOKED")
	<div class="small">
	<td>
	{{$room->id}}
	{{$room->nomor}}
	{{$room->gedung}}
	{{$room->lantai}}
	{{$room->status_now}}
	room is booked
	<br>
	</td>
	</div>
	@endif

	@if($room->status_now==="WAITING")
	<div class="med">
	<td>
	{{$room->id}}
	{{$room->nomor}}
	{{$room->gedung}}
	{{$room->lantai}}
	{{$room->status_now}}
	room is waiting
	<br>
	</td>
	</div>
	@endif
@endsection
