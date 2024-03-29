<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call(CountriesTableSeeder::class);

         \App\Models\User::factory(200)->create();
//         \App\Models\User::factory()->create([
//             'name' => 'Test User',
//             'email' => 'test@example.com',
//             'password' => bcrypt('1234567'),
//             'birth_date' => '2000-01-01',
//             'bio' => 'mohamed adel bio',
//             'username' => 'karezma',
//             'lat' =>1225.2,
//             'lng' =>1255.2,
//         ]);
    }
}
