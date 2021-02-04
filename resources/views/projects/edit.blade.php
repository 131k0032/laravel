{{-- Es como un include, toma el contenido de la vista layout --}}
@extends('layout')

{{-- Titulo de la pagina, como segunto parámetro el contenido, no debe llevar el endsecion --}}
@section('title', 'Editar proyecto')

{{-- Va a buscar un yield de nombre 'content' para agregarlo al contenido--}}
{{-- Es decir lo reemplaza en @yield('content') de layout.blade.php --}}
@section('content')

<div class="container">
	<div class="row">
		<div class="col-12 col-sm-10 col-lg-6 mx-auto">


			{{-- Para ver los errors en tu formulario al mandar campos vacios--}}
			@include('partials.validation-errors')

			<form class="bg-white py-3 px-4 shadow rounded" action="{{ route('projects.update', $project ) }}" method="POST" enctype="multipart/form-data">
				{{-- Para que haga un input hidden que establezca el metodo patch --}}
				@method('PATCH')

				<h1 class="display-4">Editar proyecto</h1>
				<hr>


				{{-- incluyendo archivo parcial --}}
				@include('projects._form', ['btnText'=>'Actualizar'])
				
			</form>

		</div>
	</div>
</div>
@endsection