@extends('layouts.app')

@section('styles')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/trix/1.3.1/trix.css" integrity="sha512-CWdvnJD7uGtuypLLe5rLU3eUAkbzBR3Bm1SFPEaRfvXXI2v2H5Y0057EMTzNuGGRIznt8+128QIDQ8RqmHbAdg==" crossorigin="anonymous" />
@endsection

@section('buttons')
   <a class="btn btn-primary mr-2" href="{{ route('recetas.index')}}">Volver</a>

@endsection

@section('content')

   <h2 class="text-center mb-5">Editar receta: {{$receta->titulo}}</h2>
   

   <div class="row justify-content-center mt-5">
        <div class="col-md-8">
            <form action="{{route('recetas.update', ['receta' => $receta->id])}}" method="post" enctype="multipart/form-data" novalidate>
                @csrf {{--Compara con csrf de app.blade, para poder realizar el post del form--}}
                @method('PUT') {{--Para permitir una peticion put en html--}}

                <div class="form-group">
                    <label for="titulo">Título Receta:</label>
                    <input 
                        class="form-control 
                        @error('titulo') is-invalid @enderror" 
                        type="text" 
                        name="titulo" 
                        id="titulo"  
                        placeholder="Título Receta"
                        value="{{$receta->titulo}}"
                    >
                    @error('titulo')
                        <span class="invalid-feedback d-block" role="alert">
                            <strong>{{$message}}</strong>
                        </span>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="categoria">
                        Categoria:
                    </label>
                    <select class="form-control @error('categoria') is-invalid @enderror" name="categoria" id="categoria">
                        <option value="">--Seleccione una categoría--</option>
                        @foreach($categorias as $categoria)
                            <option 
                                value="{{$categoria->id}}" 
                                {{$receta->categoria_id == $categoria->id ? 'selected' : ''}}
                            >
                                {{$categoria->nombre}}
                            </option>
                        @endforeach
                    </select>
                    @error('categoria')
                        <span class="invalid-feedback d-block" role="alert">
                            <strong>{{$message}}</strong>
                        </span>
                    @enderror
                </div>

                <div class="form-group mt-4">
                    <label for="ingredientes">
                        Ingredientes:
                    </label>
                    <input type="hidden" name="ingredientes" id="ingredientes" value="{{$receta->ingredientes}}">
                    <trix-editor 
                        class="form-control @error('ingredientes') is-invalid @enderror"
                        input="ingredientes">
                    </trix-editor>
                    @error('ingredientes')
                        <span class="invalid-feedback d-block" role="alert">
                            <strong>{{$message}}</strong>
                        </span>
                    @enderror
                </div>

                <div class="form-group mt-4">
                    <label for="preparacion">
                        Preparacion:
                    </label>
                    <input type="hidden" name="preparacion" id="preparacion" value="{{$receta->preparacion}}">
                    <trix-editor 
                        class="form-control @error('preparacion') is-invalid @enderror"
                        input="preparacion">
                    </trix-editor>
                    @error('preparacion')
                        <span class="invalid-feedback d-block" role="alert">
                            <strong>{{$message}}</strong>
                        </span>
                    @enderror
                </div>

                <div class="form-group mt-4 ">
                    <label for="imagen">Elige la imagen</label>
                    <input 
                        class="form-control @error('imagen') is-invalid @enderror"
                        id="imagen"
                        name="imagen"
                        type="file"
                    >
                    <div class="mt-4">
                        <p>Imagen Actual:</p>
                        <img src="/storage/{{$receta->imagen}}" style="width:300px">
                        @error('imagen')
                            <span class="invalid-feedback d-block" role="alert">
                                <strong>{{$message}}</strong>
                            </span>
                        @enderror
                    </div>
                </div>

                <div class="form-group">
                    <input class="btn btn-primary" type="submit" value="Agregar receta">
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