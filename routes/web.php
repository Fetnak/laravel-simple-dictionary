<?php

use App\Http\Controllers\DictionariesController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\SessionController;
use App\Http\Controllers\WordController;
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

Route::get('/', [DictionariesController::class, 'index']);
Route::get('dictionary/{dictionary}', [DictionariesController::class, 'show'])->middleware('auth');
Route::delete('dictionary/{dictionary}', [DictionariesController::class, 'delete'])->middleware('auth');
Route::get('dictionary/{dictionary}/export', [DictionariesController::class, 'export'])->middleware('auth');
Route::post('dictionary/{dictionary}/import', [DictionariesController::class, 'import'])->middleware('auth');
Route::get('dictionary-create', [DictionariesController::class, 'createPage'])->middleware('auth');
Route::post('dictionary-create', [DictionariesController::class, 'create'])->middleware('auth');

Route::get('dictionary/{dictionary}/add', [WordController::class, 'addPage'])->middleware('auth');
Route::post('dictionary/{dictionary}/add', [WordController::class, 'add'])->middleware('auth');
Route::delete('dictionary/{dictionary}/delete/{word}', [WordController::class, 'delete'])->middleware('auth');

Route::get('register', [RegisterController::class, 'create'])->middleware('guest');
Route::post('register', [RegisterController::class, 'store'])->middleware('guest');

Route::post('logout', [SessionController::class, 'destroy'])->middleware('auth');

Route::get('login', [SessionController::class, 'create'])->middleware('guest');
Route::post('login', [SessionController::class, 'store'])->middleware('guest');
