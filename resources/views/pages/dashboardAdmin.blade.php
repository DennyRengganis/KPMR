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
	<button class="btn btn-primary col-w-4 col-s-4" onclick="openBL()">Booking List</button>
	<button class="btn btn-primary col-w-4 col-s-4" onclick="openBNR()">Building and Room</button> 
	<button class="btn btn-primary col-w-4 col-s-4" onclick="openMRT()">Masterize time</button>  
</div>
<div class="row">
	<div class="col-12" style="height: 90vh" id="bookinglist">
		Booking List
	</div>
	<div class="col-12" style="height: 90vh" id="buildingandroom">
		Building and Room
	</div>
		<div class="col-12" style="height: 90vh" id="mrtime">
		Masterize time
	</div>
</div>
<script>
function openBL() {
		document.getElementById("bookinglist").style.display = "block";
		document.getElementById("buildingandroom").style.display ="none";
		document.getElementById("mrtime").style.display="none";
}
function openBNR() {
		document.getElementById("bookinglist").style.display = "none";
		document.getElementById("buildingandroom").style.display ="block";
		document.getElementById("mrtime").style.display="none";
}
function openMRT() {
		document.getElementById("bookinglist").style.display = "none";
		document.getElementById("buildingandroom").style.display ="none";
		document.getElementById("mrtime").style.display="block";
}

</script>
@endsection