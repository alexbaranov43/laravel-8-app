<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\API\UserController;
use App\Http\Controllers\API\ImageController;
/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('users', [UserController::class, 'index']);
Route::get('users/{id}', [UserController::class, 'show'])->where('id', '[0-9]+');
Route::get('images/{id}', [ImageController::class, 'show'])->where('id', '[0-9]+');
Route::patch('manage/user/{id}', [UserController::class, 'update'])->where('id', '[0-9]+');
Route::post('store/image', [ImageController::class, 'store']);
Route::post('manage/user/store', [UserController::class, 'store']);
Route::delete('manage/user/{id}/delete', [UserController::class, 'destroy'])->where('id', '[0-9]+');
