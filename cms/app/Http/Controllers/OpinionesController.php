<?php

namespace App\Http\Controllers;

use App\Models\Opiniones;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\View;

class OpinionesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $opiniones = Opiniones::all();
        return View::make('paginas.opiniones')->with('opiniones',$opiniones);
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
     * @param  \App\Models\Opiniones  $opiniones
     * @return \Illuminate\Http\Response
     */
    public function show(Opiniones $opiniones)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Opiniones  $opiniones
     * @return \Illuminate\Http\Response
     */
    public function edit(Opiniones $opiniones)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Opiniones  $opiniones
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Opiniones $opiniones)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Opiniones  $opiniones
     * @return \Illuminate\Http\Response
     */
    public function destroy(Opiniones $opiniones)
    {
        //
    }
}
