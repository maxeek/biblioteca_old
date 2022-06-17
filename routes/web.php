<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthorController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\BookController;
use App\Http\Controllers\UserBookController;
use App\Http\Controllers\LeaseController;
use App\Http\Controllers\Lease;



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

// Auth::routes();

// Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

// Route::get('books/{id}/lend', 'App\Http\Controllers\BookController@lend');
// Route::patch('books/{id}', 'App\Http\Controllers\BookController@lendupdate');
// ->name('book.lend');

Route::resource('books', BookController::class);


Route::get('aprestar/{id}', 'App\Http\Controllers\LeaseController@paraprestar');
Route::get('adevolver/{id}', 'App\Http\Controllers\LeaseController@paradevolver');


Route::resource('lends', LeaseController::class);





Route::resource('authors', AuthorController::class);
Route::resource('categories', CategoryController::class);

Route::resource('users-book', UserBookController::class);


Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
