<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;


Route::post('login', [AuthController::class, 'login']);
Route::post('register', [AuthController::class, 'register']);
Route::apiResource('users', UserController::class)->only('store');

Route::group(['middleware' => ['auth:api']], function (){
    Route::apiResource('posts', PostController::class);
    Route::apiResource('users',  UserController::class)->except('store');
});