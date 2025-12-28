@extends('layouts.app')

@section('title', $newsItem->title . ' - Juwelier Hendrickx')

@section('content')
    <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="bg-white rounded-lg shadow-md overflow-hidden mb-8">
            <div class="h-64 bg-gray-200 flex items-center justify-center overflow-hidden">
                @if($newsItem->image && file_exists(public_path('storage/' . $newsItem->image)))
                    <img src="{{ asset('storage/' . $newsItem->image) }}" alt="{{ $newsItem->title }}" class="w-full h-full object-cover">
                @else
                    <span class="text-6xl">📰</span>
                @endif
            </div>
            <div class="p-8">
                <div class="flex items-center text-sm text-gray-500 mb-4">
                    <span>{{ $newsItem->publication_date->format('d/m/Y') }}</span>
                    <span class="mx-2">•</span>
                    <span>Door {{ $newsItem->user->name }}</span>
                </div>

                <h1 class="text-3xl font-bold text-gray-800 mb-4">{{ $newsItem->title }}</h1>
                <div class="text-gray-700 leading-relaxed whitespace-pre-line">
                    {{ $newsItem->content }}
                </div>
            </div>
        </div>

        <div class="bg-white rounded-lg shadow-md p-8">
            <h2 class="text-2xl font-bold text-gray-800 mb-6">
                Reacties ({{ $newsItem->comments->count() }})
            </h2>

            @auth
                <form action="{{ route('comments.store', $newsItem) }}" method="POST" class="mb-8">
                    @csrf
                    <div class="mb-4">
                        <label for="content" class="block text-gray-700 font-semibold mb-2">Plaats een reactie</label>
                        <textarea name="content" id="content" rows="4" required
                                  class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-indigo-500">{{ old('content') }}</textarea>
                    </div>
                    <button type="submit" class="bg-indigo-600 text-white px-6 py-2 rounded-lg hover:bg-indigo-700">
                        Plaats een reactie
                    </button>

                </form>
            @else
                <div class="bg-gray-100 p-4 rounded-lg mb-8">
                    <p class="text-gray-600">
                        <a href="{{ route('login') }}" class="text-indigo-600 hover:text-indigo-800 font-semibold">Log in</a>
                        om een reactie te plaatsen.
                    </p>
                </div>

            @endauth

            <div class="space-y-4">
                @forelse($newsItem->comments as $comment)
                    <div class="border-l-4 border-indigo-600 bg-gray-50 p-4 rounded">
                        <div class="flex items-center mb-2">
                            <span class="font-semibold text-gray-800">{{ $comment->user->name }}</span>
                            <span class="text-gray-500 text-sm ml-2">{{ $comment->created_at->format('d/m/Y H:i') }}</span>
                        </div>
                        <p class="text-gray-700">{{ $comment->content }}</p>
                    </div>

                @empty
                    <p class="text-gray-500 text-center py-4">Nog geen reacties. Wees de eerste!</p>
                @endforelse
            </div>
        </div>
    </div>
@endsection
