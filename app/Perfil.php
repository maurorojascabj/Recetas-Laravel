<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Perfil extends Model
{
    /**Relacion 1:1 - hasOne -> Un perfil tiene asociado un usuario */
    public function usuario(){
        return $this->belongsTo(User::class);
    }
}
