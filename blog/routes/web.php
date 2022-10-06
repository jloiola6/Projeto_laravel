<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BookController;

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

// Route::get('/teste', function () {
//     return view('welcome');
// });

Route::get('books/', [BookController::class, 'index']);
Route::get('books/create', [BookController::class, 'create']);
Route::post('books/store', [BookController::class, 'store']);
Route::get('books/{id}', [BookController::class, 'show']);
Route::get('books/{id}/edit', [BookController::class, 'edit']);
Route::get('books/update/{id}', [BookController::class, 'update']);
Route::delete('/books/delete/{id}', [BookController::class, 'delete']);
