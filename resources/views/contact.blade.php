{{-- Es como un include, toma el contenido de la vista layout --}}
@extends('layout')

{{-- Titulo de la pagina, como segunto parámetro el contenido, no debe llevar el endsecion --}}
@section('title', 'Contact')

{{-- Va a buscar un yield de nombre 'content' para agregarlo al contenido--}}
{{-- Es decir lo reemplaza en @yield('content') de layout.blade.php --}}
@section('content')
{{-- Traducido desde resources/lang/es.json --}}

{{-- Con el objeto "Errors podemos ver los errores que laravel tiene por detfault" --}}
{{-- {{ $errors }} --}}

<div class="container">
    <div class="row">
        <div class="col-12 col-sm-10 col-lg-6 mx-auto">

            <form class="bg-white shadow rounded py-3 px-4"
                method="POST"
                action="{{ route('messages.store') }}"
            >
            {{-- campo oculto con un token de usuario, que laravel va a verificar --}}
                @csrf
                <h1 class="display-4">@lang('Contact')</h1>
                <hr>
                <div class="form-group">
                    <label for="name">Nombre</label>
                    <input class="form-control bg-light shadow-sm @error('name') is-invalid @else border-0 @enderror"
                        id="name"
                        name="name"
                        placeholder="Escribe aquí tu nombre..."
                        value="{{ old('name') }}"
                    >
                    @error('name')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="email">Correo electrónico</label>
                    <input class="form-control bg-light shadow-sm @error('email') is-invalid @else border-0 @enderror"
                        type="text"
                        name="email"
                        placeholder="Escribe aquí tu e-mail..."
                        value="{{ old('email') }}">
                    @error('email')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="subject">Asunto</label>
                    <input class="form-control bg-light shadow-sm @error('subject') is-invalid @else border-0 @enderror"
                        id="subject"
                        name="subject"
                        placeholder="Escribe aquí el asunto de tu mensaje..."
                        value="{{ old('subject') }}">
                    @error('subject')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="content">Contenido</label>
                    <textarea class="form-control bg-light shadow-sm @error('subject') is-invalid @else border-0 @enderror"
                        id="content"
                        name="content"
                        placeholder="Escribe aquí el contenido de tu mensaje...">{{ old('content') }}</textarea>
                    @error('content')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>

                <button class="btn btn-primary btn-lg btn-block">@lang('Send')</button>
            </form>

        </div>
    </div>
</div>
@endsection