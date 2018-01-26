<?php

namespace App\Http\Controllers;

use App\Models\Owner;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index(){
        $owner = Owner::find(1);

        $franchiseCount = $owner->franchises()->count();

        return view('home')
            ->with(compact('franchiseCount'));

    }
}
