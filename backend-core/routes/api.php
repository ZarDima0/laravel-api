<?php

use App\Http\Controllers\Application\ApplicationController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::prefix('application')
    ->group(function () {
        Route::get('/', [ApplicationController::class, 'index']);
        Route::post('/', [ApplicationController::class, 'create']);
        Route::get('/{id}', [ApplicationController::class, 'show']);
        Route::put('/edit/{id}', [ApplicationController::class, 'update']);
        Route::delete('/delete/{id}', [ApplicationController::class, 'destroy']);
    });
