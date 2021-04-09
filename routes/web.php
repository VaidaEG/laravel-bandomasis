<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HorseController;
use App\Http\Controllers\PunterController;

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
Route::middleware(['auth'])->group(function () {
    Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

    Route::group(['prefix' => 'horses'], function () {
        Route::get('', [HorseController::class, 'index'])->name('horse.index');
        Route::get('create', [HorseController::class, 'create'])->name('horse.create');
        Route::post('store', [HorseController::class, 'store'])->name('horse.store');
        Route::get('edit/{horse}', [HorseController::class, 'edit'])->name('horse.edit');
        Route::post('update/{horse}', [HorseController::class, 'update'])->name('horse.update');
        Route::post('delete/{horse}', [HorseController::class, 'destroy'])->name('horse.destroy');
        Route::get('show/{horse}', [HorseController::class, 'show'])->name('horse.show');
    });
    Route::group(['prefix' => 'punters'], function () {
        Route::get('', [PunterController::class, 'index'])->name('punter.index');
        Route::get('create', [PunterController::class, 'create'])->name('punter.create');
        Route::post('store', [PunterController::class, 'store'])->name('punter.store');
        Route::get('edit/{punter}', [PunterController::class, 'edit'])->name('punter.edit');
        Route::post('update/{punter}', [PunterController::class, 'update'])->name('punter.update');
        Route::post('delete/{punter}', [PunterController::class, 'destroy'])->name('punter.destroy');
        Route::get('show/{punter}', [PunterController::class, 'show'])->name('punter.show');
    });
});

