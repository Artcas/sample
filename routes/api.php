<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Api Routes
|--------------------------------------------------------------------------
|
| Here is where you can register Api routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your Api!
|
*/

Route::prefix('v1')->namespace('Api\V1')->group(function () {
    Route::prefix('column')->group(function() {
        Route::get('info', [\App\Http\Controllers\Api\V1\ColumnsController::class, 'indexAll']);
        Route::post('add', [\App\Http\Controllers\Api\V1\ColumnsController::class, 'addColumn']);
        Route::delete('remove/{column_id}', [\App\Http\Controllers\Api\V1\ColumnsController::class, 'removeColumn']);
    });

    Route::prefix('card')->group(function() {
        Route::delete('remove/{card_id}', [\App\Http\Controllers\Api\V1\CardController::class, 'remove']);
        Route::post('add', [\App\Http\Controllers\Api\V1\CardController::class, 'addCard']);
    });


    Route::post('export-database', [\App\Http\Controllers\Api\V1\ExportController::class, 'index']);
});
