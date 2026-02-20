<?php

use App\Http\Controllers\AssessmentController;
use App\Http\Controllers\CountryController;
use App\Http\Controllers\FavoriteController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\SystemController;
use App\Http\Controllers\TaxonController;
use Illuminate\Support\Facades\Route;

Route::get('/', [HomeController::class, 'index']);

Route::get('/systems/{code}', [SystemController::class, 'show']);

Route::get('/countries/{code}', [CountryController::class, 'show']);

Route::get('/taxon/{sisId}', [TaxonController::class, 'show']);

Route::post('/favorites', [FavoriteController::class, 'store']);

Route::get('/favorites', [FavoriteController::class, 'index']);

Route::get('/assessments/{assessmentId}', [AssessmentController::class, 'show']);
