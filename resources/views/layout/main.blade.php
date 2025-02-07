<!DOCTYPE html>

<html
		dir="ltr"
		lang="{{ str_replace('_', '-', app()->getLocale()) }}"
>

		<head>
				@include('component.head')
		</head>

		<body>
				@include('component.navbar')
				@yield('content')
				@include('component.script')
		</body>
</html>
