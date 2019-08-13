@extends('layouts.default')
<script type="text/javascript" src="/js/jquery-3.4.1.min.js" charset="UTF-8"></script>
@section('css')
<link rel="stylesheet" type="text/css" href="/css/open-iconic-bootstrap.css">
<link rel="stylesheet" type="text/css" href="/css/size.css">
<link rel="stylesheet" type="text/css" href="/css/page.css">
@endsection
@section('content')
	<h1>Search Room</h1>
	<button class="btn btn-primary col-w-4 col-s-4" onclick="window.location.href = 'adminXmeetingYroomZhome'">Booking List</button>
	<button class="btn btn-primary col-w-4 col-s-4" onclick="window.location.href = 'adminXmeetingYroomZbuilding'">Building and Room</button> 
	<button class="btn btn-primary col-w-4 col-s-4" onclick="window.location.href = 'google.com'">Masterize time</button>  
	@if(session('success'))
	{{session('success')}}
	@endif
		<form action="/AdminXmeetingYroomZ/editGedung">
<!-- 			<div class="row">
				<div class="example">jkdfjdskjdf</div>
			</div> -->
			<div class="row" style="border: 1px solid black; margin-left: -3%">
				<div class="col-w-1 col-s-1"></div>
				<div class="col-w-3 col-s-3 center">
					<div class="dropdownbox">
						Building :
						<br>
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
					<br>
					<select name="floor">
						<option value="0">--</option>
					</select>
				</div>
			<div class="col-w-1 col-s-1">
				<br>
					<button type="submit" class="btn btn-primary">Edit Gedung</button>
			</div>
			</form>
			<div class="col-w-1 col-s-2 " >
				<br>
				<form action="/AdminXmeetingYroomZ/createGedung" method="get" target="_self">
					<button type="submit" class="btn btn-primary">Tambah Gedung</button>
				</form>
			</div>
			<div class="col-w-1 col-s-1">
				<br>
			</div>
		</div>
		<div class="row">
			<div class="col-w-1 col-s-1">
			</div>
			<div class="col-w-10 col-s-10 list_ruangan">
			</div>
			<div class="col-1 col-s-1">
			</div>
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

								//console.log(data);


								$('select[name="floor"]').empty();
								$('.list_ruangan').empty();
								$('select[name="floor"]').append('<option value="0">--</option>');
								var max_floor = data[0]["jumlah_lantai"];
								var i;
								for(i=1;i<=max_floor;i++){
									$('select[name="floor"]').append('<option value="'+ i +'">'+ i +'</option>');
								}
								// console.log("data1:");
								// console.log(data[1]);
							}							
						});
					}else{
						$('select[name="floor"]').empty();
						$('.list_ruangan').empty();
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
									// console.log("masuk each");
									// console.log("data each:")
									// console.log(id);
									// console.log(val);
									// console.log(val['id']);
									// console.log(val['nama_ruangan']);
									// console.log(val['status_now']);
									if(val['status_now']=="FREE"){
										console.log("masuk free");
										$('.list_ruangan').append('<div class="col-w-4 col-s-6 center">'
											+'<a href="'
											+'detailRoom/'
											+val['id']
											+'">'
											+'<div class="buttonlike free">'
											+val['id']
											+'<br>'
											+val['nama_ruangan']
											+'<br>'
											+val['status_now']
											+'<br>'
											+'<form action="/AdminXmeetingYroomZ/editRoom/'+val['id']+'" method="get" target="_self"><button type="submit" class="btn btn-primary">+Booking</button></form><form action="/AdminXmeetingYroomZ/deleteRoom/''" method="post" target="_self"><button type="submit" class="btn btn-danger"><input type="hidden" name="id" value="'+val['id']+'">Delete Room</button></form>'
											+'BOOK NOW'
											+'</div>'
											+'</a>'
											+'</div>');
									};

									if(val['status_now']=="BOOKED"){
										//console.log("masuk booked");
										$('.list_ruangan').append('<div class="col-w-4 col-s-6 center">'
											+'<a href="'
											+'detailRoom/'
											+val['id']
											+'">'
											+'<div class="buttonlike booked">'
											+val['id']
											+'<br>'
											+val['nama_ruangan']
											+'<br>'
											+val['status_now']
											+'<br>'
											+'<br><form action="/AdminXmeetingYroomZ/editRoom/'+val['id']+'" method="get" target="_self"><button type="submit" class="btn btn-primary">+Edit Room</button></form><form action="/AdminXmeetingYroomZ/deleteRoom/''" method="post" target="_self"><button type="submit" class="btn btn-danger"><input type="hidden" name="id" value="'+val['id']+'">Delete Room</button></form>'
											+'</div>'
											+'</a>'
											+'</div>');
									};
									if(val['status_now']=="WAITING"){
										//console.log("masuk wait");
										$('.list_ruangan').append('<div class="col-w-4 col-s-6 center">'
											+'<a href="'
											+'detailRoom/'
											+val['id']
											+'">'
											+'<div class="buttonlike waiting">'
											+val['id']
											+'<br>'
											+val['nama_ruangan']
											+'<br>'
											+val['status_now']
											+'<br>'
											+'<br><form action="/AdminXmeetingYroomZ/editRoom/'+val['id']+'" method="get" target="_self"><button type="submit" class="btn btn-primary">+Schedule Meeting</button></form><form action="/AdminXmeetingYroomZ/deleteRoom/''" method="post" target="_self"><button type="submit" class="btn btn-danger"><input type="hidden" name="id" value="'+val['id']+'">Delete Room</button></form>'
											+'</div>'
											+'</a>'
											+'</div>');
									};
								});
								$('.list_ruangan').append(
									'<form action="/AdminXmeetingYroomZ/tambahRoom/'+buildingID+'/'+floorpick+'" method="get" target="_self">'+'<button type="submit" class="btn btn-primary"> Tambah Disini</button></form>'
									);
							}

						});
					}else{
						$('.list_ruangan').empty();
					}
				});
			});


		</script>