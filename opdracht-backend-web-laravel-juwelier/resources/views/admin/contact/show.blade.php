@extends('layouts.admin')

@section('title', 'Contact Bericht')

@section('content')
    <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex justify-between items-center mb-6">
            <h1 class="text-3xl font-bold">Contact bericht</h1>
            <a href="{{ route('admin.contact.index') }}" class="text-indigo-600 hover:text-indigo-800">Terug naar overzicht</a>
        </div>

        <div class="bg-white rounded-lg shadow p-8">
            <div class="border-b pb-4 mb-4">
                <div class="grid grid-cols-2 gap-4 mb-4">

                    <div>
                        <p class="text-sm text-gray-500">van</p>
                        <p class="font-semibold">{{ $message->name }}</p>
                    </div>

                    <div>
                        <p class="text-sm text-gray-500">e-mail</p>
                        <p class="font-semibold">
                            <a href="mailto:{{ $message->email }}" class="text-indigo-600 hover:text-indigo-800">
                                {{ $message->email }}
                            </a>
                        </p>
                    </div>
                </div>

                <div class="mb-4">
                    <p class="text-sm text-gray-500">onderwerp</p>
                    <p class="font-semibold text-lg">{{ $message->subject }}</p>
                </div>

                <div>
                    <p class="text-sm text-gray-500">ontvangen op</p>
                    <p>{{ $message->created_at->format('d/m/Y \o\m H:i') }}</p>
                </div>

            </div>

            <div class="mb-6">
                <p class="text-sm text-gray-500 mb-2">bericht</p>
                <div class="bg-gray-50 p-4 rounded-lg">
                    <p class="whitespace-pre-line">{{ $message->message }}</p>
                </div>
            </div>

            <div class="flex gap-4">
                <a href="mailto:{{ $message->email }}?subject=RE: {{ $message->subject }}" class="bg-indigo-600 text-white px-6 py-2 rounded hover:bg-indigo-700">
                   Beantwoorden via mail
                </a>

                <form action="{{ route('admin.contact.destroy', $message) }}" method="POST" class="inline">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="bg-red-600 text-white px-6 py-2 rounded hover:bg-red-700" onclick="return confirm('Ben je zeker dat je dit bericht wilt verwijderen?')">
                        Verwijder bericht
                    </button>

                </form>
            </div>
        </div>
    </div>
@endsection
