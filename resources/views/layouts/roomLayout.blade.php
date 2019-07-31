<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
	<title>@yield('title')</title>
	@include('includes.head')
	@yield('css')
</head>
<body>
	<div>Room @yield('roomnum')</div>
	<div>@yield('roomstatus')</div>
	<div>@yield('time')</div>
	<div>@yield('roominfo')</div>
</body>
</html>