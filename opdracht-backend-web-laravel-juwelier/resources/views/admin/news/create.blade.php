@extends('layouts.admin')

@section('title', 'Nieuw Nieuwsbericht')

@section('content')
    <div class="max-w-3xl mx-auto px-4 sm:px-6 lg:px-8">
        <h1 class="text-3xl font-bold mb-6">Nieuw Nieuwsbericht</h1>

        <div class="bg-white rounded-lg shadow p-6">
            <form action="{{ route('admin.news.store') }}" method="POST" enctype="multipart/form-data">
                @csrf

                <div class="mb-4">
                    <label for="title" class="block text-gray-700 font-semibold mb-2">titel </label>
                    <input type="text" name="title" id="title" value="{{ old('title') }}" required class="w-full px-4 py-2 border rounded-lg focus:ring-2 focus:ring-indigo-500">
                </div>

                <div class="mb-4">
                    <label for="content" class="block text-gray-700 font-semibold mb-2">inhoud</label>
                    <textarea name="content" id="content" rows="8" required class="w-full px-4 py-2 border rounded-lg focus:ring-2 focus:ring-indigo-500">{{ old('content') }}</textarea>
                </div>

                <div class="mb-4">
                    <label for="publication_date" class="block text-gray-700 font-semibold mb-2">publicatiedatum</label>
                    <input type="date" name="publication_date" id="publication_date" value="{{ old('publication_date', date('Y-m-d')) }}" required class="w-full px-4 py-2 border rounded-lg focus:ring-2 focus:ring-indigo-500">
                </div>

                <div class="mb-6">
                    <label for="image" class="block text-gray-700 font-semibold mb-2">afbeelding </label>
                    <input type="file" name="image" id="image" accept="image/*" required class="w-full px-4 py-2 border rounded-lg focus:ring-2 focus:ring-indigo-500">
                    <p class="text-sm text-gray-500 mt-1">indienen in: JPG, PNG of GIF. Maximum 2MB</p>
                </div>

                <div class="flex gap-4">
                    <button type="submit" class="bg-indigo-600 text-white px-6 py-2 rounded hover:bg-indigo-700">Publiceren</button>
                    <a href="{{ route('admin.news.index') }}" class="bg-gray-300 text-gray-700 px-6 py-2 rounded hover:bg-gray-400">Annuleren</a>
                </div>
            </form>
        </div>
    </div>
@endsection
