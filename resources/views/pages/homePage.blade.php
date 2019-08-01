@extends('layouts.default')
<script src="http://demo.itsolutionstuff.com/plugin/jquery.js"></script>
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
				<select name="building">
					<option value="0">Building</option>
					@foreach ($gedung as $gd)
					<option value="{{ $gd->id }}">{{ $gd->nama_gedung }}</option>
					@endforeach
				</select>
			</div>
		</div>
		<div class="col-w-4 col-s-2"></div>
		<div class="col-w-2 col-s-2 center">
			Floor :
			<select name="floor">
				<option value="0"></option>
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
		@foreach($ruangan as $room)
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

<script type="text/javascript">
	$(document).ready(function() {
		$('select[name="building"]').on('change', function() {
			var buildingID = $(this).val();
			console.log(buildingID);
			if(buildingID) {
				$.ajax({
					url: '/home/ajax/'+buildingID,
					type: "GET",
					dataType: "json",
					success:function(data) {

						console.log(data);


						$('select[name="floor"]').empty();
						var max_floor = data["jumlah_lantai"];
						var i;
						for(i=1;i<=max_floor;i++){
							$('select[name="floor"]').append('<option value="'+ i +'">'+ i +'</option>');
						}

					}
				});
			}else{
				$('select[name="floor"]').empty();
			}
		});
	});
</script>