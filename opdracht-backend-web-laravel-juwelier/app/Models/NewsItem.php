<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class NewsItem extends Model
{
    // Maakt het mogelijk om factories te gebruiken voor test data
    use HasFactory;

    // Welke velden mogen massaal ingevuld worden (bijv. bij NewsItem::create([...]))
    // Beschermt tegen ongewenste velden die per ongeluk worden opgeslagen
    protected $fillable = [
        'title',           // Titel van het nieuwsbericht
        'content',         // Inhoud van het artikel
        'image',           // Pad naar de afbeelding
        'publication_date', // Datum van publicatie
        'user_id',         // ID van de auteur
    ];

    // Zet bepaalde velden automatisch om naar een specifiek type
    protected function casts(): array
    {
        return [
            // Zet 'publication_date' automatisch om naar een Carbon date object
            // Hierdoor kun je makkelijk met datums werken (bijv. $newsItem->publication_date->format('d-m-Y'))
            'publication_date' => 'date',
        ];
    }

    // Relatie: Een nieuwsbericht hoort bij één gebruiker (auteur)
    // Gebruik: $newsItem->user geeft je het User object van de auteur
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    // Relatie: Een nieuwsbericht kan meerdere reacties hebben
    // Gebruik: $newsItem->comments geeft je alle comments bij dit nieuwsbericht
    public function comments()
    {
        return $this->hasMany(Comment::class);
    }
}
