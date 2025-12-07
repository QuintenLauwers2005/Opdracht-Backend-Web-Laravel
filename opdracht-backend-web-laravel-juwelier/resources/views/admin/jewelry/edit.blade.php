@extends('layouts.admin')

@section('title', 'Product Bewerken')

@section('content')
    <div class="max-w-3xl mx-auto px-4 sm:px-6 lg:px-8">
        <h1 class="text-3xl font-bold mb-6">Product Bewerken</h1>

        <div class="bg-white rounded-lg shadow p-6">
            <form action="{{ route('admin.jewelry.update', $jewelry) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')

                <div class="mb-4">
                    <label for="name" class="block text-gray-700 font-semibold mb-2">productnaam</label>
                    <input type="text" name="name" id="name" value="{{ old('name', $jewelry->name) }}" required class="w-full px-4 py-2 border rounded-lg focus:ring-2 focus:ring-indigo-500">
                </div>

                <div class="mb-4">
                    <label for="jewelry_category_id" class="block text-gray-700 font-semibold mb-2">categorie</label>
                    <select name="jewelry_category_id" id="jewelry_category_id" required class="w-full px-4 py-2 border rounded-lg focus:ring-2 focus:ring-indigo-500">
                        @foreach($categories as $category)
                            <option value="{{ $category->id }}" {{ old('jewelry_category_id', $jewelry->jewelry_category_id) == $category->id ? 'selected' : '' }}>
                                {{ $category->name }}
                            </option>
                        @endforeach
                    </select>
                </div>

                <div class="mb-4">
                    <label for="description" class="block text-gray-700 font-semibold mb-2">beschrijving</label>
                    <textarea name="description" id="description" rows="4" required class="w-full px-4 py-2 border rounded-lg focus:ring-2 focus:ring-indigo-500">{{ old('description', $jewelry->description) }}</textarea>
                </div>

                <div class="grid grid-cols-2 gap-4 mb-4">
                    <div>
                        <label for="price" class="block text-gray-700 font-semibold mb-2">prijs in euro</label>
                        <input type="number" name="price" id="price" value="{{ old('price', $jewelry->price) }}" step="0.01" min="0" required class="w-full px-4 py-2 border rounded-lg focus:ring-2 focus:ring-indigo-500">
                    </div>

                    <div>
                        <label for="stock" class="block text-gray-700 font-semibold mb-2">voorraad</label>
                        <input type="number" name="stock" id="stock" value="{{ old('stock', $jewelry->stock) }}" min="0" required class="w-full px-4 py-2 border rounded-lg focus:ring-2 focus:ring-indigo-500">
                    </div>
                </div>

                <div class="mb-6">
                    <label for="image" class="block text-gray-700 font-semibold mb-2">productafbeelding</label>
                    <input type="file" name="image" id="image" accept="image/*" class="w-full px-4 py-2 border rounded-lg focus:ring-2 focus:ring-indigo-500">
                    <p class="text-sm text-gray-500 mt-1">Laat dit leeg om de huidige afbeelding te behouden</p>
                </div>

                <div class="flex gap-4">
                    <button type="submit" class="bg-indigo-600 text-white px-6 py-2 rounded hover:bg-indigo-700">Bijwerken</button>
                    <a href="{{ route('admin.jewelry.index') }}" class="bg-gray-300 text-gray-700 px-6 py-2 rounded hover:bg-gray-400">Annuleren</a>
                </div>
            </form>
        </div>
    </div>
@endsection
