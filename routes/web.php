<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\WeatherController;


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
    return redirect('/weather');
});


// Route pour afficher le formulaire
Route::get('/weather', [WeatherController::class, 'showForm'])->name('weather.form');

// Route pour traiter la soumission du formulaire
Route::get('/weather/show', [WeatherController::class, 'showWeather'])->name('weather.show');