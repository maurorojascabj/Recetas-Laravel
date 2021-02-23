<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Receta extends Model
{
    //Campos que se agregaran
    protected $fillable = [
        'titulo', 'categoria_id', 'ingredientes', 'preparacion', 'imagen'
    ];

    //
    public function categoria(){
        return $this->belongsTo(CategoriaReceta::class);
    }

    //Obtiene la informacion del usuario mediante FK
    public function autor(){
        return $this->belongsTo(User::class, 'user_id'); //FK de esta tabla
    }
}
