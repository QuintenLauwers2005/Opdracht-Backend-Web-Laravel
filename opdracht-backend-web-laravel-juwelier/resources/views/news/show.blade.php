{{-- Dit view-bestand toont de detailpagina van één nieuwsbericht --}}

{{-- Gebruik de basis layout 'app' --}}
@extends('layouts.app')

{{-- Stel de paginatitel in (verschijnt in browsertab) --}}
@section('title', $newsItem->title . ' - Juwelier Hendrickx')

{{-- Hier begint de hoofdinhoud van de pagina --}}
@section('content')
    {{-- Container met responsive padding --}}
    <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8">

        {{-- SECTIE 1: NIEUWSBERICHT --}}
        <div class="bg-white rounded-lg shadow-md overflow-hidden mb-8">

            {{-- Afbeeldingsectie --}}
            <div class="h-64 bg-gray-200 flex items-center justify-center overflow-hidden">
                {{-- Controleer of er een afbeelding bestaat EN of het bestand echt op de server staat --}}
                @if($newsItem->image && file_exists(public_path('storage/' . $newsItem->image)))
                    {{-- Toon de afbeelding --}}
                    <img src="{{ asset('storage/' . $newsItem->image) }}" alt="{{ $newsItem->title }}" class="w-full h-full object-cover">
                @else
                    {{-- Geen afbeelding? Toon een emoji als placeholder --}}
                    <span class="text-6xl">📰</span>
                @endif
            </div>

            {{-- Tekstinhoud van het nieuwsbericht --}}
            <div class="p-8">
                {{-- Metadata: datum en auteur --}}
                <div class="flex items-center text-sm text-gray-500 mb-4">
                    {{-- Datum in Nederlands formaat (dd/mm/yyyy) --}}
                    <span>{{ $newsItem->publication_date->format('d/m/Y') }}</span>
                    <span class="mx-2">•</span>
                    {{-- Naam van de auteur (via relatie met User model) --}}
                    <span>Door {{ $newsItem->user->name }}</span>
                </div>

                {{-- Titel van het nieuwsbericht --}}
                <h1 class="text-3xl font-bold text-gray-800 mb-4">{{ $newsItem->title }}</h1>

                {{-- Inhoud van het nieuwsbericht (whitespace-pre-line behoudt enters) --}}
                <div class="text-gray-700 leading-relaxed whitespace-pre-line">
                    {{ $newsItem->content }}
                </div>
            </div>
        </div>

        {{-- SECTIE 2: REACTIES --}}
        <div class="bg-white rounded-lg shadow-md p-8">
            {{-- Titel met aantal reacties --}}
            <h2 class="text-2xl font-bold text-gray-800 mb-6">
                Reacties ({{ $newsItem->comments->count() }})
            </h2>

            {{-- Toon dit ALLEEN als de gebruiker is ingelogd --}}
            @auth
                {{-- Formulier om een nieuwe reactie te plaatsen --}}
                <form action="{{ route('comments.store', $newsItem) }}" method="POST" class="mb-8">
                    {{-- CSRF token voor beveiliging (Laravel vereist dit bij POST requests) --}}
                    @csrf

                    <div class="mb-4">
                        <label for="content" class="block text-gray-700 font-semibold mb-2">Plaats een reactie</label>
                        {{-- Tekstveld voor de reactie (old('content') behoudt input bij validatie errors) --}}
                        <textarea name="content" id="content" rows="4" required
                                  class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-indigo-500">{{ old('content') }}</textarea>
                    </div>

                    {{-- Verstuurknop --}}
                    <button type="submit" class="bg-indigo-600 text-white px-6 py-2 rounded-lg hover:bg-indigo-700">
                        Plaats een reactie
                    </button>
                </form>

                {{-- Toon dit als de gebruiker NIET is ingelogd --}}
            @else
                <div class="bg-gray-100 p-4 rounded-lg mb-8">
                    <p class="text-gray-600">
                        {{-- Link naar de login pagina --}}
                        <a href="{{ route('login') }}" class="text-indigo-600 hover:text-indigo-800 font-semibold">Log in</a>
                        om een reactie te plaatsen.
                    </p>
                </div>
            @endauth

            {{-- Lijst van alle reacties --}}
            <div class="space-y-4">
                {{-- Loop door alle reacties (via relatie in NewsItem model) --}}
                @forelse($newsItem->comments as $comment)
                    <div class="border-l-4 border-indigo-600 bg-gray-50 p-4 rounded">
                        {{-- Auteur en tijdstip van de reactie --}}
                        <div class="flex items-center mb-2">
                            <span class="font-semibold text-gray-800">{{ $comment->user->name }}</span>
                            <span class="text-gray-500 text-sm ml-2">{{ $comment->created_at->format('d/m/Y H:i') }}</span>
                        </div>
                        {{-- Inhoud van de reactie --}}
                        <p class="text-gray-700">{{ $comment->content }}</p>
                    </div>

                    {{-- @empty wordt uitgevoerd als er GEEN reacties zijn --}}
                @empty
                    <p class="text-gray-500 text-center py-4">Nog geen reacties. Wees de eerste!</p>
                @endforelse
            </div>
        </div>
    </div>
@endsection
