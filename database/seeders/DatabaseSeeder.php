<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\UserRequest::factory(10)->create();
        $this->call([
            CitySeeder::class,
            UserSeeder::class,
            PartnerTypeSeeder::class,
            TypicalFoodSeeder::class,
            CategorySeeder::class,
            ImageBannerSeeder::class,
        ]);
    }
}
