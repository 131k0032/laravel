<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>@yield('title', 'Aprendible')</title>
	    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
	<link rel="stylesheet" type="text/css" href="/css/app.css">
	<script src="/js/app.js" defer></script> {{-- defer para que se ejecute al final de la carga --}}


</head>
<body>

	<div id="app" class="d-flex flex-column justify-content-between h-screen">

		<header>
			{{-- Archivo parcial --}}
			@include('partials.nav')

			{{-- Para un msj flash de sesion --}}
			@include('partials.session-status')
		</header>
		
		<main class="py-4">
			{{-- Mostrar un contenido dinámico y diferente--}}
			@yield('content')
		</main>
		
		<footer class="bg-white text-black-50 text-center py-3 shadow">
			{{ config('app.name') }} | Copyright @ {{ date('Y') }}
		</footer>
	</div>
	
</body>
</html>