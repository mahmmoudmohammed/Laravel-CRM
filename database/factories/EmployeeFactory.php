<?php

namespace Database\Factories;

use App\Http\Api\Modules\Company\Models\Company;
use App\Http\Api\Modules\Employee\Models\Employee;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\Hash;

class EmployeeFactory extends Factory
{

    protected $model = Employee::class;
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */

    public function definition(): array
    {

        return [
            'first_name' => $this->faker->firstName(),
            'last_name'  => $this->faker->lastName(),
            'email'      => $this->faker->safeEmail(),
            'phone'      => $this->faker->phoneNumber(),
            'is_intern'  => $this->faker->boolean(),
            'password'   => Hash::make('Password@123'),
            'started_at' => now()->subDays(5),
            'created_at' => now(),
            'updated_at' => now()
        ];
    }

}
