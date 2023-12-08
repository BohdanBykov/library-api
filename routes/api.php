<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\BookController;
use App\Http\Controllers\FavoriteController;
use App\Http\Controllers\AdminController;

// Authentication routes
Route::post('/register', [AuthController::class, 'register']);
Route::post('/login', [AuthController::class, 'login']);
Route::post('/logout', [AuthController::class, 'logout'])->middleware('auth:api');

// Book routes
Route::get('/books', [BookController::class, 'index']);
Route::get('/books/{id}', [BookController::class, 'show']);
Route::post('/books', [BookController::class, 'store'])->middleware('auth:api', 'isAdmin');
Route::delete('/books/{id}', [BookController::class, 'destroy'])->middleware('auth:api', 'isAdmin');

// Favorite routes
Route::post('/favorites/{bookId}', [FavoriteController::class, 'addFavorite'])->middleware('auth:api');
Route::delete('/favorites/{bookId}', [FavoriteController::class, 'removeFavorite'])->middleware('auth:api');
Route::get('/favorites', [FavoriteController::class, 'getUserFavorites'])->middleware('auth:api');


// Admin routes
Route::post('/admin/assign-role/{userId}', [AdminController::class, 'assignRole'])->middleware('auth:api', 'isAdmin');
