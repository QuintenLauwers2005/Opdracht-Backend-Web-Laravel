@extends('layouts.app')

@section('title', 'Profiel Bewerken - Juwelier Lauwers')

@section('content')
    <div class="max-w-3xl mx-auto px-4 sm:px-6 lg:px-8">
        <h1 class="text-4xl font-bold text-gray-800 mb-8">Profiel Bewerken</h1>

        <div class="bg-white rounded-lg shadow-md p-8 mb-6">
            <h2 class="text-2xl font-bold mb-4">Persoonlijke Informatie</h2>

            <form action="{{ route('profile.update') }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')

                <div class="mb-6">
                    <label for="username" class="block text-gray-700 font-semibold mb-2">Gebruikersnaam</label>
                    <input type="text" name="username" id="username" value="{{ old('username', $user->username) }}"
                           class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-indigo-500 focus:border-transparent">
                    <p class="text-gray-500 text-sm mt-1">Dit is de naam die anderen op je profiel zien</p>
                </div>

                <div class="mb-6">
                    <label for="birthday" class="block text-gray-700 font-semibold mb-2">Verjaardag</label>
                    <input type="date" name="birthday" id="birthday" value="{{ old('birthday', $user->birthday?->format('Y-m-d')) }}"
                           class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-indigo-500 focus:border-transparent">
                </div>

                <div class="mb-6">
                    <label for="about_me" class="block text-gray-700 font-semibold mb-2">Over mij</label>
                    <textarea name="about_me" id="about_me" rows="4"
                              class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-indigo-500 focus:border-transparent">{{ old('about_me', $user->about_me) }}</textarea>
                    <p class="text-gray-500 text-sm mt-1">Maximaal 500 karakters</p>
                </div>

                <div class="mb-6">
                    <label for="profile_photo" class="block text-gray-700 font-semibold mb-2">Profielfoto</label>

                    @if($user->profile_photo)
                        <div class="mb-3">
                            <img src="{{ asset('storage/' . $user->profile_photo) }}" alt="Huidige profielfoto" class="w-32 h-32 rounded-full object-cover">
                            <p class="text-sm text-gray-500 mt-2">Huidige foto</p>
                        </div>
                    @endif

                    <input type="file" name="profile_photo" id="profile_photo" accept="image/*"
                           class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-indigo-500 focus:border-transparent">
                    <p class="text-gray-500 text-sm mt-1">JPG, PNG of GIF. Max 2MB</p>
                </div>

                <div class="flex gap-4">
                    <button type="submit" class="bg-indigo-600 text-white px-6 py-3 rounded-lg font-semibold hover:bg-indigo-700 transition">
                        Profiel Opslaan
                    </button>
                    <a href="{{ route('profile.show', $user) }}" class="bg-gray-300 text-gray-700 px-6 py-3 rounded-lg font-semibold hover:bg-gray-400 transition">
                        Annuleren
                    </a>
                </div>
            </form>
        </div>

        <!-- NIEUW: Wachtwoord wijzigen sectie -->
        <div class="bg-white rounded-lg shadow-md p-8">
            <h2 class="text-2xl font-bold mb-4">Wachtwoord Wijzigen</h2>

            <form action="{{ route('profile.update') }}" method="POST">
                @csrf
                @method('PUT')

                <div class="mb-6">
                    <label for="current_password" class="block text-gray-700 font-semibold mb-2">Huidig Wachtwoord *</label>
                    <input type="password" name="current_password" id="current_password"
                           class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-indigo-500 focus:border-transparent">
                    @error('current_password')
                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <div class="mb-6">
                    <label for="password" class="block text-gray-700 font-semibold mb-2">Nieuw Wachtwoord *</label>
                    <input type="password" name="password" id="password"
                           class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-indigo-500 focus:border-transparent">
                    <p class="text-gray-500 text-sm mt-1">Minimaal 8 karakters</p>
                    @error('password')
                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <div class="mb-6">
                    <label for="password_confirmation" class="block text-gray-700 font-semibold mb-2">Bevestig Nieuw Wachtwoord *</label>
                    <input type="password" name="password_confirmation" id="password_confirmation"
                           class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-indigo-500 focus:border-transparent">
                    @error('password_confirmation')
                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <button type="submit" class="bg-red-600 text-white px-6 py-3 rounded-lg font-semibold hover:bg-red-700 transition">
                    Wachtwoord Wijzigen
                </button>
            </form>
        </div>
    </div>
@endsection
