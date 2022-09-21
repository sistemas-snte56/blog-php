<?php

namespace App\Http\Controllers;

use App\Models\Anuncios;
use App\Models\Blog;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\View;

class AnunciosController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $blog = Blog::all(); // Traemos todos los registros
        $anuncios = Anuncios::all();
        return View::make('paginas.anuncios')->with('anuncios',$anuncios)->with('blog' , $blog);
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
     * @param  \App\Models\Anuncios  $anuncios
     * @return \Illuminate\Http\Response
     */
    public function show(Anuncios $anuncios)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Anuncios  $anuncios
     * @return \Illuminate\Http\Response
     */
    public function edit(Anuncios $anuncios)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Anuncios  $anuncios
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Anuncios $anuncios)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Anuncios  $anuncios
     * @return \Illuminate\Http\Response
     */
    public function destroy(Anuncios $anuncios)
    {
        //
    }
}
