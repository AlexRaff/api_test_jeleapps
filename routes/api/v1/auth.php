<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\V1\AuthController;

Route::post('registration', [AuthController::class, 'registration']);
Route::middleware('auth:sanctum')->get('profile', [AuthController::class, 'profile']);
