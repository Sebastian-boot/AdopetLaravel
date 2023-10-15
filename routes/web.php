<?php

use App\Http\Controllers\AnimalController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');


Route::group(['middleware' => 'auth'], function(){
    Route::resource('animal', AnimalController::class);
    Route::resource('fundaciones', App\Http\Controllers\ApiFundacionesController::class);
    Route::post('animal/{animal}/vaccine/', [App\Http\Controllers\AnimalController::class, 'storeAnimalVaccine'])
        ->name('animal.storeVaccine');
    Route::delete('animal/{animal}/vaccine/{vaccine}', [App\Http\Controllers\AnimalController::class, 'destroyAnimalVaccine'])
        ->name('animal.destroyVaccine');
});
