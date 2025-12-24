@extends('layouts.app')

@section('title', 'Nieuws - Juwelier Hendrickx')

@section('content')
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <h1 class="text-4xl font-bold text-gray-800 mb-8">Nieuws</h1>

        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
            @foreach($newsItems as $news)
                <div class="bg-white rounded-lg shadow-md overflow-hidden hover:shadow-lg transition">
                    <div class="h-48 bg-gray-200 flex items-center justify-center">
                        <span class="text-5xl">📰</span>
                    </div>
                    <div class="p-6">
                        <div class="flex items-center text-sm text-gray-500 mb-2">
                            <span>{{ $news->publication_date->format('d/m/Y') }}</span>
                            <span class="mx-2">•</span>
                            <span>Door {{ $news->user->name }}</span>
                        </div>
                        <h2 class="font-bold text-xl mb-3">{{ $news->title }}</h2>
                        <p class="text-gray-600 mb-4">{{ Str::limit($news->content, 150) }}</p>
                        <a href="{{ route('news.show', $news) }}" class="text-indigo-600 hover:text-indigo-800 font-semibold">
                            Lees meer →
                        </a>
                    </div>
                </div>
            @endforeach
        </div>

        <div class="mt-8">
            {{ $newsItems->links() }}
        </div>
    </div>
@endsection
