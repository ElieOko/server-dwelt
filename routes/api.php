<?php

use App\Http\Controllers\AgentController;
use App\Http\Controllers\PropertyController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;


Route::post('/maisons', [PropertyController::class, 'store']);
Route::post('/agents', [AgentController::class, 'store']);
Route::middleware(['auth:sanctum'])->group(function () {
    // Route::resource('client', ClientController::class)->only(['index', 'store']);
});
