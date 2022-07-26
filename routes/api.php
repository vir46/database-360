<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;




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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('/karyawan', 'Api\KaryawanController@index');


Route::get('/scoring/{id}', 'Api\ScoringController@show');
Route::get('/scoringall', 'Api\ScoringController@index');
Route::post('/scoring', 'Api\ScoringController@store');
Route::get('/check/{id_from}/{id_to}', 'Api\ScoringController@check_available');

Route::put('/karyawan/{id}', 'Api\KaryawanController@edit');