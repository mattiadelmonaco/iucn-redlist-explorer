<?php

use App\Http\Controllers\AssessmentController;
use App\Http\Controllers\CountryController;
use App\Http\Controllers\FavoriteController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\SystemController;
use App\Http\Controllers\TaxonController;
use Illuminate\Support\Facades\Route;

Route::get('/', [HomeController::class, 'index'])->name('home');

Route::get('/systems/{code}', [SystemController::class, 'show'])->name('systems.show');

Route::get('/countries/{code}', [CountryController::class, 'show'])->name('countries.show');

Route::get('/taxon/{sisId}', [TaxonController::class, 'show'])->name('taxon.show');

Route::post('/favorites', [FavoriteController::class, 'store'])->name('favorites.store');

Route::get('/favorites', [FavoriteController::class, 'index'])->name('favorites.index');

Route::get('/assessments/{assessmentId}', [AssessmentController::class, 'show'])->name('assessments.show');
