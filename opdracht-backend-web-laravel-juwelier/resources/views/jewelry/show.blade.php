@extends('layouts.app')

@section('title', $product->name . ' - Juwelier Hendrickx')

@section('content')
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="grid grid-cols-1 md:grid-cols-2 gap-8 mb-12">
            <!-- Product Image -->
            <div class="bg-white rounded-lg shadow-md p-8">
                <div class="h-96 bg-gray-200 flex items-center justify-center rounded-lg overflow-hidden">
                    @if($product->image && file_exists(public_path('storage/' . $product->image)))
                        <img src="{{ asset('storage/' . $product->image) }}" alt="{{ $product->name }}" class="w-full h-full object-cover">
                    @else
                        <span class="text-9xl">💍</span>
                    @endif
                </div>
            </div>

            <!-- Product Details -->
            <div class="bg-white rounded-lg shadow-md p-8">
                <span class="text-sm text-gray-500 uppercase">{{ $product->category->name }}</span>
                <h1 class="text-3xl font-bold text-gray-800 mb-4">{{ $product->name }}</h1>
                <p class="text-indigo-600 font-bold text-4xl mb-6">€{{ number_format($product->price, 2, ',', '.') }}</p>

                <div class="mb-6">
                    <h3 class="font-semibold text-gray-800 mb-2">Beschrijving</h3>
                    <p class="text-gray-700 leading-relaxed">{{ $product->description }}</p>
                </div>

                <div class="mb-6">
                    <h3 class="font-semibold text-gray-800 mb-2">Voorraad</h3>
                    @if($product->stock > 0)
                        <span class="text-green-600 font-semibold">✓ Op voorraad ({{ $product->stock }} stuks)</span>
                    @else
                        <span class="text-red-600 font-semibold">✗ Uitverkocht</span>
                    @endif
                </div>

                <a href="{{ route('contact.create') }}" class="block w-full text-center bg-indigo-600 text-white py-3 rounded-lg font-semibold hover:bg-indigo-700">
                    Informeer naar dit product
                </a>
            </div>
        </div>

        <!-- Related Products -->
        @if($relatedProducts->count() > 0)
            <div>
                <h2 class="text-2xl font-bold text-gray-800 mb-6">Vergelijkbare Producten</h2>
                <div class="grid grid-cols-1 md:grid-cols-4 gap-6">
                    @foreach($relatedProducts as $related)
                        <div class="bg-white rounded-lg shadow-md overflow-hidden hover:shadow-lg transition">
                            <div class="h-40 bg-gray-200 flex items-center justify-center">
                                <span class="text-4xl">💍</span>
                            </div>
                            <div class="p-4">
                                <h3 class="font-bold mb-2">{{ $related->name }}</h3>
                                <p class="text-indigo-600 font-bold mb-2">€{{ number_format($related->price, 2, ',', '.') }}</p>
                                <a href="{{ route('jewelry.show', $related) }}" class="text-indigo-600 hover:text-indigo-800 text-sm font-semibold">
                                    Bekijk →
                                </a>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        @endif
    </div>
@endsection
