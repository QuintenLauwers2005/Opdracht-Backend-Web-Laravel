@extends('layouts.admin')

@section('title', 'FAQ Beheren')

@section('content')
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex justify-between items-center mb-6">
            <h1 class="text-3xl font-bold">FAQ beheren</h1>
            <a href="{{ route('admin.faq.create') }}" class="bg-indigo-600 text-white px-4 py-2 rounded hover:bg-indigo-700">
                Nieuwe vraag
            </a>
        </div>

        @foreach($categories as $category)
            <div class="bg-white rounded-lg shadow mb-6">
                <div class="bg-gray-50 px-6 py-4 border-b">
                    <h2 class="text-xl font-bold">{{ $category->name }}</h2>
                </div>
                <div class="p-6">
                    @forelse($category->faqs as $faq)
                        <div class="border-l-4 border-indigo-600 pl-4 mb-4 pb-4 border-b last:border-b-0">
                            <div class="flex justify-between items-start">
                                <div class="flex-1">
                                    <h3 class="font-semibold text-lg mb-2">{{ $faq->question }}</h3>
                                    <p class="text-gray-600">{{ $faq->answer }}</p>
                                    <p class="text-sm text-gray-400 mt-2">volgorde: {{ $faq->order }}</p>
                                </div>
                                <div class="flex gap-2 ml-4">
                                    <a href="{{ route('admin.faq.edit', $faq) }}" class="text-indigo-600 hover:text-indigo-900">bewerk</a>
                                    <form action="{{ route('admin.faq.destroy', $faq) }}" method="POST" class="inline">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="text-red-600 hover:text-red-900" onclick="return confirm('Weet je zeker dat je deze vraag wilt verwijderen?')">
                                            verwijder
                                        </button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    @empty
                        <p class="text-gray-500">Geen vragen voor deze categorie</p>
                    @endforelse
                </div>
            </div>
        @endforeach
    </div>
@endsection
