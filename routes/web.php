<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SearchController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ImageController;

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

Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');

Route::get('/store', [ImageController::class, 'store']);
Route::get('/search', [SearchController::class, 'index']);
Route::get('/manage/users', [UserController::class, 'manageIndex'])->where('id', '[0-9]+');
Route::get('/manage/users/create', [UserController::class, 'create']);
Route::get('/manage/users/{id}/edit', [UserController::class, 'edit'])->where('id', '[0-9]+');
Route::get('/user/{id}', [UserController::class, 'show'])->where('id', '[0-9]+');
