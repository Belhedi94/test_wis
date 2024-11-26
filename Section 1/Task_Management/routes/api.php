<?php

use App\Http\Controllers\TaskController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthenticationController;

Route::post('register', [AuthenticationController::class, 'register']);
Route::post('login', [AuthenticationController::class, 'login']);

Route::middleware(['auth.jwt'])->group(function () {
    Route::post('tasks', [TaskController::class, 'store']);
    Route::get('tasks', [TaskController::class, 'index']);
    Route::put('tasks/{id}', [TaskController::class, 'update']);
    Route::get('logout', [AuthenticationController::class, 'logout']);
});

