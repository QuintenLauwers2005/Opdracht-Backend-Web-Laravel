@extends('layouts.admin')

@section('title', 'Nieuws Beheren')

@section('content')
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex justify-between items-center mb-6">
            <h1 class="text-3xl font-bold">Nieuwsberichten</h1>
            <a href="{{ route('admin.news.create') }}" class="bg-indigo-600 text-white px-4 py-2 rounded hover:bg-indigo-700">
                Nieuw Bericht
            </a>
        </div>

        <div class="bg-white rounded-lg shadow overflow-hidden">
            <table class="min-w-full divide-y divide-gray-200">
                <thead class="bg-gray-50">
                <tr>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Titel</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Auteur</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Publicatiedatum</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Acties</th>
                </tr>
                </thead>
                <tbody class="bg-white divide-y divide-gray-200">
                @forelse($newsItems as $news)
                    <tr>
                        <td class="px-6 py-4">
                            <div class="font-medium text-gray-900">{{ $news->title }}</div>
                            <div class="text-sm text-gray-500">{{ Str::limit($news->content, 50) }}</div>
                        </td>
                        <td class="px-6 py-4 text-sm text-gray-500">
                            {{ $news->user->name }}
                        </td>
                        <td class="px-6 py-4 text-sm text-gray-500">
                            {{ $news->publication_date->format('d/m/Y') }}
                        </td>
                        <td class="px-6 py-4 text-sm font-medium">
                            <a href="{{ route('news.show', $news) }}" class="text-blue-600 hover:text-blue-900 mr-3" target="_blank">Bekijk</a>
                            <a href="{{ route('admin.news.edit', $news) }}" class="text-indigo-600 hover:text-indigo-900 mr-3">Bewerk</a>
                            <form action="{{ route('admin.news.destroy', $news) }}" method="POST" class="inline">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="text-red-600 hover:text-red-900" onclick="return confirm('Weet je zeker dat je dit nieuwsbericht wilt verwijderen?')">
                                    Verwijder
                                </button>
                            </form>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="4" class="px-6 py-4 text-center text-gray-500">
                            Geen nieuwsberichten gevonden.
                        </td>
                    </tr>
                @endforelse
                </tbody>
            </table>
        </div>

        <div class="mt-4">
            {{ $newsItems->links() }}
        </div>
    </div>
@endsection
