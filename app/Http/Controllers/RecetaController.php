<?php

namespace App\Http\Controllers;

use App\CategoriaReceta;
use App\Receta;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;


class RecetaController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        // Auth::user()->recetas->dd();
        $recetas = auth()->user()->recetas;
        return view('recetas.index')->with('recetas',$recetas);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //DB::table('categoria_receta')->get()->pluck('id','nombre')->dd();
        //Forma de obtener las categorías (sin modelo)
        // $categorias = DB::table('categoria_recetas')->get()->pluck('nombre','id');

        //Forma de obtener la categoría (con modelo)
        $categorias = CategoriaReceta::all(['id', 'nombre']);

        return view('recetas.create')->with('categorias',$categorias);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        
        $data = request()->validate([
            'titulo' => 'required|min:6',
            'ingredientes' => 'required',
            'preparacion' => 'required',
            'imagen' => 'required|image',
            'categoria' => 'required',
        ]);

        //Se obtiene la ruta de la imagen
        $ruta_imagen = $request['imagen']->store('upload-recetas', 'public');

        //Se almacena en la BD(sin modelo)
        // DB::table('recetas')->insert([
        //     'titulo' => $data['titulo'],
        //     'ingredientes' => $data['ingredientes'],
        //     'preparacion' => $data['preparacion'],
        //     'imagen' => $ruta_imagen,
        //     'user_id' => Auth::user()->id,
        //     'categoria_id' => $data['categoria']

        // ]);

        //Se almacena en la BD (con modelo)
        auth()->user()->Receta->create([
            'titulo' => $data['titulo'],
            'ingredientes' => $data['ingredientes'],
            'preparacion' => $data['preparacion'],
            'imagen' => $ruta_imagen,
            'categoria_id' => $data['categoria']
        ]);

        //Redireccionar
        return redirect()->action('RecetaController@index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Receta  $receta
     * @return \Illuminate\Http\Response
     */
    public function show(Receta $receta)
    {
        //
        return view('recetas.show')->with('receta', $receta); 
        //(Con compact)
        //return view('recetas.show', compact('receta));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Receta  $receta
     * @return \Illuminate\Http\Response
     */
    public function edit(Receta $receta)
    {
        $categorias = CategoriaReceta::all(['id', 'nombre']);
   
        return view('recetas.edit', compact('categorias', 'receta'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Receta  $receta
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Receta $receta)
    {
        //Revisar el policy
        $this->authorize('update', $receta);
        
        //Validación
        $data = request()->validate([
            'titulo' => 'required|min:6',
            'ingredientes' => 'required',
            'preparacion' => 'required',
            'categoria' => 'required',
        ]);

        //Asignar los valores
        $receta->titulo = $data['titulo'];
        $receta->ingredientes = $data['ingredientes'];
        $receta->preparacion = $data['preparacion'];
        $receta->categoria_id = $data['categoria'];
        //Si el usuario sube nueva imagen
        if (request('imagen')) {
            //Se obtiene la ruta de la imagen
            $ruta_imagen = $request['imagen']->store('upload-recetas', 'public');
            $receta->imagen = $ruta_imagen;
        }
        $receta->save();

        //Redireccionar
        return redirect()->action('RecetaController@index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Receta  $receta
     * @return \Illuminate\Http\Response
     */
    public function destroy(Receta $receta)
    {
        return "eliminando...";
        //Ejecuta el policy
        $this->authorize('delete', $receta);
        //Elimina la receta
        $receta->delete();
        return redirect()->action('RecetaController@index');
    }
}
