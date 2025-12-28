@extends('layouts.app')

@section('title', 'Home - Juwelier Hendrickx')

@section('content')
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <!-- Hero Section -->
        <div class="bg-gradient-to-r from-indigo-600 to-purple-600 rounded-lg shadow-xl p-12 text-white mb-12">
            <h1 class="text-4xl md:text-5xl font-bold mb-4">Welkom bij Juwelier Hendrickx</h1>
            <p class="text-xl mb-6">Exclusieve juwelen en tijdloze elegantie sinds 1973</p>
            <a href="{{ route('jewelry.index') }}" class="inline-block bg-white text-indigo-600 px-6 py-3 rounded-lg font-semibold hover:bg-gray-100">
                Bekijk Collectie
            </a>
        </div>

        <!-- Featured Products -->
        <div class="mb-12">
            <h2 class="text-3xl font-bold text-gray-800 mb-6">Uitgelichte Juwelen</h2>
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6">
                @foreach($featuredProducts as $product)
                    <div class="bg-white rounded-lg shadow-md overflow-hidden hover:shadow-lg transition">
                        <div class="h-48 bg-gray-200 flex items-center justify-center overflow-hidden">
                            @if($product->image && file_exists(public_path('storage/' . $product->image)))
                                <img src="{{ asset('storage/' . $product->image) }}" alt="{{ $product->name }}" class="w-full h-full object-cover">
                            @else
                                <span class="text-4xl">💍</span>
                            @endif
                        </div>
                        <div class="p-4">
                            <h3 class="font-bold text-lg mb-2">{{ $product->name }}</h3>
                            <p class="text-gray-600 text-sm mb-2">{{ $product->category->name }}</p>
                            <p class="text-indigo-600 font-bold text-xl">€{{ number_format($product->price, 2, ',', '.') }}</p>
                            <a href="{{ route('jewelry.show', $product) }}" class="mt-3 block text-center bg-indigo-600 text-white py-2 rounded hover:bg-indigo-700">
                                Bekijk Details
                            </a>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>

        <!-- Latest News -->
        <div>
            <h2 class="text-3xl font-bold text-gray-800 mb-6">Laatste Nieuws</h2>
            <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                @foreach($latestNews as $news)
                    <div class="bg-white rounded-lg shadow-md overflow-hidden hover:shadow-lg transition">
                        <div class="h-48 bg-gray-200 flex items-center justify-center overflow-hidden">
                            @if($news->image && file_exists(public_path('storage/' . $news->image)))
                                <img src="{{ asset('storage/' . $news->image) }}" alt="{{ $news->title }}" class="w-full h-full object-cover">
                            @else
                                <span class="text-4xl">📰</span>
                            @endif
                        </div>
                        <div class="p-4">
                            <p class="text-sm text-gray-500 mb-2">{{ $news->publication_date->format('d/m/Y') }}</p>
                            <h3 class="font-bold text-lg mb-2">{{ $news->title }}</h3>
                            <p class="text-gray-600 text-sm mb-3">{{ Str::limit($news->content, 100) }}</p>
                            <a href="{{ route('news.show', $news) }}" class="text-indigo-600 hover:text-indigo-800 font-semibold">
                                Lees meer →
                            </a>
                        </div>
                    </div>
                @endforeach
            </div>
            <div class="text-center mt-6">
                <a href="{{ route('news.index') }}" class="text-indigo-600 hover:text-indigo-800 font-semibold">
                    Bekijk al het nieuws →
                </a>
            </div>
        </div>
    </div>
@endsection
