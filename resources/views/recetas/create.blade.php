@extends('layouts.app')

@section('buttons')
   <a class="btn btn-primary mr-2" href="{{ route('recetas.index')}}">Volver</a>

@endsection

@section('content')

   <h2 class="text-center mb-5">Crear nueva receta</h2>
   <div class="row justify-content-center mt-5">
        <div class="col-md-8">
            <form action="{{route('recetas.store')}}" method="post" novalidate>
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
                    <input class="btn btn-primary" type="submit" value="Agregar receta">
                </div>

            </form>
        </div>

   </div>


@endsection