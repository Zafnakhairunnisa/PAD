<?php

use App\Http\Controllers\Frontend\HomeController;

/*
 * Frontend Controllers
 * All route names are prefixed with 'frontend.'.
 */
Route::get('/', [HomeController::class, 'index'])
    ->name('index'); // All route except prefix admin
