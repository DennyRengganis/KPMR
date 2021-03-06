@extends('layouts.default')
<script type="text/javascript" src="/js/jquery-3.4.1.min.js" charset="UTF-8"></script>
@section('css')
<link rel="stylesheet" type="text/css" href="/css/open-iconic-bootstrap.css">
<link rel="stylesheet" type="text/css" href="/css/size.css">
<link rel="stylesheet" type="text/css" href="/css/page.css">
<link rel="stylesheet" type="text/css" href="/css/detailroom.css">
@endsection
@section('content')
<div class="row">
	<div class="col-w-9">
		<h1>ADMIN PAGE</h1>
	</div>
		<div class="col-w-1">
		<form action="logout" method="POST">
		@csrf
		<button class="btn btn-primary" type="submit"> logout</button>
	</form>
	</div>
</div>
<div class="row">
	<button class="btn btn-primary col-w-4 col-s-4" onclick="window.location.href = 'home'">Booking List</button>
	<button class="btn btn-primary col-w-4 col-s-4" onclick="window.location.href = 'building'">Building and Room</button> 
	<button class="btn btn-primary col-w-4 col-s-4" onclick="window.location.href = 'masterconfig'">Master Config</button>  
</div>
<div class="row">
	<div class="col-w-1"></div>
		<div class="col-w-10 center pageRoomFont" style="height: 90vh;" id="bookinglist">
			<div class="row">
				<div class="col-w-2"></div>
				<h1 class="col-w-8">BOOK LIST</h1>
				<div class="col-w-2"><button class="btn btn-primary" onclick="window.location.href = '/admin/booklisthistory'">History Booking</button></div>
			</div>
			<div class="row tableBookHead">
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
					<tbody style="text-align: center;height: 200px;">
						@foreach($booklists as $booklist)
						<tr>
							<td>
								{{$booklist->id}}
							</td>
							<td>
								{{$booklist->room_nama}}
							</td>
							<td>
								{{$booklist->building_nama}}
							</td>
							<td>
								{{$booklist->waktu_Pinjam_Mulai}}
							</td>
							<td>
								{{$booklist->waktu_Pinjam_Selesai}}
							</td>
							<td>
								Status: {{$booklist->status}}<br>
								Nama : {{$booklist->nama}}<br>
								NPK : {{$booklist->NPK}}<br>
								purpose : {{$booklist->keperluan}}
							</td>
							<td>
								@if($booklist->status=="DONE" OR $booklist->status=="CANCELLED")
								<form action="/admin/deleteBookList" method="POST">
									@csrf
									<input type="hidden" name="id" value="{{$booklist->id}}">
								<button class="btn btn-primary" type="submit">Delete</button>
								</form>
								@elseif($booklist->status=="NEED CONFIRMATION" OR $booklist->status=="WAITING")
								<button class="btn btn-secondary" onclick="openForm()">Cancel</button>
								<div class="form-popup" id="myForm">
								<form action="/confirm_cancel" class="form-container" method="POST">
								@csrf
								<h1 style="color: black;">Insert your confirmation pin</h1>
								<input type="text" name="pin1" maxlength="1" />
								<input type="text" name="pin2" maxlength="1" />
								<input type="text" name="pin3" maxlength="1" />
								<input type="text" name="pin4" maxlength="1" />
								<input type="hidden" name="id" value="{{$booklist->id}}">
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
							@endif
						</div>
							</td>
						</tr>
						@endforeach
					</tbody>
				</table>
				<!-- Halaman : {{ $booklists->currentPage() }} <br/>
				Jumlah Data : {{ $booklists->total() }} <br/>
				Data Per Halaman : {{ $booklists->perPage() }} <br/> -->

			</div>
			<div> {{ $booklists->links() }} </div>
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