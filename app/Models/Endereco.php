<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Endereco extends Model
{
    protected $table = "endereco";

    public function pessoa(){
        return $this->belongsTo('App\Models\Pessoa');
    }
}
