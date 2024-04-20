<?php

namespace Database\Factories;

use App\Http\Api\Modules\Admin\Models\Admin;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\Hash;

class AdminFactory extends Factory
{
    /**
     * The current password being used by the factory.
     */
    protected static ?string $password;

    protected $model = Admin::class;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'first_name' => fake()->firstName(),
            'last_name'  => fake()->lastName(),
            'email'      => fake()->safeEmail(),
            'phone'      => fake()->phoneNumber(),
            'password'   => Hash::make('Password@123'),
            'created_at' => now(),
            'updated_at' => now()
        ];
    }

}
