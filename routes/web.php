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

// reviews
Route::get('/', [App\Http\Controllers\IndexReviewController::class, 'index'])->name("index_review");

Route::get('/review/create', [App\Http\Controllers\CreateReviewController::class, "create"])->name("create_review");
Route::post('/review/create', [App\Http\Controllers\CreateReviewController::class, "store"])->name("store_review");

Route::get('/review/show/{id}', [App\Http\Controllers\ShowReviewController::class, "show"])->name("show_review");

Route::get('/review/edit/{id}', [App\Http\Controllers\EditReviewController::class, "edit"])->name("edit_review");
Route::post('/review/update/{id}', [App\Http\Controllers\EditReviewController::class, "update"])->name("update_review");

Route::get('/review/delete/{id}', [App\Http\Controllers\DeleteReviewController::class, "delete"])->name("delete_review");
Route::post('/review/destroy/{id}', [App\Http\Controllers\DeleteReviewController::class, "destroy"])->name("destroy_review");

Route::get('/review/search', [App\Http\Controllers\SearchController::class, "index"])->name("search_review");

// comments
Route::get('/comment/create/{id}', [App\Http\Controllers\CommentController::class, "create"])->name("create_comment");
Route::post('/comment/create', [App\Http\Controllers\CommentController::class, "store"])->name("store_comment");

// user
Route::get('user/show/{id}', [App\Http\Controllers\UserController::class, "show"])->name("show_user");
Route::get('user/index', [App\Http\Controllers\UserController::class, "index"])->name(("index_user"));

// likes
Route::get('/review/{review}/like', [App\Http\Controllers\LikeController::class, "store"]);
Route::get('/review/{review}/unlike', [App\Http\Controllers\LikeController::class, "destroy"]);
Route::get('/review/{review}/countlike', [App\Http\Controllers\LikeController::class, "count"]);
Route::get('/review/{review}/haslike', [App\Http\Controllers\LikeController::class, "haslike"]);

Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
  return view('dashboard');
})->name('dashboard');


