@extends('layouts.app')

@section('styles')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/trix/1.3.1/trix.css" integrity="sha512-CWdvnJD7uGtuypLLe5rLU3eUAkbzBR3Bm1SFPEaRfvXXI2v2H5Y0057EMTzNuGGRIznt8+128QIDQ8RqmHbAdg==" crossorigin="anonymous" />
@endsection

@section('buttons')
   <a class="btn btn-primary mr-2" href="{{ route('recetas.index')}}">Volver</a>
@endsection

@section('content')
<h3>Perfil: {{$perfil->nombre}}</h3>
<h4>Usuario: {{$perfil->usuario}}</h4>

	<h1 class="text-center">Editar Mi Perfil</h1>
	<div class="row justify-content-center mt-5">
		<div class="col-md-10 bg-white p-3">
			<form action="{{route('perfiles.update', ['perfil' => $perfil->id])}}" method="POST" enctype="multipart/form-data" novalidate>
				@csrf
				@method('put')
				<div class="from-group">
					<label for="nombre">Nombre Usuario:</label>
					<input
						class="form-control
						@error('nombre') is-invalid @enderror" 
						type="text"
						name="nombre"
						id="nombre"  
						placeholder="Nombre Usuario"
						value="{{$perfil->usuario->name}}"
					>
					@error('nombre')
						<span class="invalid-feedback d-block" role="alert">
							<strong>{{$message}}</strong>
						</span>
					@enderror						
				</div>
				<div class="from-group">
					<label for="url">Sitio Web:</label>
					<input
						class="form-control
						@error('url') is-invalid @enderror" 
						type="text"
						name="url"
						id="url"  
						placeholder="www.misitioweb.com"
						value="{{$perfil->usuario->url}}"
					>
					@error('url')
						<span class="invalid-feedback d-block" role="alert">
							<strong>{{$message}}</strong>
						</span>
					@enderror						
				</div>
				<div class="form-group mt-4">
                    <label for="biografia">
                        Biografia:
                    </label>
                    <input type="hidden" name="biografia" id="biografia" value="{{$perfil->biografia}}">
                    <trix-editor 
                        class="form-control @error('biografia') is-invalid @enderror"
                        input="biografia">
                    </trix-editor>
                    @error('biografia')
                        <span class="invalid-feedback d-block" role="alert">
                            <strong>{{$message}}</strong>
                        </span>
                    @enderror
                </div>
				<div class="form-group mt-4 ">
					<label for="imagen">Elige tu imagen</label>
					<input 
						class="form-control @error('imagen') is-invalid @enderror"
						id="imagen"
						name="imagen"
						type="file"
					>
					@if($perfil->imagen)
						<div class="mt-4">
							<p>Imagen Actual:</p>
							<img src="/storage/{{$perfil->imagen}}" style="width:200px">
							@error('imagen')
								<span class="invalid-feedback d-block" role="alert">
									<strong>{{$message}}</strong>
								</span>
							@enderror
						</div>
					@endif
				</div>
				<div class="form-group">
					<input class="btn btn-primary" type="submit" value="Actualizar perfil">
			</div>
			</form>
		</div>
	</div>

@endsection

@section('scripts')
	<script 
		src="https://cdnjs.cloudflare.com/ajax/libs/trix/1.3.1/trix.js" 
		integrity="sha512-/1nVu72YEESEbcmhE/EvjH/RxTg62EKvYWLG3NdeZibTCuEtW5M4z3aypcvsoZw03FAopi94y04GhuqRU9p+CQ==" 
		crossorigin="anonymous"
		defer
	>
	</script>
@endsection