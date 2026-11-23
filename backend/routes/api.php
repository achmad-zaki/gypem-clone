<?php

use Illuminate\Support\Facades\Route;


use App\Http\Controllers\Api\EventController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\LevelController;



Route::middleware('throttle:api')->group(function () {
Route::get('/events', [EventController::class, 'index']);
Route::post('/events', [EventController::class, 'store']);
Route::get('/events/{id}', [EventController::class, 'show']);
Route::patch('/events/{id}', [EventController::class, 'update']);
Route::delete('/events/{id}', [EventController::class, 'destroy']);

Route::get('/category', [CategoryController::class, 'index']);
Route::post('/category', [CategoryController::class, 'store']);
Route::get('/category/{id}', [CategoryController::class, 'show']);
Route::patch('/category/{id}', [CategoryController::class, 'update']);
Route::delete('/category/{id}', [CategoryController::class, 'destroy']);

Route::get('/level', [LevelController::class, 'index']);
Route::post('/level', [LevelController::class, 'store']);
Route::get('/level/{id}', [LevelController::class, 'show']);
Route::patch('/level/{id}', [LevelController::class, 'update']);
Route::delete('/level/{id}', [LevelController::class, 'destroy']);
});

