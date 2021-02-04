{{-- Es como un include, toma el contenido de la vista layout --}}
@extends('layout')

{{-- Titulo de la pagina, como segunto parámetro el contenido, no debe llevar el endsecion --}}
@section('title', 'Crea proyecto')

{{-- Va a buscar un yield de nombre 'content' para agregarlo al contenido--}}
{{-- Es decir lo reemplaza en @yield('content') de layout.blade.php --}}
@section('content')
<div class="container">
	<div class="row">
		<div class="col-12 col-sm-10 col-lg-6 mx-auto">
			{{-- Validacion de errores --}}
			 @include('partials.validation-errors')
			<form class="bg-white py-3 px-4 shadow rounded" action="{{ route('projects.store')}}" method="POST" enctype="multipart/form-data">
			<h1 class="display-4">Nuevo proyecto</h1>		

				{{-- incluyendo archivo parcial de formulario --}}
				@include('projects._form', ['btnText'=>'Guardar'])

			</form>

		</div>
	</div>

</div>

@endsection
