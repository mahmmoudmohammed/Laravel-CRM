<?php

namespace Database\Seeders;

use App\Http\Api\Modules\Employee\Models\Employee;
use Database\Factories\CompanyFactory;
use Illuminate\Database\Seeder;

class CompanySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        CompanyFactory::new()
            ->count(5)
            ->hasEmployees(3)
            ->create();
    }
}
