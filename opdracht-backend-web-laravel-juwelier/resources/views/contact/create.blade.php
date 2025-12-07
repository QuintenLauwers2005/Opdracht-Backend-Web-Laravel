@extends('layouts.app')

@section('title', 'Contact - Juwelier Hendrickx')

@section('content')
    <div class="max-w-3xl mx-auto px-4 sm:px-6 lg:px-8">
        <h1 class="text-4xl font-bold text-gray-800 mb-8">Contacteer Ons</h1>

        <div class="bg-white rounded-lg shadow-md p-6 mb-8">
            <form action="{{ route('contact.store') }}" method="POST">
                @csrf

                <div class="mb-4">
                    <label for="name" class="block text-gray-700 font-semibold mb-2">naam</label>
                    <input type="text" name="name" id="name" value="{{ old('name') }}" required
                           class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-indigo-500 focus:border-transparent">
                </div>

                <div class="mb-4">
                    <label for="email" class="block text-gray-700 font-semibold mb-2">e-mail</label>
                    <input type="email" name="email" id="email" value="{{ old('email') }}" required
                           class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-indigo-500 focus:border-transparent">
                </div>

                <div class="mb-4">
                    <label for="subject" class="block text-gray-700 font-semibold mb-2">onderwerp</label>
                    <input type="text" name="subject" id="subject" value="{{ old('subject') }}" required
                           class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-indigo-500 focus:border-transparent">
                </div>

                <div class="mb-4">
                    <label for="message" class="block text-gray-700 font-semibold mb-2">bericht</label>
                    <textarea name="message" id="message" rows="6" required
                              class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-indigo-500 focus:border-transparent">{{ old('message') }}</textarea>
                </div>

                <button type="submit" class="w-full bg-indigo-600 text-white py-3 rounded-lg font-semibold hover:bg-indigo-700 transition">
                    Verstuur bericht
                </button>
            </form>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
            <div class="bg-white rounded-lg shadow-md p-6">
                <h3 class="font-bold text-lg mb-4">Adres</h3>
                <p>Leuvensestraat 3</p>
                <p>1800 Vilvoorde</p>
            </div>
            <div class="bg-white rounded-lg shadow-md p-6">
                <h3 class="font-bold text-lg mb-4">Contact</h3>
                <p>Tel: 02 251 50 35</p>
                <p>Email: info@juwelierhendrickx.be</p>
            </div>
        </div>
    </div>
@endsection
