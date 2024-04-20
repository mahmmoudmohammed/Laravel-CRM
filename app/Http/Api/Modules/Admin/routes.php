<?php

use App\Http\Api\Modules\Admin\Controllers\AdminController;
use App\Http\Api\Modules\Admin\Controllers\AdminLoginController;
use Illuminate\Support\Facades\Route;


Route::name('admin.')->prefix('v1/admin')->group(function () {

    /********************* Authentication Routes *********************/
    Route::middleware('throttle:10,60')->group(function () {
        Route::post('/login', [AdminLoginController::class, 'login'])->name('login');
    });

    /********************* Admin Routes *********************/
    Route::middleware(['auth:admin'])->group(function () {
        Route::post('/', [AdminController::class, 'store']);
        Route::get('logout', [AdminLoginController::class, 'logout']);

    });
});
