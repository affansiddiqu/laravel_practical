<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\form;


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
Route::controller(form ::class)->group(function () {
    Route::get('/form','form')->name('form');
    Route::post('/form','reg')->name('form');
    Route::get('/view','view')->name('view');
    Route::get('/dlt{id}','delete')->name('dlt');
    Route::get('/edit{id}','edit')->name('edit');
    Route::post('/edit{id}','update')->name('update');
});
