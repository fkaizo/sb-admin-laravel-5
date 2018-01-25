<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Condutor extends Model
{
    protected $table = "condutor";

    public function pessoa(){
        return $this->hasOne("App\Models\Pessoa", "id", "id_pessoa");
    }
}
