<?php

use App\Http\Controllers\CountryController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\SystemController;
use Illuminate\Support\Facades\Route;

Route::get('/', [HomeController::class, 'index']);

Route::get('/systems/{code}', [SystemController::class, 'show']);

Route::get('/countries/{code}', [CountryController::class, 'show']);
