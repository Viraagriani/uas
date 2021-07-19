<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});
//ini akses untuk berita
Route::get('/Berita','BeritaController@index');
Route::get('/Berita/{id}','BeritaController@show'); 
Route::delete('/Berita/{id}','BeritaController@destroy'); 
Route::post('/Berita','BeritaController@store'); 
Route::patch('/Berita','BeritaController@update'); 






