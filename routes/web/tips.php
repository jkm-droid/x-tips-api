<?php

use App\Http\Controllers\Web\ManageTipController;
use Illuminate\Support\Facades\Route;

Route::name('tip.')->group(function (){
    Route::get('all-tips', [ManageTipController::class, 'getAllTips'])->name('all');
    Route::get('tip/create-form', [ManageTipController::class, 'showTipCreationForm'])->name('show.create.form');
    Route::post('create-tip', [ManageTipController::class, 'createTip'])->name('add');
    Route::get('tip/edit/{tip_id}', [ManageTipController::class, 'showTipEditForm'])->name('show.edit.form');
    Route::put('edit-tip', [ManageTipController::class, 'editTip'])->name('update');
    Route::put('delete-tip/{tip_id}', [ManageTipController::class, 'deleteTip'])->name('delete');
});
