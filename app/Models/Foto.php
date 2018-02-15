<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Foto extends Model
{
    protected $table = "foto";

    public function pessoa(){
        return $this->hasOne("\App\Models\Pessoa", "id_foto", "id");
    }
}
