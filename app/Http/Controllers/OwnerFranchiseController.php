<?php

namespace App\Http\Controllers;

use App\Models\Owner;
use Illuminate\Http\Request;

class OwnerFranchiseController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $owner = Owner::find(1);
        $franchises = $owner->franchises()->paginate(10);
        return view('owner.table.franchise')
            ->with(compact('owner'))
            ->with(compact('franchises'))
            ->with('i', (request()->input('page', 1) - 1) * 10);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Franchise  $franchise
     * @return \Illuminate\Http\Response
     */
    public function show(Franchise $franchise)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Franchise  $franchise
     * @return \Illuminate\Http\Response
     */
    public function edit(Franchise $franchise)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Franchise  $franchise
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Franchise $franchise)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Franchise  $franchise
     * @return \Illuminate\Http\Response
     */
    public function destroy(Franchise $franchise)
    {
        //
    }
}
