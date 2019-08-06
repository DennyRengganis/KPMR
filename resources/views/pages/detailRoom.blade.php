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
<br>
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

				[TEMPAT COUNTDOWN]
				<p id="bookedcd"></p>
				<br>
				<br>
				{{$detail['0']->keperluan}}
				<br>
				Booked by: {{$detail['0']->nama}}
				<br>
				<form action="/bookingRoom/{{$info->id}}/1" method="get" target="_self"><button type="submit" class="btn btn-primary">+Schedule Meeting</button></form>


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

				[TEMPAT COUNTDOWN]
				<p id="waitingcd"></p>
				@php
				@endphp
				<br>
				{{$detail['0']->keperluan}}
				<br>
				Booked by: {{$detail['0']->nama}}
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
						<form action="/bookingRoom/{{$info->id}}/1" method="get" target="_self"><button type="submit" class="btn btn-primary">+Schedule Meeting</button></form>
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

				<form action="/bookingRoom/{{$info->id}}/1" method="get" target="_self"><button type="submit" class="btn btn-primary">Book Now</button></form>
				
				
			</div>
			@endif	
		</div>
	</div>
	<div class="col-w-6 col-s-6 center">
		Kejam
	</div>
</div>
<script>
// Set the date we're counting down to
var countDownDate = new Date("{{$detail['0']->waktu_Pinjam_Selesai}}").getTime();

// Update the count down every 1 second
var x = setInterval(function() {

  // Get today's date and time
  var now = new Date().getTime();
    
  // Find the distance between now and the count down date
  var distance = countDownDate - now;
    
  // Time calculations for days, hours, minutes and seconds
  var days = Math.floor(distance / (1000 * 60 * 60 * 24));
  var hours = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
  var minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
  var seconds = Math.floor((distance % (1000 * 60)) / 1000);
    
  // Output the result in an element with id="demo"
  document.getElementById("bookedcd").innerHTML = hours + "h "
  + minutes + "m " + seconds + "s ";
    
  // If the count down is over, write some text 
  if (distance < 0) {
    clearInterval(x);
    document.getElementById("bookedcd").innerHTML = "EXPIRED";
  }
}, 1000);
</script>

<script>

// Set the date we're counting down to
var countDownDate = new Date().getTime()+600000;

// Update the count down every 1 second
var x = setInterval(function() {

var now = new Date().getTime();

var distance = countDownDate - now;
    
  // Time calculations for days, hours, minutes and seconds
/*  var days = Math.floor(distance / (1000 * 60 * 60 * 24));
  var hours = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));*/
  var minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
  var seconds = Math.floor((distance % (1000 * 60)) / 1000);
    
  // Output the result in an element with id="demo"
  document.getElementById("waitingcd").innerHTML = minutes + "m " + seconds + "s ";

  // If the count down is over, write some text 
  if (distance < 0) {
    clearInterval(x);
    document.getElementById("waitingcd").innerHTML = "EXPIRED";
  }
}, 1000);
</script>

@endsection