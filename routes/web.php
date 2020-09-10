<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

//Route::resource('comics','ComicController');

Route::get('comics', 'ComicController@index')->name('comics.index');
Route::get('comics/create', 'ComicController@create')->name('comics.create');
Route::get('comics/{comic}', 'ComicController@show')->name('comics.show');
Route::post('comics', 'ComicController@store')->name('comics.store');
Route::delete('comics/{comic}', 'ComicController@destroy')->name('comics.destroy');
Route::patch('comics/{comic}', 'ComicController@update')->name('comics.update');
Route::get('comics/{comic}/edit', 'ComicController@update')->name('comics.edit');

//Route::resource('paginas','PaginaController');

Route::get('paginas', 'PaginaController@index')->name('paginas.index');
Route::get('paginas/create/{comic}', 'PaginaController@create')->name('paginas.create');
Route::get('paginas/{pagina}', 'PaginaController@show')->name('paginas.show');
Route::post('paginas', 'PaginaController@store')->name('paginas.store');
Route::delete('paginas/{pagina}', 'PaginaController@destroy')->name('paginas.destroy');
Route::patch('paginas/{pagina}', 'PaginaController@update')->name('paginas.update');
Route::get('paginas/{pagina}/edit', 'PaginaController@update')->name('paginas.edit');