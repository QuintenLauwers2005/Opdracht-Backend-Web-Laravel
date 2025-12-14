@extends('layouts.app')

@section('title', 'Juwelen Collectie - Juwelier Hendrickx')

@section('content')
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <h1 class="text-4xl font-bold text-gray-800 mb-8">Onze Collectie</h1>

        <!-- Filter -->
        <div class="bg-white rounded-lg shadow-md p-6 mb-8">
            <form method="GET" action="{{ route('jewelry.index') }}">
                <div class="flex items-end gap-4">
                    <div class="flex-1">
                        <label for="category" class="block text-gray-700 font-semibold mb-2">Filter op categorie</label>
                        <select name="category" id="category" class="w-full px-4 py-2 border border-gray-300 rounded-lg">
                            <option value="">Alle categorieën</option>
                            @foreach($categories as $category)
                                <option value="{{ $category->id }}" {{ request('category') == $category->id ? 'selected' : '' }}>
                                    {{ $category->name }}
                                </option>
                            @endforeach
                        </select>
                    </div>
                    <button type="submit" class="bg-indigo-600 text-white px-6 py-2 rounded-lg hover:bg-indigo-700">
                        Filter
                    </button>
                </div>
            </form>
        </div>

        <!-- Products Grid -->
        <div class="grid grid-cols-1 md:grid-cols-3 lg:grid-cols-4 gap-6 mb-8">
            @forelse($products as $product)
                <div class="bg-white rounded-lg shadow-md overflow-hidden hover:shadow-lg transition">
                    <div class="h-48 bg-gray-200 flex items-center justify-center">
                        <span class="text-5xl">💍</span>
                    </div>
                    <div class="p-4">
                        <span class="text-xs text-gray-500 uppercase">{{ $product->category->name }}</span>
                        <h3 class="font-bold text-lg mb-2">{{ $product->name }}</h3>
                        <p class="text-gray-600 text-sm mb-3">{{ Str::limit($product->description, 80) }}</p>
                        <p class="text-indigo-600 font-bold text-xl mb-3">€{{ number_format($product->price, 2, ',', '.') }}</p>
                        <a href="{{ route('jewelry.show', $product) }}" class="block text-center bg-indigo-600 text-white py-2 rounded hover:bg-indigo-700">
                            Bekijk Details
                        </a>
                    </div>
                </div>
            @empty
                <div class="col-span-4 text-center py-12">
                    <p class="text-gray-500 text-lg">Geen producten gevonden in deze categorie.</p>
                </div>
            @endforelse
        </div>

        <div>
            {{ $products->links() }}
        </div>
    </div>
@endsection
