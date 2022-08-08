<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ItemController;
use App\Http\Controllers\PrestasiController;

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
    return view('prestasi');
});

Route::get('/prestasi', function () {
    return view('prestasi');
});

Route::get('/table', function () {
    return view('table');
});

Route::get('/item',[ItemController::class, 'index'])->name('index-item');
Route::post('/post/item', [ItemController::class, 'store'])->name('item');

Route::get('/prestasi', [PrestasiController::class, 'index']);
Route::post('/post/prestasi', [PrestasiController:: class, 'store']);
Route::patch('/prestasi/edit', [PrestasiController::class, 'update']);
Route::delete('/prestasi/delete', [PrestasiController::class, 'destroy']);
