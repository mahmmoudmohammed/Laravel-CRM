<?php

declare(strict_types=1);

namespace App\Http\Api\Modules\Employee;

use App\Http\Api\Modules\Employee\Interfaces\EmployeeInterface;
use App\Http\Api\Modules\Employee\Repositories\EmployeeRepository;
use Illuminate\Support\ServiceProvider;

class EmployeeServiceProvider extends ServiceProvider
{

    public function register()
    {
        //TODO::Module Binding
        $this->app->bind(EmployeeInterface::class, EmployeeRepository::class);
    }

    public function boot()
    {
        // TODO::boot any observers
    }
}
