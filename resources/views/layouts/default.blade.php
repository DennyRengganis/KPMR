<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
	<title>@yield('title')</title>
	@include('includes.head')
	@yield('css')
</head>
<body>
	@yield('content')
</body>
</html>