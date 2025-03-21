<?php

namespace Database\Seeders;

use App\Models\Setting;
use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        /*User::factory()->create([
            'name' => 'Test User',
            'email' => 'test@example.com',
        ]);*/

        Setting::create([
            'name' => 'Prime Elite Property',
            'domain' => 'https://primeeliteproperty.com',
            'email' => 'contact@primeeliteproperty.com',
            'x_url' => 'https://x.com',
            'insta_url' => 'https://instagram.com',
        ]);
    }
}
