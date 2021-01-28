{{-- Es como un include, toma el contenido de la vista layout --}}
@extends('layout')

{{-- Titulo de la pagina --}}
@section('title')
Home
@endsection

{{-- Va a buscar un yield de nombre 'content' para agregarlo al contenido--}}
{{-- Es decir lo reemplaza en @yield('content') de layout.blade.php --}}
@section('content')

<div class="container">
	<div class="row">
		

		<div class="col-12 col-lg-6">
			<img class="img-fluid mb-4" src="/img/about.svg" alt="Desarrollo web">
		</div>
		<div class="col-12 col-lg-6">
			<h1 class="display-4 text-primary">Quien soy</h1>
			<p class="lead">Lorem, ipsum dolor sit amet consectetur adipisicing elit. Sit, quas, distinctio sapiente ipsa cumque error sunt fugit, sed ab, tempore nobis. Minus voluptatum porro tenetur a hic soluta itaque, dicta.</p>
			<a class="btn btn-lg btn-block btn-primary"href="{{ route('contact')}}">Contactame</a>
			<a class="btn btn-lg btn-block btn-outline-primary"href="{{ route('projects.index')}}">Portafolio</a>
		</div>

	</div>
</div>


	{{-- @auth --}}
		{{-- Ver logueado --}}
		{{-- {{ auth()->user()->name }} --}}

	{{-- @endauth --}}
	
@endsection