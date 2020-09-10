<?php

namespace App\Http\Controllers;

use App\Comic;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ComicController extends Controller
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
        $usuario = auth()->user();

        //$comics = Comic::where('user_id', $usuario->id);

        $comics = DB::table('comics')->where('user_id', $usuario->id)->get();

       //return ($usuario->id);
       
        return view('comics.index')
                ->with('comics', $comics);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('comics.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        // validación
        $data = $request->validate([
            'name' => 'required|min:6',
        ]);

        //return redirect()->action('ComicController@index');  

        // almacenar en la BD (con modelo)
        
        auth()->user()->comics()->create([
            'name' => $data['name'],
        ]);

        // Redireccionar
        return redirect()->action('ComicController@index');  
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Comic  $comic
     * @return \Illuminate\Http\Response
     */
    public function show(Comic $comic)
    {

        $paginas = DB::table('paginas')->where('comic_id', $comic->id)->get();
        
        return view('comics.show')
                ->with('comic', $comic)
                ->with('paginas', $paginas);                
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Comic  $comic
     * @return \Illuminate\Http\Response
     */
    public function edit(Comic $comic)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Comic  $comic
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Comic $comic)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Comic  $comic
     * @return \Illuminate\Http\Response
     */
    public function destroy(Comic $comic)
    {
        $comic->delete();

        return redirect()->action('ComicController@index');
    }
}
