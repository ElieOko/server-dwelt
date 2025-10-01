<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CityController;
use App\Http\Controllers\AgentController;
use App\Http\Controllers\CommuneController;
use App\Http\Controllers\CountryController;
use App\Http\Controllers\DemandeController;
use App\Http\Controllers\PropertyController;
use App\Http\Controllers\PubliciteController;
use App\Http\Controllers\PartenaireController;
use App\Http\Controllers\TypePropertyController;
use App\Http\Controllers\StatusPropertyController;
use App\Http\Controllers\CaracteristiqueController;
use App\Http\Controllers\PropertyVisitController;

Route::post('/maisons', [PropertyController::class, 'store']);
Route::post('/demande', [DemandeController::class, 'store']);
Route::post('/visit', [PropertyVisitController::class, 'store']);
Route::get('/visit', [PropertyVisitController::class, 'index']);
Route::get('/demande', [DemandeController::class, 'index']);
Route::get('/maisons/all', [PropertyController::class, 'index']);
Route::get('/maisons', [PropertyController::class, 'getAll']);
Route::get('/maisons/{id}', [PropertyController::class, 'show']);
Route::put('/maisons/{id}', [PropertyController::class, 'update']); //
Route::get('/maisons/destroy/{id}', [PropertyController::class, 'destroy']);
Route::post('/agents', [AgentController::class, 'store']);
Route::get('/agents/all', [AgentController::class, 'index']);
Route::get('/city', [CityController::class, 'index']);
Route::get('/country', [CountryController::class, 'index']);
Route::get('/publicite/destroy/{id}', [PropertyController::class, 'destroy']);
Route::get('/publicite', [PubliciteController::class, 'index']);
Route::post('/publicite', [PubliciteController::class, 'store']);
Route::get('/status/property', [StatusPropertyController::class, 'index']);
Route::get('/type/property', [TypePropertyController::class, 'index']);
Route::get('/caracteristique', [CaracteristiqueController::class, 'index']);
Route::get('/partenaire', [PartenaireController::class, 'index']);
Route::post('/partenaire', [PartenaireController::class, 'store']);
Route::get('/commune', [CommuneController::class, 'index']);
Route::middleware(['auth:sanctum'])->group(function () {
    // Route::resource('client', ClientController::class)->only(['index', 'store']);
});
