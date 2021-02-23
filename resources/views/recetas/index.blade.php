 @extends('layouts.app')

 @section('buttons')
    <a class="btn btn-primary mr-2" href="{{ route('recetas.create') }}">Crear receta</a>

 @endsection

 @section('content')

    <h2 class="text-center mb-5">Administra tus recetas</h2>
    <div class="col-md-10 mx-auto bg-white p-3">

        <table class="table">
            <thead class="bg-primary text-light" style="text-align: center">
                <tr>
                    <th scole="col">Título</th>
                    <th scole="col">Categoría</th>
                    <th scole="col">Acciones</th>
                </tr>
            </thead>
            <tbody>
                @foreach($recetas as $receta)    
                <tr style="text-align: center">
                    <td>{{$receta->titulo}}</td>
                    <td>{{$receta->categoria->nombre}}</td>
                    <td>
                        <a href="" class="btn btn-danger mr-1">Eliminar</a>
                        <a href="" class="btn btn-dark mr-1">Editar</a>
                        <a 
                            href="{{route('recetas.show', ['receta' => $receta->id])}}" 
                            class="btn btn-success mr-1"
                        >
                            Ver
                        </a>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>

    </div>


@endsection