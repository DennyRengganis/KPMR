@extends('layouts.default')
@section('css')
<link rel="stylesheet" type="text/css" href="/css/open-iconic-bootstrap.css">
<link rel="stylesheet" type="text/css" href="/css/size.css">
@endsection
@section('content')
<button type="button" class="btn btn-primary">+Booking</button>
<form action="/action_page.php">
  <select name="Building">
    <option value="ACCF">ACCF</option>
    <option value="TBS">TBS</option>
  </select>
    <select name="Floor">
    <option value="1">1</option>
    <option value="2">2</option>
    <option value="3">3</option>
    <option value="4">4</option>
    <option value="4">5</option>
  </select>
  <br><br>
  <input type="submit" value="search">
</form>
	@if($room->status_now==="FREE")
	<td>
	{{$room->id}}
	{{$room->nomor}}
	{{$room->gedung}}
	{{$room->lantai}}
	{{$room->status_now}}
	room is free
	<span class="oi oi-plus"></span>
	<br>
	</td>
	</div>
	@endif

	@if($room->status_now==="BOOKED")
	<td>
	{{$room->id}}
	{{$room->nomor}}
	{{$room->gedung}}
	{{$room->lantai}}
	{{$room->status_now}}
	room is booked
	<button type="button" class="btn btn-primary">Schedule Meeting</button>
	<br>
	</td>
	</div>
	@endif

	@if($room->status_now==="WAITING")
	<td>
	{{$room->id}}
	{{$room->nomor}}
	{{$room->gedung}}
	{{$room->lantai}}
	{{$room->status_now}}
	room is waiting
	<button type="button" class="btn btn-primary">Schedule Meeting</button>
	<br>
	</td>
	</div>


	@endif
	
@endsection
