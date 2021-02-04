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
	<div class="d-flex flex-wrap justify-content-between align-items-start">	

	 	{{-- //Variable portfolio como un elemento de portfolio --}}
		@forelse ($projects as $project) 
				<div class="card border-0 shadow-sm mt-4 mx-auto" style="width: 18rem">
					@if($project->image)
					   		<img class="card-img-top" src="/storage/{{ $project->image}}" alt="{{ $project->title}}">
					 @endif

					 <div class="card-body">
					 	<h5 class="card-title">
					 		<a href="{{ route('projects.show', $project)}}">{{ $project->title}}</a>
					 	</h5>	
					 	<h6 class="card-subtitle">{{$project->created_at->format('d-m-Y')}}</h6>
					 	<p class="card-text text-truncate">{{ $project->description }}</p>
					 	 <a href="{{ route('projects.show', $project)}}" class="btn btn-primary btn-sm">Ver mas...</a>
					 </div>
				</div>
		@empty
				<div class="card">
					<div class="car-body">
						No hay proyectos aun
					</div>
				</div>
		@endforelse	
	</div>

	
	<div class="mt-4 ml-5">
		{{-- Links de navegacion --}}
		{{ $projects->links() }}
	</div>

</div>


@endsection
