<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Owner extends Model
{
    protected $table = "owner";

    public function managers(){
        return $this->belongsToMany("App\Models\Pessoa", "owner_manager", "id_owner", "id_pessoa");
    }

    public function franchises(){
        return $this->hasMany("App\Models\Franchise", "id_owner", "id");
    }
}
