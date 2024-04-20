<?php

namespace Database\Seeders;

use Database\Factories\AdminFactory;
use Illuminate\Database\Seeder;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        AdminFactory::new()->count(5)->create();
    }
}
