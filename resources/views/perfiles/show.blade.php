@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-5">
                {{-- Imagen del Perfil --}}
                @if($perfil->imagen)
                    <img src="/storage/{{$perfil->imagen}}" class="w-50 rounded-circle " alt="imagen chef" style="width:100px">
                @endif
            </div>
            <div class="col-md-7 mt-5 mt-md-0">
                <h2 class="text-center text-primary mb-2">
                    {{$perfil->usuario->name}}
                </h2>
                <a href="{{$perfil->usuario->url}}">Visitar Sitio Web</a>
                <div class="biografia">
                    {!!$perfil->biografia !!}
                </div>
            </div>
        </div>
    </div>
    <h5 class="text-center">Recetas Creadas</h5>
    <div class="container">
        <div class="row mx-auto bg-white p-4">
            @if(count($recetas) > 0)
                @foreach($recetas as $receta)
                    <div class="col-md-4 mb-4">
                        <div class="card">
                            <img src="/storage/{{$receta->imagen}}" class="card-img-top" alt="Imagen Receta">
                            <div class="card-body">
                                <h4>{{$receta->titulo}}</h4>
                                <a href="{{route('recetas.show', ['receta' => $receta->id])}}" class="btn btn-primary d-block mt-4 text-uppercase font-weight-bold">Ver receta</a>
                            </div>
                        </div>
                    </div>
                @endforeach
            @else
                <p class="text-center">No tiene recetas creadas</p>
            @endif
        </div>
    </div>
    <div class="d-flex justify-content-center">
        {{$recetas->links()}}
    </div>
@endsection