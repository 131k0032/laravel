{{-- Es como un include, toma el contenido de la vista layout --}}
@extends('layout')

{{-- Titulo de la pagina, como segunto parámetro el contenido, no debe llevar el endsecion --}}
@section('title', 'Portfolio')

{{-- Va a buscar un yield de nombre 'content' para agregarlo al contenido--}}
{{-- Es decir lo reemplaza en @yield('content') de layout.blade.php --}}
@section('content')

<div class="container">

	<div class="d-flex justify-content-between align-items-center mb-3">
		<h1 class="display-4 mb-0">@lang('Projects')</h1>
		
		{{-- Si está logueado --}}
		@auth
			<a class="btn btn-primary" href="{{ route('projects.create')}}">Crear proyectos</a>
		@endauth
	</div>

	<hr>
	<p class="lead text-secondary">Lorem, ipsum dolor sit amet consectetur adipisicing elit. Rerum, exercitationem, necessitatibus. Laudantium, excepturi adipisci officia, magnam, facilis placeat, veniam in ducimus obcaecati amet neque. Officiis odit quasi consectetur aperiam unde.</p>

	{{-- Recorriendo el array de portfolio de web.php --}}
	<ul class="list-group">	

	 	{{-- //Variable portfolio como un elemento de portfolio --}}
		@forelse ($projects as $project) 
				<li class="text-secondary list-group-item border-0 mb-3 shadow-sm">
					<a class="d-flex justify-content-between align-items-center" 
					   href="{{ route('projects.show', $project)}}">
					   <span class=" font-weight-bold">
							{{$project->title}}
						</span>
						 <span class="text-black-50">
							{{$project->created_at->format('d-m-Y')}}
						</span>

					</a>
					
				</li>
			@empty
				<li class="list-group-item border-0 mb-3 shadow-sm">No hay proyectos para mostrar</li>
		@endforelse
		{{-- Links de navegacion --}}
		{{ $projects->links() }}
				
	</ul>
</div>


@endsection
