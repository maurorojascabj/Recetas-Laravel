<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Receta extends Model
{
    //
    public function categoria(){
        return $this->belongsTo(CategoriaReceta::class);
    }
}
