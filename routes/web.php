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

Route::get('/item',[ItemController::class, 'index'])->name('index-item');
Route::get('/item/create', [ItemController::class, 'create'])->name('create-item');
Route::post('/post/item', [ItemController::class, 'store'])->name('item');
Route::get('/item/{id}', [ItemController::class, 'edit'])->name('edit-item');
Route::patch('/item/update/{id}', [ItemController::class, 'update'])->name('update-item');
Route::delete('/item/delete/{id}', [ItemController::class, 'destroy'])->name('delete-item');

Route::get('/prestasi', [PrestasiController::class, 'index'])->name('index-prestasi');
Route::get('/prestasi/create', [PrestasiController::class, 'create'])->name('create-prestasi');
Route::post('/post/prestasi', [PrestasiController:: class, 'store'])->name('prestasi');
Route::get('/prestasi/{id}', [PrestasiController::class, 'edit'])->name('edit-prestasi');
Route::put('/prestasi/update/{id}', [PrestasiController::class, 'update'])->name('update-prestasi');
Route::delete('/prestasi/delete/{id}', [PrestasiController::class, 'destroy'])->name('delete-prestasi');
