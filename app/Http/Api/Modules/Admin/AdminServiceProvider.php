<?php

declare(strict_types=1);

namespace App\Http\Api\Modules\Admin;

use App\Http\Api\Modules\Admin\Interfaces\AdminInterface;
use App\Http\Api\Modules\Admin\Repositories\AdminRepository;
use Illuminate\Support\ServiceProvider;

class AdminServiceProvider extends ServiceProvider
{

    public function register()
    {
        //TODO::bind interface repositories
        $this->app->bind(AdminInterface::class, AdminRepository::class);
    }

    public function boot()
    {
        // TODO::boot any observers
    }
}
