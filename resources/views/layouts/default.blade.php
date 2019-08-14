<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
	<title>Meeting Room</title>
	@include('includes.head')
	@yield('css')
</head>
<body>
	@yield('content')
</body>
</html>