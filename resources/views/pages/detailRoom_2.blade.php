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
	<div class="col-s-12 center pageRoomFont">
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
@endsection