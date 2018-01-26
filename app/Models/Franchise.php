<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Franchise extends Model
{
    protected $table = "franchise";

    public function managers(){
        return $this->belongsToMany("App\Models\Pessoa", "franchise_manager", "id_franchise", "id_pessoa");
    }

    public function owner(){
        return $this->belongsTo("App\Models\Owner", "id_owner", "id");
    }
}
