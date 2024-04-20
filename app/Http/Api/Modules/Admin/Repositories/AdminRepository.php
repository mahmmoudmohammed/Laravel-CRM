<?php

namespace App\Http\Api\Modules\Admin\Repositories;

use App\Exceptions\CustomValidationException;
use App\Http\Api\Modules\Admin\Interfaces\AdminInterface;
use App\Http\Api\Modules\BaseRepository;
use App\Http\Api\Modules\Admin\Models\Admin;
use Illuminate\Support\Facades\Hash;

class AdminRepository extends BaseRepository implements AdminInterface
{
    protected function model(): string
    {
        return Admin::class;
    }

    public function register($data): Admin|bool
    {
        return $this->create([
            'first_name' => $data['first_name'],
            'last_name'  => $data['last_name'],
            'email' => $data['email'],
            'phone' => $data['phone'],
            'password' => Hash::make($data['password'])
        ]);
    }

    /**
     * @param array $data
     * @return Admin
     * @throws CustomValidationException
     */
    public function login(array $data): Admin
    {
        return parent::login($data);

    }

    /**
     * @throws CustomValidationException
     */
    public function logout(string $guard = null): bool
    {
        return parent::logout($guard);
    }
}
