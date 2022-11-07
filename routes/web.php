<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\Section1Controller;
use App\Http\Controllers\Section2Controller;

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

Route::get('/', [HomeController::class, 'index'])->name('home');

Route::group(['prefix' => 'section1', 'as' => 'section1.'], function() {

    Route::post('/create', [Section1Controller::class, 'store'])->name('store');
    Route::post('/update', [Section1Controller::class, 'update'])->name('update');
    Route::post('/delete', [Section1Controller::class, 'destroy'])->name('delete');

});

Route::group(['prefix' => 'section2', 'as' => 'section2.'], function() {

    Route::post('/create', [Section2Controller::class, 'store'])->name('store');
    Route::post('/update', [Section2Controller::class, 'store'])->name('update');
    Route::post('/delete', [Section2Controller::class, 'destroy'])->name('delete');

});
