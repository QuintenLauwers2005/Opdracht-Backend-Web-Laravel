<?php

namespace Database\Seeders;

use App\Models\JewelryProduct;
use Illuminate\Database\Seeder;

class JewelryProductSeeder extends Seeder
{
    public function run(): void
    {
        // Ringen
        JewelryProduct::create([
            'name' => 'Diamanten Verlovingsring',
            'description' => 'Prachtige 18k witgouden ring met centrale diamant van 1 karaat.',
            'price' => 3499.99,
            'image' => 'products/ring-diamant.jpg',
            'stock' => 3,
            'jewelry_category_id' => 1,
        ]);

        JewelryProduct::create([
            'name' => 'Gouden Trouwring',
            'description' => 'Klassieke 14k geelgouden trouwring met matte afwerking.',
            'price' => 599.99,
            'image' => 'products/ring-goud.jpg',
            'stock' => 10,
            'jewelry_category_id' => 1,
        ]);

        // Kettingen
        JewelryProduct::create([
            'name' => 'Parel Halsketting',
            'description' => 'Elegante ketting met echte zoetwaterparels.',
            'price' => 899.99,
            'image' => 'products/ketting-parel.jpg',
            'stock' => 5,
            'jewelry_category_id' => 2,
        ]);

        JewelryProduct::create([
            'name' => 'Zilveren Hanger',
            'description' => 'Moderne zilveren hanger met saffier.',
            'price' => 299.99,
            'image' => 'products/hanger-zilver.jpg',
            'stock' => 8,
            'jewelry_category_id' => 2,
        ]);

        // Oorbellen
        JewelryProduct::create([
            'name' => 'Smaragd Oorhangers',
            'description' => 'Luxe gouden oorhangers met natuurlijke smaragden.',
            'price' => 1899.99,
            'image' => 'products/oorbellen-smaragd.jpg',
            'stock' => 2,
            'jewelry_category_id' => 3,
        ]);

        // Armbanden
        JewelryProduct::create([
            'name' => 'Tennis Armband',
            'description' => 'Witgouden tennisarmband bezet met briljanten.',
            'price' => 2499.99,
            'image' => 'products/armband-tennis.jpg',
            'stock' => 4,
            'jewelry_category_id' => 4,
        ]);

        // Horloges
        JewelryProduct::create([
            'name' => 'Rolex Submariner',
            'description' => 'Iconisch duikhorloge in roestvrij staal.',
            'price' => 8999.99,
            'image' => 'products/horloge-rolex.jpg',
            'stock' => 1,
            'jewelry_category_id' => 5,
        ]);
    }
}
