<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Pessoa extends Model
{
    protected $table = "pessoa";

    public function endereco(){
        return $this->hasOne("App\Models\Endereco", "id", "id_endereco");
    }

    public function telefones(){
        return $this->belongsToMany("App\Models\Telefone", "telefone_pessoa" ,"id_pessoa", "id_telefone");
    }

    public function condutor(){
        return $this->belongsTo("App\Models\Condutor", "id", "id_pessoa");
    }

    public function foto(){
        return $this->hasOne("App\Models\Foto", "id", "id_foto");
    }
}
