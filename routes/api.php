<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\API\AuthController;
use App\Http\Controllers\API\UserController;
use App\Http\Controllers\API\AdminController;
use App\Http\Controllers\API\TeacherController;

Route::post('/login', [AuthController::class, 'login']);
Route::post('/users', [UserController::class, 'store']);
Route::middleware('auth:sanctum')->group(function () {
    Route::post('/logout', [AuthController::class, 'logout']);

    Route::controller(UserController::class)->group(function () {
        Route::get('/users',  'index');
        Route::get('/users/{id}',  'getById');
        Route::post('/users/{id}',  'update');
        Route::delete('/users/{id}',  'delete');
        Route::post('/users/{id}/status',  'updateStatus');
        Route::post('/users/{id}/change-password',  'changePassword');
    });
});
