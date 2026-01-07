<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        // Maak een nieuwe tabel 'news_items' aan
        Schema::create('news_items', function (Blueprint $table) {

            // ID kolom - uniek nummer per nieuwsbericht
            $table->id();

            // Titel - korte tekst (max 255 karakters)
            $table->string('title');         // ← MOET ERBIJ

            // Inhoud - lange tekst voor het artikel
            $table->text('content');

            // Afbeelding - pad naar de foto (bijv. 'images/nieuws.jpg')
            $table->string('image');

            // Publicatiedatum - wanneer het bericht gepubliceerd wordt
            $table->date('publication_date');

            // Koppeling naar de auteur (user) van het nieuwsbericht
            // Als de user verwijderd wordt, wordt dit bericht ook verwijderd
            $table->foreignId('user_id')->constrained()->onDelete('cascade');

            // Automatische tijdstempels: created_at en updated_at
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        // Verwijder de tabel weer
        Schema::dropIfExists('news_items');
    }
};
