@extends('layouts.default')
<script type="text/javascript" src="/js/jquery-3.4.1.min.js" charset="UTF-8"></script>
@section('css')
<link rel="stylesheet" type="text/css" href="/css/open-iconic-bootstrap.css">
<link rel="stylesheet" type="text/css" href="/css/size.css">
<link rel="stylesheet" type="text/css" href="/css/page.css">
<link rel="stylesheet" type="text/css" href="/css/detailroom.css">
@endsection
@section('content')
@if(count($errors))
<ul>
	@foreach ($errors->all() as $error)
	<li>{{ $error }}</li>
	@endforeach
</ul>
@endif
<div class="row">
	<div class="col-w-6 col-s-12 center roomFont">
		<div class="row">
			@if(count($detail))
			@if($info->status_now=="BOOKED")
			<div class="booked col-w-12 col-s-12 detailroombox detail-2">
				{{$info->nama_ruangan}}
				<br>
				@php
				date_default_timezone_set('Asia/Jakarta');
				$currdate = "now";
				$currdate = strtotime($currdate);
				echo date('H:i D, d M Y', $currdate);
				@endphp
				<br>
				{{$info->status_now}}
				<br>

				<p id="bookedcd"></p>
				<br>
				<br>
				{{$detail['0']->keperluan}}
				<br>
				Booked by: {{$detail['0']->nama}}
				<br>
				<div class="row">
					<div class="col-w-12 col-s-6 center">
						<form action="/bookingRoom/{{$info->id}}/1" method="get" target="_self"><button type="submit" class="btn btn-primary">+Schedule Meeting</button></form>
					</div>
					<div class="col-s-6 hide2 center">
						<div>
							<button type="button" onclick="window.location.href = '/detailRoom2/{{$info->id}}'" class="btn btn-lg btn-primary">Detail info</button>
						</div>
					</div>
				</div>

			</div>
			@endif

			@if($info->status_now=="WAITING")
			<div class="waiting col-w-12 col-s-12 detailroombox detail-2">
				{{$info->nama_ruangan}}
				<br>
				@php
				date_default_timezone_set('Asia/Jakarta');
				$currdate = "now";
				$currdate = strtotime($currdate);
				echo date('H:i D, d M Y', $currdate);
				@endphp
				<br>
				{{$info->status_now}}
				<br>

				<p id="waitingcd"></p>
				@php
				@endphp
				<br>
				{{$detail['0']->keperluan}}
				<br>
				Booked by: {{$detail['0']->nama}}
				<div class="row">
					<div class="waiting hide2 col-s-6 center">
						<button class="open-button" onclick="openForm()">Check in</button>
						<div class="form-popup" id="myForm">
							<form action="/confirm_checkin" class="form-container" method="POST">
								@csrf
								<h1 style="color: black;">Insert your confirmation pin</h1>
								<input type="text" name="pin1" maxlength="1" />
								<input type="text" name="pin2" maxlength="1" />
								<input type="text" name="pin3" maxlength="1" />
								<input type="text" name="pin4" maxlength="1" />
								<input type="hidden" name="id" value="{{$detail['0']->id}}">
								<div class="row" style="margin-top: 5%">
									<div class="col-s-4"></div>
									<div class="col-s-4 center">
										<button type="button" class="btn cancel" onclick="closeForm()">Cancel</button>
									</div>
									<div class="col-s-4 center">
										<button type="submit" class="btn">submit</button>
									</div>
								</div>
							</form>
						</div>
					</div>
					<div class="waiting hide2 col-s-6 center">
						<button class="cancel-button" onclick="openForm2()">Cancel</button>
						<div class="form-popup" id="myForm2">
							<form action="/confirm_cancel" class="form-container" method="POST">
								@csrf
								<h1 style="color: black;font-size: 80%">Insert your confirmation pin to cancel</h1>
								<input type="text" name="pin1" maxlength="1" />
								<input type="text" name="pin2" maxlength="1" />
								<input type="text" name="pin3" maxlength="1" />
								<input type="text" name="pin4" maxlength="1" />
								<input type="hidden" name="id" value="{{$detail['0']->id}}">
								<div class="row" style="margin-top: 5%">
									<div class="col-s-4"></div>
									<div class="col-s-4 center">
										<button type="button" class="btn cancel" onclick="closeForm2()">cancel</button>
									</div>
									<div class="col-s-4 center">
										<button type="submit" class="btn">submit</button>
									</div>
								</div>
							</form>
						</div>
					</div>
				</div>
				<div class="row">
					<div class="waiting col-w-12 col-s-6 center">
						<form action="/bookingRoom/{{$info->id}}/1" method="get" target="_self"><button type="submit" class="btn btn-primary">+Schedule Meeting</button></form>
					</div>
					<div class="col-s-6 hide2 center">
						<div>
							<button type="button" onclick="window.location.href = '/detailRoom2/{{$info->id}}'" class="btn btn-primary">Detail info</button>
						</div>
					</div>

				</div>
			</div>
			@endif
			@endif

			@if($info->status_now=="FREE")
			<div class="free col-s-12 col-w-12 center detailroombox detail-2">
				{{$info->nama_ruangan}}
				<br>
				@php
				date_default_timezone_set('Asia/Jakarta');
				$currdate = "now";
				$currdate = strtotime($currdate);
				echo date('H:i D, d M Y', $currdate);
				@endphp
				<br>
				{{$info->status_now}}
				<br>
				<div class="row">
					<a href="/bookingRoom/{{$info->id}}/1" class="col-s-12 col-w-12 center"><img src="/open-iconic-master/svg/plus.svg" style="width: 20%"></a>
				</div>
				<div class="row">
					<div class="col-w-12 center">
						BOOK NOW!
					</div>
				</div>
				<div class="row">
					<div class="col-s-12 hide2 center">
						<div>
							<button type="button" onclick="window.location.href = '/detailRoom2/{{$info->id}}'" class="btn btn-primary">Detail info</button>
						</div>
					</div>
				</div>
			</div>
			
			@endif
		</div>
	</div>
	<div class="col-w-6 hide center pageRoomFont">
		<div class="row tableFixHead">
			<table class="table">
				<thead style="text-align: center;background-color: grey;">
					<tr>
						<th>TODAY</th>
					</tr>
				</thead>
				<tbody style="text-align: left;height: 200px; overflow-y:scroll;">
					@if(count($detail))
					@foreach($detail as $dt)
					<tr>
						<td>
							@php
							$date = "$dt->waktu_Pinjam_Mulai";
							$date = strtotime($date);
							echo date('H:i', $date);
							echo " - ";
							$datedone= "$dt->waktu_Pinjam_Selesai";
							$datedone = strtotime($datedone);
							echo date('H:i', $datedone);
							@endphp

							<br><b> 
								{{$dt->keperluan}}</b><br>
								{{$dt->nama}}
							</td>
						</tr>
						@endforeach
						@endif
					</tbody>
				</table>
			</div>
			<div class="row tableFixHead" style="margin-top: 5vh;">
				<table class="table">
					<thead style="text-align: center;background-color: grey;">
						<tr>
							<th>TOMORROW:
								@php
								$hari = "tomorrow";
								$hari = strtotime($hari);
								echo date('D, d-m-Y', $hari);
							@endphp</th>
						</tr>
					</thead>
					<tbody style="text-align: left;height: 200px; overflow-y:scroll;">
						@if(count($besok))
						@foreach($besok as $dt)
						<tr>
							<td>@php
								$date = "$dt->waktu_Pinjam_Mulai";
								$date = strtotime($date);
								echo date('H:i', $date);
								echo " - ";
								$datedone= "$dt->waktu_Pinjam_Selesai";
								$datedone = strtotime($datedone);
								echo date('H:i', $datedone);
								@endphp
								<br>
								<b>
								{{$dt->keperluan}}
								</b><br>
								{{$dt->nama}}
							</td>
						</tr>
							@endforeach
							@endif
						</tbody>
					</table>
				</div>
	
			</div>
		</div>
	</div>
