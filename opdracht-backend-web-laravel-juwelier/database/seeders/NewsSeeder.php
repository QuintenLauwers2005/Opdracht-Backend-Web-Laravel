<?php

namespace Database\Seeders;

use App\Models\NewsItem;
use Illuminate\Database\Seeder;

class NewsSeeder extends Seeder
{
    // Deze methode wordt uitgevoerd wanneer je 'php artisan db:seed' runt
    // Doel: vul de database met voorbeelddata (test/dummy data)
    public function run(): void
    {
        // Maak nieuwsbericht 1 aan
        NewsItem::create([
            'title' => 'Nieuwe Collectie Lente 2025',
            'content' => 'We zijn trots om onze nieuwe lente collectie te presenteren! Deze collectie bevat prachtige bloemenmotieven in goud en zilver, perfect voor het lenteseizoen. Kom langs in onze winkel om de volledige collectie te bekijken.',
            'image' => 'news/lente-collectie.jpg',  // Let op: dit bestand moet wel echt bestaan!
            'publication_date' => now()->subDays(5),  // 5 dagen geleden
            'user_id' => 1,  // Geschreven door gebruiker met ID 1 (meestal de admin)
        ]);

        // Maak nieuwsbericht 2 aan
        NewsItem::create([
            'title' => 'Speciale Valentijnsactie',
            'content' => 'Tot eind februari krijgt u 15% korting op alle verlovingsringen en trouwringen. Verras uw geliefde met een uniek juweel van Juwelier Hendrickx.',
            'image' => 'news/valentijn.jpg',
            'publication_date' => now()->subDays(15),  // 15 dagen geleden
            'user_id' => 1,
        ]);

        // Maak nieuwsbericht 3 aan
        NewsItem::create([
            'title' => 'Diamanten Certificering Workshop',
            'content' => 'Op 20 maart organiseren we een gratis workshop over diamanten certificering. Leer alles over de 4 C\'s en hoe u een authentieke diamant herkent. Inschrijven via onze contactpagina.',
            'image' => 'news/workshop.jpg',
            'publication_date' => now()->subDays(25),  // 25 dagen geleden
            'user_id' => 1,
        ]);
    }
}
