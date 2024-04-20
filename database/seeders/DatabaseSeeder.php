<?php

namespace Database\Seeders;

use App\Http\Api\Modules\Admin\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call([
            AdminSeeder::class,
            CompanySeeder::class,
        ]);
    }
}
