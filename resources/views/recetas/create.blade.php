@extends('layouts.app')

@section('styles')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/trix/1.3.1/trix.css" integrity="sha512-CWdvnJD7uGtuypLLe5rLU3eUAkbzBR3Bm1SFPEaRfvXXI2v2H5Y0057EMTzNuGGRIznt8+128QIDQ8RqmHbAdg==" crossorigin="anonymous" />
@endsection

@section('buttons')
   <a class="btn btn-outline-primary text-uppercase font-weight-bold mr-2" href="{{ route('recetas.index')}}">
        <svg class="icono" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 15l-3-3m0 0l3-3m-3 3h8M3 12a9 9 0 1118 0 9 9 0 01-18 0z" />
        </svg>
        Volver
    </a>
@endsection

@section('content')

   <h2 class="text-center mb-5">Crear nueva receta</h2>


   <div class="row justify-content-center mt-5">
        <div class="col-md-8">
            <form action="{{route('recetas.store')}}" method="post" enctype="multipart/form-data" novalidate>
                @csrf {{--Compara con csrf de app.blade, para poder realizar el post del form--}}
                <div class="form-group">
                    <label for="titulo">Título Receta:</label>
                    <input 
                        class="form-control 
                        @error('titulo') is-invalid @enderror" 
                        type="text" 
                        name="titulo" 
                        id="titulo"  
                        placeholder="Título Receta"
                        value={{old('titulo')}}
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
                                {{old('categoria') == $categoria->id ? 'selected' : ''}}
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
                    <input type="hidden" name="ingredientes" id="ingredientes" value="{{old('ingredientes')}}">
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
                    <input type="hidden" name="preparacion" id="preparacion" value="{{old('preparacion')}}">
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
                    @error('imagen')
                        <span class="invalid-feedback d-block" role="alert">
                            <strong>{{$message}}</strong>
                        </span>
                    @enderror
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