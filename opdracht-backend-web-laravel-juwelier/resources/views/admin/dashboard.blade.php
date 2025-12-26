@extends('layouts.admin')

@section('title', 'Admin Dashboard')

@section('content')
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <h1 class="text-4xl font-bold text-gray-800 mb-8">Admin Dashboard</h1>

        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6 mb-8">
            <div class="bg-white rounded-lg shadow-md p-6">
                <div class="flex items-center">
                    <div class="text-4xl mr-4">👥</div>
                    <div>
                        <p class="text-gray-500 text-sm">Gebruikers</p>
                        <p class="text-2xl font-bold">{{ \App\Models\User::count() }}</p>
                    </div>
                </div>
            </div>

            <div class="bg-white rounded-lg shadow-md p-6">
                <div class="flex items-center">
                    <div class="text-4xl mr-4">📰</div>
                    <div>
                        <p class="text-gray-500 text-sm">Nieuwsberichten</p>
                        <p class="text-2xl font-bold">{{ \App\Models\NewsItem::count() }}</p>
                    </div>
                </div>
            </div>

            <div class="bg-white rounded-lg shadow-md p-6">
                <div class="flex items-center">
                    <div class="text-4xl mr-4">💍</div>
                    <div>
                        <p class="text-gray-500 text-sm">Producten</p>
                        <p class="text-2xl font-bold">{{ \App\Models\JewelryProduct::count() }}</p>
                    </div>
                </div>
            </div>

            <div class="bg-white rounded-lg shadow-md p-6">
                <div class="flex items-center">
                    <div class="text-4xl mr-4">📧</div>
                    <div>
                        <p class="text-gray-500 text-sm">Contact Berichten</p>
                        <p class="text-2xl font-bold">{{ \App\Models\ContactMessage::count() }}</p>
                    </div>
                </div>
            </div>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
            <div class="bg-white rounded-lg shadow-md p-6">
                <h2 class="text-xl font-bold mb-4">Snelle Links</h2>
                <div class="space-y-2">
                    <a href="{{ route('admin.news.index') }}" class="block text-indigo-600 hover:text-indigo-800">→ Nieuws Beheren</a>
                    <a href="{{ route('admin.jewelry.index') }}" class="block text-indigo-600 hover:text-indigo-800">→ Producten Beheren</a>
                    <a href="{{ route('admin.faq.index') }}" class="block text-indigo-600 hover:text-indigo-800">→ FAQ Beheren</a>
                    <a href="{{ route('admin.users.index') }}" class="block text-indigo-600 hover:text-indigo-800">→ Gebruikers Beheren</a>
                </div>
            </div>

            <div class="bg-white rounded-lg shadow-md p-6">
                <h2 class="text-xl font-bold mb-4">Recente Activiteit</h2>
                <p class="text-gray-600">Laatste nieuwsbericht: {{ \App\Models\NewsItem::latest()->first()?->created_at->diffForHumans() ?? 'Geen' }}</p>
                <p class="text-gray-600">Laatste comment: {{ \App\Models\Comment::latest()->first()?->created_at->diffForHumans() ?? 'Geen' }}</p>
            </div>
        </div>
    </div>
@endsection
