<?php

namespace Database\Seeders;

use App\Models\NewsItem;
use Illuminate\Database\Seeder;

class NewsSeeder extends Seeder
{
    public function run(): void
    {
        NewsItem::create([
            'title' => 'Nieuwe Collectie Lente 2025',
            'content' => 'We zijn trots om onze nieuwe lente collectie te presenteren! Deze collectie bevat prachtige bloemenmotieven in goud en zilver, perfect voor het lenteseizoen. Kom langs in onze winkel om de volledige collectie te bekijken.',
            'image' => 'news/lente-collectie.jpg',
            'publication_date' => now()->subDays(5),
            'user_id' => 1, // Admin
        ]);

        NewsItem::create([
            'title' => 'Speciale Valentijnsactie',
            'content' => 'Tot eind februari krijgt u 15% korting op alle verlovingsringen en trouwringen. Verras uw geliefde met een uniek juweel van Juwelier Hendrickx.',
            'image' => 'news/valentijn.jpg',
            'publication_date' => now()->subDays(15),
            'user_id' => 1,
        ]);

        NewsItem::create([
            'title' => 'Diamanten Certificering Workshop',
            'content' => 'Op 20 maart organiseren we een gratis workshop over diamanten certificering. Leer alles over de 4 C\'s en hoe u een authentieke diamant herkent. Inschrijven via onze contactpagina.',
            'image' => 'news/workshop.jpg',
            'publication_date' => now()->subDays(25),
            'user_id' => 1,
        ]);
    }
}
