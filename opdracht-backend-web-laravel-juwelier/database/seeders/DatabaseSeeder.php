<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        User::create([
            'name' => 'Admin',
            'email' => 'test@example.com',
            'password' => bcrypt('Password!321'),
            'is_admin' => true,
            'username' => 'admin',
            'about_me' => 'Beheerder van Juwelier Hendrickx',
        ]);

        $this->call([
            UserSeeder::class,
            JewelryCategorySeeder::class,
            JewelryProductSeeder::class,
            NewsSeeder::class,
            FaqSeeder::class,
        ]);
    }
}
