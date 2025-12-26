@extends('layouts.admin')

@section('title', 'Nieuwe FAQ Vraag')

@section('content')
    <div class="max-w-3xl mx-auto px-4 sm:px-6 lg:px-8">
        <h1 class="text-3xl font-bold mb-6">Nieuwe FAQ Vraag</h1>

        <div class="bg-white rounded-lg shadow p-6">
            <form action="{{ route('admin.faq.store') }}" method="POST">
                @csrf

                <div class="mb-4">
                    <label for="faq_category_id" class="block text-gray-700 font-semibold mb-2">Categorie *</label>
                    <select name="faq_category_id" id="faq_category_id" required class="w-full px-4 py-2 border rounded-lg focus:ring-2 focus:ring-indigo-500">
                        <option value="">Selecteer categorie</option>
                        @foreach($categories as $category)
                            <option value="{{ $category->id }}" {{ old('faq_category_id') == $category->id ? 'selected' : '' }}>
                                {{ $category->name }}
                            </option>
                        @endforeach
                    </select>
                </div>

                <div class="mb-4">
                    <label for="question" class="block text-gray-700 font-semibold mb-2">Vraag *</label>
                    <input type="text" name="question" id="question" value="{{ old('question') }}" required class="w-full px-4 py-2 border rounded-lg focus:ring-2 focus:ring-indigo-500">
                </div>

                <div class="mb-4">
                    <label for="answer" class="block text-gray-700 font-semibold mb-2">Antwoord *</label>
                    <textarea name="answer" id="answer" rows="6" required class="w-full px-4 py-2 border rounded-lg focus:ring-2 focus:ring-indigo-500">{{ old('answer') }}</textarea>
                </div>

                <div class="mb-4">
                    <label for="order" class="block text-gray-700 font-semibold mb-2">Volgorde</label>
                    <input type="number" name="order" id="order" value="{{ old('order', 0) }}" min="0" class="w-full px-4 py-2 border rounded-lg focus:ring-2 focus:ring-indigo-500">
                    <p class="text-sm text-gray-500 mt-1">Lagere nummers verschijnen eerst</p>
                </div>

                <div class="flex gap-4">
                    <button type="submit" class="bg-indigo-600 text-white px-6 py-2 rounded hover:bg-indigo-700">Opslaan</button>
                    <a href="{{ route('admin.faq.index') }}" class="bg-gray-300 text-gray-700 px-6 py-2 rounded hover:bg-gray-400">Annuleren</a>
                </div>
            </form>
        </div>
    </div>
@endsection
