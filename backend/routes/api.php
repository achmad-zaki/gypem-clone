<?php

use App\Http\Controllers\Api\AuthController;
use App\Http\Controllers\Api\EventController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\LevelController;
use Illuminate\Support\Facades\Route;

Route::post('/register', [AuthController::class, 'register']);
Route::post('/login', [AuthController::class, 'login']);

Route::middleware('auth:sanctum')->group(function () {
    Route::get('/me', [AuthController::class, 'me']);
    Route::post('/logout', [AuthController::class, 'logout']);

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

    Route::get('/levels', [LevelController::class, 'index']);
    Route::post('/levels', [LevelController::class, 'store']);
    Route::get('/levels/{id}', [LevelController::class, 'show']);
    Route::patch('/levels/{id}', [LevelController::class, 'update']);
    Route::delete('/levels/{id}', [LevelController::class, 'destroy']);
});