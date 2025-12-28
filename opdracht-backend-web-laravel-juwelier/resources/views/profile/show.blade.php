@extends('layouts.app')

@section('title', ($user->username ?? $user->name) . ' - Profiel')

@section('content')
    <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="bg-white rounded-lg shadow-md overflow-hidden">
            <div class="bg-gradient-to-r from-indigo-600 to-purple-600 h-32"></div>

            <div class="px-8 pb-8">
                <!-- Profile Photo -->
                <div class="relative -mt-16 mb-4">
                    <div class="w-32 h-32 rounded-full bg-white border-4 border-white shadow-lg flex items-center justify-center text-6xl">
                        @if($user->profile_photo)
                            <img src="{{ asset('storage/' . $user->profile_photo) }}" alt="{{ $user->name }}" class="w-full h-full rounded-full object-cover">
                        @else
                            👤
                        @endif
                    </div>
                </div>

                <!-- User Info -->
                <div class="mb-6">
                    <h1 class="text-3xl font-bold text-gray-800">{{ $user->username ?? $user->name }}</h1>
                    @if($user->username && $user->name !== $user->username)
                        <p class="text-gray-600">{{ $user->name }}</p>
                    @endif

                    @if($user->is_admin)
                        <span class="inline-block bg-red-100 text-red-800 text-xs font-semibold px-2.5 py-0.5 rounded mt-2">
                        ADMIN
                    </span>
                    @endif
                </div>

                <!-- Profile Details -->
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mb-6">
                    @if($user->birthday)
                        <div>
                            <h3 class="text-sm font-semibold text-gray-500 uppercase mb-1">Verjaardag</h3>
                            <p class="text-gray-800">🎂 {{ $user->birthday->format('d/m/Y') }}</p>
                        </div>
                    @endif

                    <div>
                        <h3 class="text-sm font-semibold text-gray-500 uppercase mb-1">Lid sinds</h3>
                        <p class="text-gray-800">📅 {{ $user->created_at->format('d/m/Y') }}</p>
                    </div>
                </div>

                <!-- About Me -->
                @if($user->about_me)
                    <div class="mb-6">
                        <h3 class="text-sm font-semibold text-gray-500 uppercase mb-2">Over mij</h3>
                        <div class="bg-gray-50 rounded-lg p-4">
                            <p class="text-gray-700">{{ $user->about_me }}</p>
                        </div>
                    </div>
                @endif

                <!-- Edit Button (alleen voor eigen profiel) -->
                @auth
                    @if(auth()->id() === $user->id)
                        <a href="{{ route('profile.edit') }}" class="inline-block bg-indigo-600 text-white px-6 py-2 rounded-lg hover:bg-indigo-700">
                            Profiel Bewerken
                        </a>
                    @endif
                @endauth
            </div>
        </div>
    </div>
@endsection
