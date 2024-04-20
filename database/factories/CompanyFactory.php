<?php

namespace Database\Factories;

use App\Http\Api\Modules\Company\Models\Company;
use Illuminate\Database\Eloquent\Factories\Factory;

class CompanyFactory extends Factory
{
    protected $model = Company::class;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name' => fake()->firstName(),
            'email' => fake()->safeEmail(),
            'URL' => fake()->url(),
            'created_at' => now(),
            'updated_at' => now()
        ];
    }

    /**
     * Configure the model factory.
     *
     * @return $this
     */
    public function configure()
    {
        return $this->afterCreating(function (Company $item) {
            $url = 'https://source.unsplash.com/random/1200x800';
            $item
                ->addMediaFromUrl($url)
                ->toMediaCollection('logos');
        });
    }

}
