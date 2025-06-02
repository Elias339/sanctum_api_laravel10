<?php

use App\Http\Controllers\Api\DashboardController;
use App\Http\Controllers\Api\UserShowController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('user',UserShowController::class);
Route::get('dashboard',DashboardController::class);
