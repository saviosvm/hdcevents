<?php

use Illuminate\Http\Request;
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

Route::get('/', [App\Http\Controllers\EventController::class, 'index'])->name('event.index');
Route::get('/event/create', [App\Http\Controllers\EventController::class, 'create']);
Route::get('/event/{id}', [App\Http\Controllers\EventController::class, 'show'])->name('event.show');
Route::post('/event', [App\Http\Controllers\EventController::class, 'store'])->name('event.store');
Route::get('/produtos', [App\Http\Controllers\ProdutoController::class, 'index']);



Route::get('/produtos_teste/{id?}', function ($id = null) {
    return view('layouts.product',['id' => $id]);
});


