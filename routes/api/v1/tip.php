<?php

use App\Http\Controllers\Api\TipController;
use Illuminate\Support\Facades\Route;


Route::middleware('auth:sanctum')->group(function () {
    Route::group(['prefix' => 'tips'], function () {
        Route::get('/all', [TipController::class, 'viewAllTips'])->name('tips.all');
        Route::get('/latest', [TipController::class, 'getLatestTips'])->name('tips.latest');
        Route::get('/view/{id}', [TipController::class, 'viewTip'])->name('tip.view');
    });
});
