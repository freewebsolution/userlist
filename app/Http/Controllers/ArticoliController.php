<?php

namespace App\Http\Controllers;

use App\Models\Articoli;
use Illuminate\Http\Request;

class ArticoliController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $articoli = Articoli::distinct()->get('articoli_ID');
        return view('categories.corrupt',compact('articoli'));
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
     * @param  \App\Models\Articoli  $articoli
     * @return \Illuminate\Http\Response
     */
    public function show(Articoli $articoli)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Articoli  $articoli
     * @return \Illuminate\Http\Response
     */
    public function edit(Articoli $articoli)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Articoli  $articoli
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Articoli $articoli)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Articoli  $articoli
     * @return \Illuminate\Http\Response
     */
    public function destroy(Articoli $articoli)
    {
        //
    }
}
