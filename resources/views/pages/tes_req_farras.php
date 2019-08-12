@extends('layouts.default')
<script type="text/javascript" src="/js/jquery-3.4.1.min.js" charset="UTF-8"></script>
@section('css')
<link rel="stylesheet" type="text/css" href="/css/open-iconic-bootstrap.css">
<link rel="stylesheet" type="text/css" href="/css/size.css">
<link rel="stylesheet" type="text/css" href="/css/page.css">
@endsection
@section('content')
<div class="row">
	<div class="col-s-4"></div>
	<div class="col-s-4">
		<button type="button" onclick="window.location.href = '/detailRoom2/{{$info->id}}'" class="btn btn-primary">Detail info</button>
	</div>
	<div class="col-s-4"></div>
</div>
@endsection