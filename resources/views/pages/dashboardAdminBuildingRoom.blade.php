@extends('layouts.default')
<script type="text/javascript" src="/js/jquery-3.4.1.min.js" charset="UTF-8"></script>
@section('css')
<link rel="stylesheet" type="text/css" href="/css/open-iconic-bootstrap.css">
<link rel="stylesheet" type="text/css" href="/css/size.css">
<link rel="stylesheet" type="text/css" href="/css/page.css">
@endsection
@section('content')

<div class="row">
	<div class="col-w-9">
		<h1>Manage Building and Room</h1>
	</div>
		<div class="col-w-1">
		<form action="logout" method="POST">
		@csrf
		<button class="btn btn-primary" type="submit"> logout</button>
	</form>
	</div>
</div>
	<button class="btn btn-primary col-w-4 col-s-4" onclick="window.location.href = 'home'">Booking List</button>
	<button class="btn btn-primary col-w-4 col-s-4" onclick="window.location.href = 'building'">Building and Room</button> 
	<button class="btn btn-primary col-w-4 col-s-4" onclick="window.location.href = 'masterconfig'">Masteri Config</button>  
	@if(session('success'))
	{{session('success')}}
	@endif
		<form action="/admin/editGedung">
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
				<form action="/admin/createGedung" method="get" target="_self">
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
										$('.list_ruangan').append('<div class="col-w-4 col-s-6 center">'
											
											+'<div class="buttonlike free">'
											+val['id']
											+'<br>'
											+val['nama_ruangan']
											+'<br>'
											+val['status_now']
											+'<br>'
											+'<br><form action="/admin/editRoom/'+val['id']+'" method="get" target="_self"><button type="submit" class="btn btn-primary">+Edit Room</button></form>'
											+'<form action="/admin/deleteRoom/" method="post" target="_self">@csrf<input type="hidden" name="id" value="'+val['id']+'"><button type="submit" class="btn btn-danger">Delete Room</button></form>'
											+'</div>'
											+'</div>');
									};

									if(val['status_now']=="BOOKED"){
										//console.log("masuk booked");
										$('.list_ruangan').append('<div class="col-w-4 col-s-6 center">'
											+'<div class="buttonlike booked">'
											+val['id']
											+'<br>'
											+val['nama_ruangan']
											+'<br>'
											+val['status_now']
											+'<br>'
											+'<br><form action="/admin/editRoom/'+val['id']+'" method="get" target="_self"><button type="submit" class="btn btn-primary">+Edit Room</button></form>'
											+'<form action="/admin/deleteRoom/" method="post" target="_self">@csrf<input type="hidden" name="id" value="'+val['id']+'"><button type="submit" class="btn btn-danger">Delete Room</button></form>'
											+'</div>'
											+'</div>');
									};
									if(val['status_now']=="WAITING"){
										//console.log("masuk wait");
										$('.list_ruangan').append('<div class="col-w-4 col-s-6 center">'
											+'<div class="buttonlike waiting">'
											+val['id']
											+'<br>'
											+val['nama_ruangan']
											+'<br>'
											+val['status_now']
											+'<br>'
											+'<br><form action="/admin/editRoom/'+val['id']+'" method="get" target="_self"><button type="submit" class="btn btn-primary">+Edit Room</button></form>'
											+'<form action="/admin/deleteRoom/" method="post" target="_self">@csrf<input type="hidden" name="id" value="'+val['id']+'"><button type="submit" class="btn btn-danger">Delete Room</button></form>'
											+'</div>'
											+'</div>');
									};
								});
								$('.list_ruangan').append(
									'<form action="/admin/tambahRoom/'+buildingID+'/'+floorpick+'" method="get" target="_self">'+'<button type="submit" class="btn btn-primary"> Tambah Disini</button></form>'
									);
							}

						});
					}else{
						$('.list_ruangan').empty();
					}
				});
			});


		</script>