</div>
<div class="row hide2">
	<div class="col-s-6 tableHead">
		<table class="table">
			<thead style="text-align: center;background-color: grey;">
				<tr>
					<th>TODAY</th>
				</tr>
			</thead>
			<tbody style="text-align: left;height: 200px; overflow-y:scroll;">
				@if(count($detail))
				@foreach($detail as $dt)
				<tr>
					<td>
						@php
						$date = "$dt->waktu_Pinjam_Mulai";
						$date = strtotime($date);
						echo date('H:i', $date);
						echo " - ";
						$datedone= "$dt->waktu_Pinjam_Selesai";
						$datedone = strtotime($datedone);
						echo date('H:i', $datedone);
						@endphp
						<br><b> 
						{{$dt->keperluan}}</b><br>
						{{$dt->nama}}
					</td>
				</tr>
				@endforeach
				@endif
			</tbody>
		</table>
	</div>
	<div class="col-s-6 tableHead">
				<table class="table">
					<thead style="text-align: center;background-color: grey;">
						<tr>
							<th>TOMORROW:
								@php
								$hari = "tomorrow";
								$hari = strtotime($hari);
								echo date('D, d-m-Y', $hari);
							@endphp</th>
						</tr>
					</thead>
					<tbody style="text-align: left;height: 200px; overflow-y:scroll;">
						@if(count($besok))
						@foreach($besok as $dt)
						<tr>
							<td>@php
								$date = "$dt->waktu_Pinjam_Mulai";
								$date = strtotime($date);
								echo date('H:i', $date);
								echo " - ";
								$datedone= "$dt->waktu_Pinjam_Selesai";
								$datedone = strtotime($datedone);
								echo date('H:i', $datedone);
								@endphp
								<br>
								<b>
								{{$dt->keperluan}}
								</b><br>
								{{$dt->nama}}
							</td>
						</tr>
							@endforeach
							@endif
						</tbody>
					</table>
				</div>	
