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
Route::patch('/Berita/{id}','BeritaController@update'); 



Route::get('/password', function(){
    return bcrypt('vira');
}); 


Route::group([

    'middleware' => 'api',
    'prefix' => 'auth'

], function ($router) {

    Route::post('login', 'AuthController@login');
    Route::post('logout', 'AuthController@logout');
    Route::post('refresh', 'AuthController@refresh');
    Route::post('me', 'AuthController@me');
    Route::post('wajib', 'AuthController@wajib');

});









