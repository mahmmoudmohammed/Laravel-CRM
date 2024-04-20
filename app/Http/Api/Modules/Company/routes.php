<?php

use App\Http\Api\Modules\Company\Controllers\CompanyController;
use Illuminate\Support\Facades\Route;

/********************* Company Routes *********************/
Route::name('company.')->prefix('v1/companies')->group(function () {
    Route::middleware(['auth:sanctum'])->group(function () {
        Route::get('/', [CompanyController::class, 'index']);
        Route::post('/', [CompanyController::class, 'store']);
        Route::get('/{model}', [CompanyController::class, 'show']);
        Route::patch('/{model}', [CompanyController::class, 'update']);
        Route::delete('/{model}', [CompanyController::class, 'destroy']);
    });
});

