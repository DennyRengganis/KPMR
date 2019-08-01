@extends('layouts.default')
@section('css')
<link rel="stylesheet" type="text/css" href="/css/open-iconic-bootstrap.css">
<link rel="stylesheet" type="text/css" href="/css/size.css">
<link rel="stylesheet" type="text/css" href="/css/page.css">
@endsection
@section('content')
<div class="header">
	<h1>Search Room</h1>
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
		<div class="example">jkdfjdskjdf</div>
	</div>
	<div class="row">
		<div class="col-w-1 col-s-1"></div>
		<div class="col-w-2 col-s-2 center">
			<div class="dropdownbox">
				Building :
				<select name="Building">
					<option value="ACCF">ACCF</option>
					<option value="TBS">TBS</option>
				</select>
			</div>
		</div>
		<div class="col-w-4 col-s-2"></div>
		<div class="col-w-2 col-s-2 center">
			Floor :
			<select name="Floor">
				<option value="1">1</option>
				<option value="2">2</option>
				<option value="3">3</option>
				<option value="4">4</option>
				<option value="4">5</option>
			</select>
		</div>
		<button type="submit" class="btn btn-primary col-w-1 col-s-2 center" value="search">search</button>
	</form>
	<button type="button" class="btn btn-primary col-w-1 col-s-2 center">+Booking</button>
	<div class="col-w-1 col-s-1"></div>
</div>
<div class="row">
	<div class="col-w-1 col-s-1"></div>
	<div class="col-w-10 col-s-10">
		@foreach($liat as $room)
		<tr>
			<div class="col-4 col-s-4 center">
				@if($room->status_now==="FREE")
				<td>
					{{$room->id}}
					{{$room->nama_ruangan}}
					{{$room->gedung}}
					{{$room->lantai}}
					{{$room->status_now}}
					room is free
					<span class="oi oi-plus"></span>
					<br>
				</td>
				@endif

				@if($room->status_now==="BOOKED")
				<td>
					{{$room->id}}
					{{$room->nama_ruangan}}
					{{$room->gedung}}
					{{$room->lantai}}
					{{$room->status_now}}
					room is booked
					<button type="button" class="btn btn-primary">Schedule Meeting</button>
					<br>
				</td>
				@endif

				@if($room->status_now==="WAITING")
				<td>
					{{$room->id}}
					{{$room->nama_ruangan}}
					{{$room->gedung}}
					{{$room->lantai}}
					{{$room->status_now}}
					room is waiting
					<button type="button" class="btn btn-primary">Schedule Meeting</button>
					<br>
				</td>
				@endif
			</div>
		</tr>
		@endforeach
	</div>
	<div class="col-1 col-s-1"></div>
</div>
@endsection