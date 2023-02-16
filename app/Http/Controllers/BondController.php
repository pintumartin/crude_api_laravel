<?php

namespace App\Http\Controllers;

use App\Bond;
use Illuminate\Http\Request;

class BondController extends Controller
{
    /**
     * Display a listing of the bonds.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return Bond::all();
    }

    /**
     * Store a newly created bond in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $bond = Bond::create($request->all());

        return response()->json($bond, 201);
    }

    /**
     * Display the specified bond.
     *
     * @param  \App\Bond  $bond
     * @return \Illuminate\Http\Response
     */
    public function show(Bond $bond)
    {
        return $bond;
    }

    /**
     * Update the specified bond in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Bond  $bond
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Bond $bond)
    {
        $bond->update($request->all());

        return response()->json($bond, 200);
    }

    /**
     * Remove the specified bond from storage.
     *
     * @param  \App\Bond  $bond
     * @return \Illuminate\Http\Response
     */
    public function destroy(Bond $bond)
    {
        $bond->delete();

        return response()->json(null, 204);
    }
}
