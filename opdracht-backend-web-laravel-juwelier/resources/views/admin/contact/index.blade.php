@extends('layouts.admin')

@section('title', 'Contact Berichten')

@section('content')
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <h1 class="text-3xl font-bold mb-6">Contact Berichten</h1>

        <div class="bg-white rounded-lg shadow overflow-hidden">
            <table class="min-w-full divide-y divide-gray-200">
                <thead class="bg-gray-50">
                <tr>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Status</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Zender</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Onderwerp</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Datum</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Acties</th>

                </tr>
                </thead>
                <tbody class="bg-white divide-y divide-gray-200">
                @forelse($messages as $message)
                    <tr class="{{ $message->is_read ? '' : 'bg-blue-50' }}">
                        <td class="px-6 py-4">
                            @if($message->is_read)
                                <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-gray-100 text-gray-800">
                                    gelezen
                                </span>

                            @else
                                <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-blue-100 text-blue-800">
                                    nieuw
                                </span>
                            @endif
                        </td>
                        <td class="px-6 py-4">
                            <div class="text-sm font-medium text-gray-900">{{ $message->name }}</div>
                            <div class="text-sm text-gray-500">{{ $message->email }}</div>
                        </td>

                        <td class="px-6 py-4">
                            <div class="text-sm text-gray-900">{{ $message->subject }}</div>
                            <div class="text-sm text-gray-500">{{ Str::limit($message->message, 50) }}</div>

                        </td>
                        <td class="px-6 py-4 text-sm text-gray-500">
                            {{ $message->created_at->format('d/m/Y H:i') }}
                        </td>
                        <td class="px-6 py-4 text-sm font-medium">
                            <a href="{{ route('admin.contact.show', $message) }}" class="text-indigo-600 hover:text-indigo-900 mr-3">Bekijken</a>
                            <form action="{{ route('admin.contact.destroy', $message) }}" method="POST" class="inline">
                                @csrf
                                @method('DELETE')

                                <button type="submit" class="text-red-600 hover:text-red-900" onclick="return confirm('Ben je zeker dat je dit bericht wilt verwijderen?')">
                                    verwijder
                                </button>

                            </form>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="5" class="px-6 py-4 text-center text-gray-500">
                            Geen nieuwe berichten ontvangen
                        </td>
                    </tr>
                @endforelse

                </tbody>
            </table>
        </div>

        <div class="mt-4">
            {{ $messages->links() }}
        </div>
    </div>
@endsection
