<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Response;

class ApiController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke(Request $request, $comic_id)
    {

        $paginas = DB::table('paginas')->where('comic_id', $comic_id)->get();

        $imagenes = array();
        $i = 0;

        foreach($paginas as $pagina){
            $imagenes[$i] = "http://editorial.androidykotlin.com/storage/".$pagina->url;
            $i++;
        }


        return Response::Json(
            array(
                'status'=> 'success',
                'pagina' => $imagenes,
            ),200);
    }
}
