<?php

use App\Http\Controllers\ObservationController;
use App\Http\Controllers\ScientistController;
use App\Http\Controllers\StarController;
use App\Http\Resources\StarResource;
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

//Route::get('stars',[StarController::class,'index']);
//Route::get('stars/{id}',[StarController::class,'show']);

Route::resource('stars',StarController::class);
Route::resource('scientists',ScientistController::class);
Route::resource('observations',ObservationController::class);