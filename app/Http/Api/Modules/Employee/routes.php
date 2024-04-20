<?php

use App\Http\Api\Modules\Employee\Controllers\EmployeeController;
use Illuminate\Support\Facades\Route;


/********************* Employee Routes *********************/
Route::name('employee.')->prefix('v1/employees')->group(function () {
    Route::middleware(['auth:admin'])->group(function () {
        Route::post('/', [EmployeeController::class, 'store']);
        Route::get('/{model}', [EmployeeController::class, 'show']);
        Route::patch('/{model}', [EmployeeController::class, 'update']);
        Route::get('/', [EmployeeController::class, 'index']);
        Route::delete('/{model}', [EmployeeController::class, 'destroy']);
    });
});
