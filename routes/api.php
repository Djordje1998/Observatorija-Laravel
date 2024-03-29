<?php

use App\Http\Controllers\API\AuthController;
use App\Http\Controllers\ObservationController;
use App\Http\Controllers\ScientistController;
use App\Http\Controllers\StarController;
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

Route::resource('stars', StarController::class)->only('index', 'show',);
Route::resource('scientists', ScientistController::class)->only('index', 'show');
Route::resource('observations', ObservationController::class)->only('index', 'show');
Route::post('/register', [AuthController::class, 'register']);
Route::post('/login', [AuthController::class, 'login']);

Route::group(['middleware' => ['auth:sanctum']], function () {
    Route::resource('stars', StarController::class)->only('store', 'update', 'destroy');
    Route::resource('scientists', ScientistController::class)->only('store',  'update', 'destroy');
    Route::resource('observations', ObservationController::class)->only('store');
    Route::delete('/observations', [ObservationController::class, 'destroy']);
    Route::post('/logout', [AuthController::class, 'logout']);
});
