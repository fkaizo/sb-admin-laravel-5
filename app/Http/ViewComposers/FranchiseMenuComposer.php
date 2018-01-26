<?php 
namespace App\Http\ViewComposers;

use App\Models\Franchise;

class FranchiseMenuComposer {


    public function compose($view){
        $view->with('franchiseList', Franchise::where("id_owner",1)->get());
    }
}