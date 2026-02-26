<x-app-layout>
    <x-slot name="header"><h2 class="text-xl font-semibold text-gray-800">Detalls Municipi</h2></x-slot>
    <div class="py-12"><div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            @if(session('error'))
                <div class="mb-4 p-3 bg-red-100 text-red-800 rounded shadow-sm">
                    {{ session('error') }}
                </div>
            @endif
        <div class="bg-white p-8 shadow-sm rounded-lg border border-gray-100">
            <h1 class="text-xl"><strong>{{ $municipality->name }}</strong></h1><br>
            <div class="space-y-1 text-gray-700">
                <p><strong>Illa:</strong> {{ $municipality->island->name }}</p>
                <p><strong>Zona:</strong> {{ $municipality->zone->name }}</p>
                <p><span class="font-medium text-gray-600">created at:</span> {{ $municipality->created_at }}</p>
                <p><span class="font-medium text-gray-600">updated at:</span> {{ $municipality->updated_at }}</p>
            </div>
            <br>
            <div class="flex justify-between items-center text-sm font-medium">
                <div class="flex gap-2">
                    <a href="{{ route('municipality.show', $municipality->id) }}" class="px-6 py-1.5 bg-emerald-500 text-white rounded">Show</a>
                    <a href="{{ route('municipality.edit', $municipality->id) }}" class="px-6 py-1.5 bg-blue-500 text-white rounded">Edit</a>
                </div>
                <form action="{{ route('municipality.destroy', $municipality->id) }}" method="POST" onsubmit="return confirm('Seguro?')">
                    @csrf @method('DELETE')
                    <button type="submit" class="px-6 py-1.5 bg-red-500 text-white rounded">Delete</button>
                </form>
            </div>
        </div>
    </div></div>
</x-app-layout>