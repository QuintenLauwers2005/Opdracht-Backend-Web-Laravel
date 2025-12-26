@extends('layouts.admin')

@section('title', 'Nieuwe Gebruiker')

@section('content')
    <div class="max-w-3xl mx-auto px-4 sm:px-6 lg:px-8">
        <h1 class="text-3xl font-bold mb-6">Nieuwe Gebruiker Aanmaken</h1>

        <div class="bg-white rounded-lg shadow p-6">
            <form action="{{ route('admin.users.store') }}" method="POST">
                @csrf

                <div class="mb-4">
                    <label for="name" class="block text-gray-700 font-semibold mb-2">Naam *</label>
                    <input type="text" name="name" id="name" value="{{ old('name') }}" required class="w-full px-4 py-2 border rounded-lg focus:ring-2 focus:ring-indigo-500">
                </div>

                <div class="mb-4">
                    <label for="email" class="block text-gray-700 font-semibold mb-2">E-mail *</label>
                    <input type="email" name="email" id="email" value="{{ old('email') }}" required class="w-full px-4 py-2 border rounded-lg focus:ring-2 focus:ring-indigo-500">
                </div>

                <div class="mb-4">
                    <label for="password" class="block text-gray-700 font-semibold mb-2">Wachtwoord *</label>
                    <input type="password" name="password" id="password" required class="w-full px-4 py-2 border rounded-lg focus:ring-2 focus:ring-indigo-500">
                    <p class="text-sm text-gray-500 mt-1">Minimaal 8 karakters</p>
                </div>

                <div class="mb-4">
                    <label for="password_confirmation" class="block text-gray-700 font-semibold mb-2">Bevestig Wachtwoord *</label>
                    <input type="password" name="password_confirmation" id="password_confirmation" required class="w-full px-4 py-2 border rounded-lg focus:ring-2 focus:ring-indigo-500">
                </div>

                <div class="mb-6">
                    <label class="flex items-center">
                        <input type="checkbox" name="is_admin" value="1" {{ old('is_admin') ? 'checked' : '' }} class="rounded border-gray-300 text-indigo-600 focus:ring-indigo-500">
                        <span class="ml-2 text-gray-700">Maak deze gebruiker admin</span>
                    </label>
                </div>

                <div class="flex gap-4">
                    <button type="submit" class="bg-indigo-600 text-white px-6 py-2 rounded hover:bg-indigo-700">Aanmaken</button>
                    <a href="{{ route('admin.users.index') }}" class="bg-gray-300 text-gray-700 px-6 py-2 rounded hover:bg-gray-400">Annuleren</a>
                </div>
            </form>
        </div>
    </div>
@endsection
