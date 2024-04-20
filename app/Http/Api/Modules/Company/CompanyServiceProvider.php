<?php

declare(strict_types=1);

namespace App\Http\Api\Modules\Company;

use App\Http\Api\Modules\Company\Interfaces\CompanyInterface;
use App\Http\Api\Modules\Company\Repositories\CompanyRepository;
use Illuminate\Support\ServiceProvider;

class CompanyServiceProvider extends ServiceProvider
{

    public function register()
    {
        //TODO::Module Binding
        $this->app->bind(CompanyInterface::class, CompanyRepository::class);
    }

    public function boot()
    {
        // TODO::boot any observers
    }
}
