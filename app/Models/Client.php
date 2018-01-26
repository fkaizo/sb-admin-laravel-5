<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Client extends Model
{
    protected $table = "client";

    public function franchise(){
        return $this->belongsTo("App\Models\Franchise", "id_franchise", "id");
    }

    public function pessoa(){
        return $this->hasOne("App\Models\Pessoa", "id", "id_pessoa");
    }
}
