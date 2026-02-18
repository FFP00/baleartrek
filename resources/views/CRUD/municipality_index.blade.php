<x-app-layout>
    <x-slot name="header">
        <h2 class="text-xl font-semibold text-gray-800 leading-tight">Llistat de Municipis</h2>
    </x-slot>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            @if(session('success'))
                <div class="mb-4 p-3 bg-green-100 text-green-800 rounded">{{ session('success') }}</div>
            @endif
            @error('constraint')
                <div class="mb-4 p-4 bg-red-100 text-red-700 rounded border-l-4 border-red-500">{{ $message }}</div>
            @enderror

            <div class="flex flex-col">
                @foreach ($municipalities as $muni)
                    <div class="bg-white p-8 shadow-sm rounded-lg border border-gray-100">
                        <h1 class="text-xl"><strong>{{ $muni->name }}</strong></h1><br>
                        <div class="space-y-1 text-gray-700">
                            <p><strong>Illa:</strong> {{ $muni->island->name }}</p>
                            <p><strong>Zona:</strong> {{ $muni->zone->name }}</p>
                            <p><span class="font-medium text-gray-600">created at:</span> {{ $muni->created_at }}</p>
                            <p><span class="font-medium text-gray-600">updated at:</span> {{ $muni->updated_at }}</p>
                        </div>
                        <br>
                        <div class="flex justify-between items-center text-sm font-medium">
                            <div class="flex gap-2">
                                <a href="{{ route('municipality.show', $muni->id) }}" class="px-6 py-1.5 bg-emerald-500 text-white rounded">Show</a>
                                <a href="{{ route('municipality.edit', $muni->id) }}" class="px-6 py-1.5 bg-blue-500 text-white rounded">Edit</a>
                            </div>
                            <form action="{{ route('municipality.destroy', $muni->id) }}" method="POST" onsubmit="return confirm('Segur?')">
                                @csrf @method('DELETE')
                                <button type="submit" class="px-6 py-1.5 bg-red-500 text-white rounded">Delete</button>
                            </form>
                        </div>
                    </div>
                @endforeach
            </div>
            <div class="mt-8">{{ $municipalities->links() }}</div>
        </div>
    </div>
</x-app-layout>