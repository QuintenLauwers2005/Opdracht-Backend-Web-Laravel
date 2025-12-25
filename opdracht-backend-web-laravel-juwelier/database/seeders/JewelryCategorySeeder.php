<?php

namespace Database\Seeders;

use App\Models\JewelryCategory;
use Illuminate\Database\Seeder;

class JewelryCategorySeeder extends Seeder
{
    public function run(): void
    {
        JewelryCategory::create([
            'name' => 'Ringen',
            'description' => 'Exclusieve ringen in goud, zilver en platina met of zonder edelstenen.',
        ]);

        JewelryCategory::create([
            'name' => 'Kettingen',
            'description' => 'Elegante halskettingen en hangers voor elke gelegenheid.',
        ]);

        JewelryCategory::create([
            'name' => 'Oorbellen',
            'description' => 'Van subtiele oorknopjes tot glamoureuze hangers.',
        ]);

        JewelryCategory::create([
            'name' => 'Armbanden',
            'description' => 'Armbanden in diverse stijlen, van klassiek tot modern.',
        ]);

        JewelryCategory::create([
            'name' => 'Horloges',
            'description' => 'Luxe horloges van topmerken zoals Rolex, Omega en Cartier.',
        ]);
    }
}
