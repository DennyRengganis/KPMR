@extends('layouts.default')
<script type="text/javascript" src="/js/jquery-3.4.1.min.js" charset="UTF-8"></script>
@section('css')
<link rel="stylesheet" type="text/css" href="/css/open-iconic-bootstrap.css">
<link rel="stylesheet" type="text/css" href="/css/size.css">
<link rel="stylesheet" type="text/css" href="/css/page.css">
<link rel="stylesheet" type="text/css" href="/css/detailroom.css">
@endsection
@section('content')
<h1>Admin Page</h1>
<div class="row">
	<button class="btn btn-primary col-w-4 col-s-4" onclick="window.location.href = 'google.com'">Booking List</button>
	<button class="btn btn-primary col-w-4 col-s-4" onclick="window.location.href = 'dashboardAdminBuildingRoom'">Building and Room</button> 
	<button class="btn btn-primary col-w-4 col-s-4" onclick="window.location.href = 'google.com'">Masterize time</button>  
</div>
<div class="row">
	<div class="col-w-1"></div>
		<div class="col-w-10 center pageRoomFont" style="height: 90vh;" id="bookinglist">
			<h1>BOOK LIST</h1>
			<div class="row tableFixHead">
				<table class="table">
					<thead style="text-align: center;background-color: grey;">
						<tr>
							<th>ID</th>
							<th>Nama Ruangan</th>
							<th>Gedung</th>
							<th>Waktu Pinjam</th>
							<th>Waktu Selesai</th>
							<th>Keterangan</th>
							<th>Manage</th>
						</tr>
					</thead>
					<tbody style="text-align: center;height: 200px; overflow-y:scroll;">
						<tr>
							<td>
								1
							</td>
							<td>
								401
							</td>
							<td>
								ACCF
							</td>
							<td>
								2019-08-12 09:30:00
							</td>
							<td>
								2019-08-12 10:30:00
							</td>
							<td>
								Nama : Denny<br>
								NPK : 14045<br>
								purpose : rapat
							</td>
							<td>
								<button class="btn btn-primary">Delete</button>
								<button class="btn btn-secondary" onclick="openForm()">Cancel</button>
								<div class="form-popup" id="myForm">
								<form action="/confirm_checkin" class="form-container" method="POST">
								@csrf
								<h1 style="color: black;">Insert your confirmation pin</h1>
								<input type="text" name="pin1" maxlength="1" />
								<input type="text" name="pin2" maxlength="1" />
								<input type="text" name="pin3" maxlength="1" />
								<input type="text" name="pin4" maxlength="1" />
								<input type="hidden" name="id" value="">
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
							</td>
						</tr>
					</tbody>
				</table>
			</div>
		</div>
		<div class="col-w-1"></div>
</div>
<script>
	function openForm() {
		document.getElementById("myForm").style.display = "block";
	}

	function closeForm() {
		document.getElementById("myForm").style.display = "none";
	}


	$("input").keyup(function() {
		if($(this).val().length >= 1) {
			var input_flds = $(this).closest('form').find(':input');
			input_flds.eq(input_flds.index(this) + 1).focus();
		}
	});

</script>
@endsection