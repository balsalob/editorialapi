<?php

namespace App\Http\Controllers;

use App\Pagina;
use App\Comic;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PaginaController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('paginas.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Comic $comic)
    {
        return view('paginas.create')->with('comic', $comic);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {        

        $count = Pagina::where('comic_id', $request['id'])->count();
        $count++;
        
        $ruta_imagen = $request->file('archivo')->store('upload-paginas', 'public');

        DB::table('paginas')->insert([
            'url' => $ruta_imagen ,
            'pagina' => $count,
            'comic_id' => $request['id'],
        ]);

        return redirect()->action('ComicController@index');  
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Pagina  $pagina
     * @return \Illuminate\Http\Response
     */
    public function show(Pagina $pagina)
    {
        return view('paginas.show')->with('pagina',$pagina);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Pagina  $pagina
     * @return \Illuminate\Http\Response
     */
    public function edit(Pagina $pagina)
    {
        return view('paginas.edit');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Pagina  $pagina
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Pagina $pagina)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Pagina  $pagina
     * @return \Illuminate\Http\Response
     */
    public function destroy(Pagina $pagina)
    {
        $pagina->delete();

        
        return redirect()->action('ComicController@index');

    }

}
