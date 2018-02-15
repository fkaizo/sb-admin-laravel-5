<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Endereco extends Model
{
    protected $table = "endereco";

    public function pessoa(){
        return $this->hasOne('App\Models\Pessoa', "id_endereco", "id");
    }
}
