<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        // Admin user aanmaken (VERPLICHT volgens opdracht)
        User::create([
            'name' => 'Admin',
            'email' => 'admin@ehb.be',
            'password' => bcrypt('Password!321'),
            'is_admin' => true,
            'username' => 'admin',
            'about_me' => 'Beheerder van Juwelier Hendrickx',
        ]);

        // Andere seeders aanroepen
        $this->call([
            UserSeeder::class,
            JewelryCategorySeeder::class,
            JewelryProductSeeder::class,
            NewsSeeder::class,
            FaqSeeder::class,
        ]);
    }
}
