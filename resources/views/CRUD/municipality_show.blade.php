<x-app-layout>
    <x-slot name="header"><h2 class="text-xl font-semibold text-gray-800">Detalls Municipi</h2></x-slot>
    <div class="py-12"><div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class="bg-white p-8 shadow-sm rounded-lg border border-gray-100">
            <h1 class="text-xl"><strong>{{ $municipality->name }}</strong></h1><br>
            <div class="space-y-1 text-gray-700">
                <p><strong>Illa:</strong> {{ $municipality->island->name }}</p>
                <p><strong>Zona:</strong> {{ $municipality->zone->name }}</p>
                <p><span class="font-medium text-gray-600">created at:</span> {{ $municipality->created_at }}</p>
                <p><span class="font-medium text-gray-600">updated at:</span> {{ $municipality->updated_at }}</p>
            </div>
            <br>
            <div class="flex gap-2">
                <a href="{{ route('municipality.show', $municipality->id) }}" class="px-6 py-1.5 bg-emerald-500 text-white rounded">Show</a>
                <a href="{{ route('municipality.edit', $municipality->id) }}" class="px-6 py-1.5 bg-blue-500 text-white rounded">Edit</a>
            </div>
        </div>
    </div></div>
</x-app-layout>