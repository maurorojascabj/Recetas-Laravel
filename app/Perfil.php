<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Perfil extends Model
{
    /**Relacion 1:1 - belongsTio -> Un perfil pertenece a un usuario */
    public function usuario(){
        return $this->belongsTo(User::class, 'user_id');
    }
}
