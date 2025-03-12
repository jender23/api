<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CharacterController;
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



Route::get('/characters/fetch', [CharacterController::class, 'fetchCharacters'])->name('characters.fetch');
Route::post('/characters/store', [CharacterController::class, 'storeCharacters'])->name('characters.store');
Route::get('/characters', [CharacterController::class, 'index'])->name('characters.index');
Route::get('/characters/edit/{id}', [CharacterController::class, 'edit'])->name('characters.edit');
Route::post('/characters/update/{id}', [CharacterController::class, 'update'])->name('characters.update');
