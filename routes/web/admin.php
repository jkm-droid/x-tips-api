<?php

use App\Http\Controllers\NotificationController;
use App\Http\Controllers\Web\AdminAuthController;
use App\Http\Controllers\Web\DashboardController;
use Illuminate\Support\Facades\Route;

Route::name('admin.')->group(function () {
    Route::get('admin/login', [AdminAuthController::class, 'adminShowLoginPage'])->name('show.login');
    Route::post('login', [AdminAuthController::class, 'signInAdmin'])->name('login');
    Route::get('admin/register', [AdminAuthController::class, 'adminShowRegisterPage'])->name('show.register');
    Route::post('register', [AdminAuthController::class, 'createAdmin'])->name('register');

    Route::middleware(['auth:admin'])->group(function (){
        Route::get('logout', [AdminAuthController::class, 'signOutAdmin'])->name('logout');
    });

    //resetting password
    Route::get('admin/forgot_pass', [AdminAuthController::class, 'show_forgot_pass_form'])->name('show.forgot_pass_form');
    Route::post('forgot_pass', [AdminAuthController::class, 'submit_forgot_pass_form'])->name('forgot_submit');
    Route::get('admin/reset_pass/{token}', [AdminAuthController::class, 'show_reset_pass_form'])->name('show.reset_form');
    Route::post('reset_pass', [AdminAuthController::class, 'reset_pass'])->name('reset_pass');

    //email verification
    Route::get('account/verify/{token}', [AdminAuthController::class, 'verify__admin_email'])->name('verify.email');

});

Route::get('dashboard', [DashboardController::class, 'showDashboard'])->name('dashboard');

Route::get('all-notifications', [NotificationController::class, 'getNotifications'])->name('notifications');
Route::post('notification/delete/{id}', [NotificationController::class, 'deleteNotification'])->name('notification.delete');
Route::post('delete/all', [NotificationController::class, 'deleteAllNotifications'])->name('notifications.delete.all');
