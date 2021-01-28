{{-- Si existe un mensaje flash de nombre status--}}
@if(session('status'))
    <div class="alert alert-primary alert-dismissible fade show" role="alert">
    	{{-- Ps lo muestras --}}
        {{ session('status') }}
        <button type="button"
            class="close"
            data-dismiss="alert"
            aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
@endif