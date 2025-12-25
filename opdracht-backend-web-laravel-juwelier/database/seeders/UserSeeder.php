<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    public function run(): void
    {
        User::create([
            'name' => 'Jan Janssens',
            'email' => 'jan@example.com',
            'password' => bcrypt('password'),
            'username' => 'janjanssens',
            'birthday' => '1990-05-15',
            'about_me' => 'Liefhebber van exclusieve sieraden en luxe horloges.',
        ]);

        User::create([
            'name' => 'Marie Peeters',
            'email' => 'marie@example.com',
            'password' => bcrypt('password'),
            'username' => 'mariepeeters',
            'birthday' => '1985-08-22',
            'about_me' => 'Verzamelaar van antieke ringen en vintage juwelen.',
        ]);

        User::create([
            'name' => 'Pieter De Vries',
            'email' => 'pieter@example.com',
            'password' => bcrypt('password'),
            'username' => 'pieterdevries',
            'birthday' => '1995-03-10',
            'about_me' => 'Specialist in diamanten en edelstenen.',
        ]);
    }
}
