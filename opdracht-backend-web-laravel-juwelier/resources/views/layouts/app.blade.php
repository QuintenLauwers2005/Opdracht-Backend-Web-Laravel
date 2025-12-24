<!DOCTYPE html>
<html lang="nl">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <title>@yield('title','Juwelier Hendrickx')</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>
    <body class="bg-gray-50">
        <nav class="bg-white shadow-lg">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                <div class="flex justify-between h-16">
                   <div class="flex">
                       <div class="flex-shrink-0 flex items-center">
                           <a href="{{route('home')}}" class="text-2xl font-bold text-gray-800">
                               Juwelier Hendrickx
                           </a>
                       </div>
                       <div class="hidden sm:ml-6 sm:flex sm:space-x-8">
                           <a href="{{route('home')}}" class="border-transparent text-gray-500 hover:border-gray-300 hover:text-gray-700 inline-flex items-center px-1 pt-1 border-b-2 text-sm font-medium">
                               Home
                           </a>
                           <a href="{{route('jewelry.index')}}" class="border-transparent text-gray-500 hover:border-gray-300 hover:text-gray-700 inline-flex items-center px-1 pt-1 border-b-2 text-sm font-medium">
                               Juwelen
                           </a>
                           <a href="{{route('news.index')}}" class="border-transparent text-gray-500 hover:border-gray-300 hover:text-gray-700 inline-flex items-center px-1 pt-1 border-b-2 text-sm font-medium">
                               Nieuws
                           </a>
                           <a href="{{route('faq.index')}}" class="border-transparent text-gray-500 hover:border-gray-300 hover:text-gray-700 inline-flex items-center px-1 pt-1 border-b-2 text-sm font-medium">
                               FAQ
                           </a>
                           <a href="{{route('contact.create')}}" class="border-transparent text-gray-500 hover:border-gray-300 hover:text-gray-700 inline-flex items-center px-1 pt-1 border-b-2 text-sm font-medium">
                               Contact
                           </a>
                       </div>
                   </div>
                    <div class="hidden sm:ml-6 sm:flex sm:items-center">
                        @auth
                            @if(auth()->user()->is_admin)
                                <a href="{{route('admin.dashboard')}}" class="text-gray-700 hover:text-gray-900 px-3 py-2 text-sm font-medium">
                                    Admin Panel
                                </a>
                            @endif
                                <a href="{{route('profile.show', auth()->user())}}" class="text-gray-700 hover:text-gray-900 px-3 py-2 text-sm font-medium">
                                    {{ auth()->user()->name }}
                                </a>
                                <form method="POST" action="{{route('logout')}}" class="inline">
                                    @csrf
                                    <button type="submit" class="text-gray-700 hover:text-gray-900 px-3 py-2 text-sm font-medium">
                                        Uitloggen
                                    </button>
                                </form>
                        @else
                            <a href="{{route('login')}}" class="text-gray-700 hover:text-gray-900 px-3 py-2 text-sm font-medium">Inloggen</a>
                            <a href="{{route('register')}}" class="ml-4 px-4 py-2 border border-transparent text-sm font-medium rounded-md text-white bg-indigo-600 hover:bg-indigo-700">
                                Registreren
                            </a>
                        @endauth
                    </div>
                </div>
            </div>
        </nav>

    @if(session('success'))
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 mt-4">
            <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded">
                {{session('success')}}
            </div>
        </div>
    @endif

    @if($errors->any())
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 mt-4">
            <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded">
                <ul>
                    @foreach($errors->all() as $error)
                        <li>{{$error}}</li>
                    @endforeach
                </ul>
            </div>
        </div>
    @endif

    <main class="py-6">
        @yield('content')
    </main>

    <footer class="bg-gray-800 text-white mt-12">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-8">
            <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                <div>
                    <h3 class="text-lg font-bold mb-4">Juwelier Hendrickx</h3>
                    <p>Gespecialiseerd in goud & Diamant sinds 1973</p>
                </div>
                <div>
                    <h3 class="text-lg font-bold mb-4">Contact</h3>
                    <p>Leuvensestraat 3</p>
                    <p>1800 Vilvoorde</p>
                    <p>Tel: 02 252 50 35</p>
                </div>
                <div>
                    <h3 class="text-lg font-bold mb-4">Openingsuren</h3>
                    <p>Di - Za: 10:00 - 17:00</p>
                    <p>Wo : 10:00 - 15:00</p>
                    <p>Zo - Ma: Gesloten</p>
                </div>
            </div>
            <div class="border-t border-gray-700 mt-8 pt-8 text-center">
                <p>&copy; 2025 Juwelier Hendrickx. Alle rechten voorbehouden.</p>
            </div>

        </div>
    </footer>

    </body>
</html>
