<?php

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
    return redirect('/series');
});

Route::get('/series', 'seriesController@index');
Route::get('/series/criar', 'seriesController@create')->name('form_criar_serie');
Route::post('/series/criar', 'seriesController@store');
Route::delete('/series/{id}', 'seriesController@destroy');
Route::post('/series/{id}/editaNome', 'seriesController@editaNome');

Route::get('/series/{serieId}/temporadas', 'TemporadasController@index');

Route::get('/series/{serieId}/{temporadaID}', 'episodiosController@index');

Route::post('/temporada/{temporada}/episodios/assistir', 'EpisodiosController@assistir');