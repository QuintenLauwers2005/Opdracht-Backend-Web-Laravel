<?php

namespace Database\Seeders;

use App\Models\FaqCategory;
use App\Models\Faq;
use Illuminate\Database\Seeder;

class FaqSeeder extends Seeder
{
    public function run(): void
    {
       $cat1 = FaqCategory::create(['name' => 'Algemeen', 'order' => 1]);

       Faq::create([
           'faq_category_id' => $cat1->id,
           'question' => 'Wat zijn jullie openingsuren?',
           'answer' => 'We zijn geopend van dinsdag tot zaterdag van 10:00 tot 18:00 uur. Op zondag en maandag zijn we gesloten.',
           'order'=> 1,
       ]);

       Faq::create([
           'faq_category_id' => $cat1->id,
           'question' => 'Waar bevinden jullie zich?',
           'answer' => 'Juwelier Hendrickx is gevestigd in Vilvoorde op de Leuvensestraat 3, 1800 Vilvoorde.',
           'order'=>2,
       ]);

       $cat2 = FaqCategory::create(['name' => 'Producten', 'order' => 2]);

        Faq::create([
            'faq_category_id' => $cat2->id,
            'question' => 'Verkopen jullie alleen nieuwe juwelen?',
            'answer' => 'We specialiseren enkel in de verkoop van nieuwe juwelen en reparaties.',
            'order'=>1,
        ]);

        Faq::create([
            'faq_category_id' => $cat2->id,
            'question' => 'Leveren jullie ook maatwerk?',
            'answer' => 'Ja, we maken graag een uniek op maat voor u. Maak een afspraak voor een persoonlijk gesprek.',
            'order'=>2,
        ]);

        $cat3 = FaqCategory::create(['name'=> 'Bestellingen & Betalingen', 'order' => 3]);

        Faq::create([
            'faq_category_id' => $cat3->id,
            'question' => 'Welke betaalmethoden accepteren jullie?',
            'answer' => 'We accepteren cash, bankkaart, kredietkaart (Visa, Mastercard), paypal en bankoverschrijving.',
            'order'=>1,
        ]);

        Faq::create([
            'faq_category_id' => $cat3->id,
            'question' => 'Kan ik mijn bestelling retourneren?',
            'answer' => 'U heeft 14 dagen bedenktijd op alle aankopen. Het product moet nog in orginele staat zijn met de bijhorende ticketten of bonnen.',
            'order'=>2,
        ]);

    }
}
