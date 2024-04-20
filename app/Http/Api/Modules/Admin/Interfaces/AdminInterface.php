<?php

namespace App\Http\Api\Modules\Admin\Interfaces;

use App\Http\Api\Modules\Admin\Models\Admin;

interface AdminInterface
{
    public function register($data): Admin|bool;

    public function login(array $data): Admin;

    public function logout(string $guard = null): bool;

}
