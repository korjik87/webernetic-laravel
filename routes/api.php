<?php

use App\Http\Controllers\ArticleController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::get('/articles', [ArticleController::class, 'index'])->middleware('auth:sanctum');
Route::get('/articles/{id}', [ArticleController::class, 'show'])->middleware('auth:sanctum');
Route::post('/articles', [ArticleController::class, 'store'])->middleware('auth:sanctum');
Route::put('/articles/{id}', [ArticleController::class, 'update'])->middleware('auth:sanctum');
Route::delete('/articles/{id}', [ArticleController::class, 'destroy'])->middleware('auth:sanctum');

