<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Pessoa extends Model
{
    protected $table = "pessoa";

    public function endereco(){
        return $this->belongsTo("App\Models\Endereco", "id_endereco", "id");
    }

    public function telefones(){
        return $this->belongsToMany("App\Models\Telefone", "telefone_pessoa" ,"id_pessoa", "id_telefone");
    }

    public function condutor(){
        return $this->belongsTo("App\Models\Condutor", "id", "id_pessoa");
    }

    public function foto(){
        return $this->belongsTo("App\Models\Foto", "id_foto", "id");
    }

    public function ownerManager(){
        return $this->belongsToMany("App\Models\Owner", "owner_manager", "id_pessoa", "id_owner");
    }

    public function franchiseManager(){
        return $this->belongsToMany("App\Models\Franchise", "franchise_manager", "id_pessoa", "id_franchise");
    }

    public function user(){
        return $this->hasOne("App\User", "email","email");
    }
}
