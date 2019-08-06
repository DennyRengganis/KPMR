@extends('layouts.default')
<script type="text/javascript" src="/js/jquery-1.8.3.min.js" charset="UTF-8"></script>
@section('css')
<link rel="stylesheet" type="text/css" href="/css/open-iconic-bootstrap.css">
<link rel="stylesheet" type="text/css" href="/css/size.css">
<link rel="stylesheet" type="text/css" href="/css/page.css">
@endsection
@section('content')
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
	<div class="col-w-6 col-s-6 center">
		<div class="row">
			@if($info->status_now=="BOOKED")
			<div class="booked col-w-12 col-s-12 center">
				{{$info->nama_ruangan}}
				<br>
				[TEMPAT TANGGAL SKRG]
				<br>
				{{$info->status_now}}
				<br>

				@foreach($detail as $dt) 
				@if($loop->first)
				[TEMPAT COUNTDOWN]
				<br>
				{{$dt->keperluan}}
				<br>
				Booked by: {{$dt->nama}}
				<br>
				@endif
				@endforeach
				<form action="/bookingRoom/{{$info->id}}" method="get" target="_self"><button type="submit" class="btn btn-primary">+Schedule Meeting</button></form>


			</div>
			@endif

			@if($info->status_now=="WAITING")
			<div class="waiting col-w-12 col-s-12 center">
				{{$info->nama_ruangan}}
				<br>
				[TEMPAT TANGGAL SKRG]
				<br>
				{{$info->status_now}}
				<br>

				@foreach($detail as $dt) 
				@if($loop->first)
				[TEMPAT COUNTDOWN]
				<br>
				{{$dt->keperluan}}
				<br>
				Booked by: {{$dt->nama}}
				@endif
				@endforeach
				<div class="row">
					<div class="waiting col-w-6 col-s-6 center">
						<button type="submit" class="btn btn-primary">Check in</button>
					</div>
					<div class="waiting col-w-6 col-s-6 center">
						<button type="submit" class="btn btn-primary">Cancel</button>
					</div>
				</div>
				<div class="row">
					<div class="waiting col-w-12 col-s-12 center">
						<form action="/bookingRoom/{{$info->id}}" method="get" target="_self"><button type="submit" class="btn btn-primary">+Schedule Meeting</button></form>
					</div>
				</div>
			</div>
			@endif

			@if($info->status_now=="FREE")
			<div class="free col-s-12 col-w-12 center">
				{{$info->nama_ruangan}}
				<br>
				[TEMPAT TANGGAL SKRG]
				<br>
				{{$info->status_now}}
				<br>

				@foreach($detail as $dt) 
				@if($loop->first)
				<br>
				@endif 
				@endforeach
				<form action="/bookingRoom/{{$info->id}}" method="get" target="_self"><button type="submit" class="btn btn-primary">Book Now</button></form>
				
				
			</div>
			@endif	
		</div>
	</div>
	<div class="col-w-6 col-s-6 center">
		Kejam
	</div>
</div>
@endsection