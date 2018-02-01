<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function pessoa(){
        return $this->belongsTo('App\Models\Pessoa', 'email', 'email');
    }

    public function isOwnerManager(){
        if($this->pessoa->ownerManager->count() > 0){
            return true;
        }
        return false;
    }

    public function isFranchiseManager(){
        if($this->pessoa->FranchiseManager->count() > 0){
            return true;
        }
        return false;
    }
}
