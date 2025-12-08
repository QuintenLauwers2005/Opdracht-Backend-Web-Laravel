<!DOCTYPE html>
<html lang="nl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>@yield('title', 'Admin Panel') - Juwelier Hendrickx</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="bg-gray-100">
<div class="flex h-screen">

    <div class="w-64 bg-gray-800 text-white">
        <div class="p-4">
            <h2 class="text-2xl font-bold">Admin panel</h2>
        </div>
        <nav class="mt-4">
            <a href="{{ route('admin.dashboard') }}" class="block py-2 px-4 hover:bg-gray-700 {{ request()->routeIs('admin.dashboard') ? 'bg-gray-700' : '' }}">
                Dashboard
            </a>
            <a href="{{ route('admin.news.index') }}" class="block py-2 px-4 hover:bg-gray-700 {{ request()->routeIs('admin.news.*') ? 'bg-gray-700' : '' }}">
                Nieuws
            </a>
            <a href="{{ route('admin.jewelry.index') }}" class="block py-2 px-4 hover:bg-gray-700 {{ request()->routeIs('admin.jewelry.*') ? 'bg-gray-700' : '' }}">
                Producten
            </a>
            <a href="{{ route('admin.faq.index') }}" class="block py-2 px-4 hover:bg-gray-700 {{ request()->routeIs('admin.faq.*') ? 'bg-gray-700' : '' }}">
                FAQ
            </a>
            <a href="{{ route('admin.users.index') }}" class="block py-2 px-4 hover:bg-gray-700 {{ request()->routeIs('admin.users.*') ? 'bg-gray-700' : '' }}">
                Gebruikers
            </a>
            <a href="{{ route('admin.contact.index') }}" class="block py-2 px-4 hover:bg-gray-700 {{ request()->routeIs('admin.contact.*') ? 'bg-gray-700' : '' }}">
                Contact berichten
            </a>
            <div class="border-t border-gray-700 my-4"></div>
            <a href="{{ route('home') }}" class="block py-2 px-4 hover:bg-gray-700">
                Terug naar Website
            </a>
        </nav>
    </div>

    <div class="flex-1 overflow-y-auto">
        <header class="bg-white shadow">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-4 flex justify-between items-center">
                <h1 class="text-2xl font-bold text-gray-800">@yield('title', 'Admin Panel')</h1>
                <div class="flex items-center gap-4">
                    <span class="text-gray-600">{{ auth()->user()->name }}</span>
                    <form method="POST" action="{{ route('logout') }}" class="inline">
                        @csrf
                        <button type="submit" class="text-gray-600 hover:text-gray-800">Uitloggen</button>
                    </form>
                </div>
            </div>
        </header>

        @if(session('success'))
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 mt-4">
                <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded">
                    {{ session('success') }}
                </div>
            </div>
        @endif

        @if($errors->any())
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 mt-4">
                <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded">
                    <ul>
                        @foreach($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            </div>
        @endif

        <main class="py-6">
            @yield('content')
        </main>
    </div>
</div>
</body>
</html>
