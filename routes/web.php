<?php

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

Auth::routes();
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('/', [App\Http\Controllers\IndexReviewController::class, 'index'])->name("index_review");

Route::get('/review/create', [App\Http\Controllers\CreateReviewController::class, "create"])->name("create_review");
Route::post('/review/create', [App\Http\Controllers\CreateReviewController::class, "store"])->name("store_review");

// Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
//     return view('dashboard');
// })->name('dashboard');



