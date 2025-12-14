@extends('layouts.app')

@section('title', 'Veelgestelde Vragen - Juwelier Hendrickx')

@section('content')
    <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8">
        <h1 class="text-4xl font-bold text-gray-800 mb-8">Veelgestelde Vragen</h1>

        @foreach($categories as $category)
            <div class="mb-8">
                <h2 class="text-2xl font-bold text-gray-800 mb-4 pb-2 border-b-2 border-indigo-600">
                    {{ $category->name }}
                </h2>

                <div class="space-y-4">
                    @foreach($category->faqs as $faq)
                        <div class="bg-white rounded-lg shadow-md p-6">
                            <h3 class="font-bold text-lg text-gray-800 mb-2">
                                ❓ {{ $faq->question }}
                            </h3>
                            <p class="text-gray-600">
                                {{ $faq->answer }}
                            </p>
                        </div>
                    @endforeach
                </div>
            </div>
        @endforeach

        <div class="bg-indigo-50 rounded-lg p-6 mt-8">
            <h3 class="font-bold text-lg mb-2">Vraag niet gevonden?</h3>
            <p class="text-gray-600 mb-4">Neem gerust contact met ons op. We helpen u graag verder!</p>
            <a href="{{ route('contact.create') }}" class="inline-block bg-indigo-600 text-white px-6 py-2 rounded hover:bg-indigo-700">
                Contacteer Ons
            </a>
        </div>
    </div>
@endsection
