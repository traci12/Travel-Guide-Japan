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
    return view('index');
});

use App\Http\Controllers\DestinationController;
Route::post('/destination', [DestinationController::class, 'index']);

use App\Http\Controllers\WeatherController;
Route::get('/weather/{destination}', [WeatherController::class, 'index']);

use App\Http\Controllers\PlacesController;
Route::get('/places/{destination}', [PlacesController::class, 'index']);