</div>
@if(count($detail))
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
  document.getElementById("bookedcd").innerHTML = hours + "h"
  + minutes + "m" + seconds + "s";

  // If the count down is over, write some text 
  if (distance < 0) {
  	clearInterval(x);
  	document.getElementById("bookedcd").innerHTML = "EXPIRED";
  }
}, 1000);
</script>

<script>

// Set the date we're counting down to
var countDownDatew = new Date("{{$detail['0']->waktu_Pinjam_Timeout}}").getTime();

// Update the count down every 1 second
var xw = setInterval(function() {

	var noww = new Date().getTime();

	var distancew = countDownDatew - noww;

  // Time calculations for days, hours, minutes and seconds
/*  var days = Math.floor(distance / (1000 * 60 * 60 * 24));
var hours = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));*/
var minutesw = Math.floor((distancew % (1000 * 60 * 60)) / (1000 * 60));
var secondsw = Math.floor((distancew % (1000 * 60)) / 1000);

  // Output the result in an element with id="demo"
  document.getElementById("waitingcd").innerHTML = minutesw + "m" + secondsw + "s";

  // If the count down is over, write some text 
  if (distancew < 0) {
  	clearInterval(xw);
  	document.getElementById("waitingcd").innerHTML = "EXPIRED";
  }
}, 1000);
</script>

<script type="text/javascript">
	setTimeout(function(){
		location.reload();
	},60000);
</script>
<script type="text/javascript">
	$("input").keyup(function() {
		if($(this).val().length >= 1) {
			var input_flds = $(this).closest('form').find(':input');
			input_flds.eq(input_flds.index(this) + 1).focus();
		}
	});
</script>
<script>
	function openForm() {
		document.getElementById("myForm").style.display = "block";
	}
	function openForm2() {
		document.getElementById("myForm2").style.display = "block";
	}

	function closeForm() {
		document.getElementById("myForm").style.display = "none";
	}
	function closeForm2() {
		document.getElementById("myForm2").style.display = "none";
	}


	$("input").keyup(function() {
		if($(this).val().length >= 1) {
			var input_flds = $(this).closest('form').find(':input');
			input_flds.eq(input_flds.index(this) + 1).focus();
		}
	});
</script>


@endif
@endsection