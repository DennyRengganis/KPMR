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
	<div>
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
				<div class="col-w-3 col-s-3 center">
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
				<div class="col-w-3 col-s-2"></div>
				<div class="col-w-2 col-s-2 center">
					Floor :
					<select name="floor">
						<option value="0"></option>
					</select>
				</div>
				<div class="col-w-1 col-s-1"></div>
			</form>
			<div class="col-w-1 col-s-2 center" >
				<form action="/bookingRoom" method="get" target="_self">
					<button type="submit" class="btn btn-primary">+Booking</button>
				</form>
			</div>
			<div class="col-w-1 col-s-1"></div>
		</div>
		<div class="row">
			<div class="col-w-1 col-s-1"></div>
			<div class="col-w-10 col-s-10 list_ruangan">

			</div>
			<div class="col-1 col-s-1"></div>
		</div>
		@endsection

		<script type="text/javascript">
			var buildingID=0;

			$(document).ready(function() {
				$('select[name="building"]').on('change', function() {
					buildingID = $(this).val();
					console.log(buildingID);
					if(buildingID) {
						$.ajax({
							url: '/home/ajax/'+buildingID,
							type: "GET",
							dataType: "json",
							success:function(data) {

								console.log(data);


								$('list_ruangan').empty();
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

		<script type="text/javascript">
			$(document).ready(function() {
				$('select[name="floor"]').on('change', function() {
					floorpick = $(this).val();
					console.log(floorpick);
					console.log("buid: ")
					console.log(buildingID);
					if(floorpick) {
						$.ajax({
							url: '/home/ajax/'+buildingID+'/'+floorpick,
							type: "GET",
							dataType: "json",
							success:function(data) {

								console.log(data);


								$('.list_ruangan').empty();
								var room= data;
								$.each(data,function(id,val){
									console.log("masuk each");
									console.log("data each:")
									console.log(id);
									console.log(val);
									console.log(val['id']);
									console.log(val['nama_ruangan']);
									console.log(val['status_now']);
									if(val['status_now']=="FREE"){
										console.log("masuk free");
										$('.list_ruangan').append('<div class="col-4 col-s-4 center">'
											+'<div class="buttonlike free">'
											+val['id']
											+'<br>'
											+val['nama_ruangan']
											+'<br>'
											+val['status_now']
											+'<br>'
											+'<form action="/bookingRoom/'+val['id']+'" method="get" target="_self"><button type="submit" class="btn btn-primary">+Booking</button></form>'
											+'BOOK NOW'
											+'</div>'
											+'</div>');
									};

									if(val['status_now']=="BOOKED"){
										console.log("masuk booked");
										$('.list_ruangan').append('<div class="col-4 col-s-4 center">'
											+'<div class="buttonlike booked">'
											+val['id']
											+'<br>'
											+val['nama_ruangan']
											+'<br>'
											+val['status_now']
											+'<br>'
											+'<br><form action="/bookingRoom/'+val['id']+'" method="get" target="_self"><button type="submit" class="btn btn-primary">+Schedule Meeting</button></form>'
											+'</div>'
											+'</div>');
									};
									if(val['status_now']=="WAITING"){
										console.log("masuk wait");
										$('.list_ruangan').append('<div class="col-4 col-s-4 center">'
											+'<div class="buttonlike waiting">'
											+val['id']
											+'<br>'
											+val['nama_ruangan']
											+'<br>'
											+val['status_now']
											+'<br>'
											+'<br><form action="/bookingRoom/'+val['id']+'" method="get" target="_self"><button type="submit" class="btn btn-primary">+Schedule Meeting</button></form>'
											+'</div>'
											+'</div>');
									};
								});
							}
						});
					}else{
						$('.list_ruangan').empty();
					}
				});
			});


		</script>