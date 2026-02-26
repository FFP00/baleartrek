<x-app-layout>
    <x-slot name="header">
        <h2 class="text-xl font-semibold text-gray-800 leading-tight">
            Llistat de Llocs d'Interès
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            
            {{-- Mensaje de éxito --}}
            @if(session('success'))
                <div class="mb-4 p-3 bg-green-100 text-green-800 rounded shadow-sm">
                    {{ session('success') }}
                </div>
            @endif
            
            {{-- Errors --}}
            @if(session('error'))
                <div class="mb-4 p-3 bg-red-100 text-red-800 rounded shadow-sm">
                    {{ session('error') }}
                </div>
            @endif

            <div class="flex flex-col ">
                @foreach ($interestingPlaces as $place)
                    <div class="bg-white p-8 shadow-sm rounded-lg border border-gray-100">

                        <h1 class="text-xl">
                            <strong>{{ $place->name }}</strong>
                        </h1>
                        <br>

                        <div class="space-y-1 text-gray-700">
                            <p><strong>GPS: </strong>{{ $place->gps }}</p>
                            <p><strong>Tipus de Lloc:</strong> {{ $place->placeType->name }}</p>

                            <p><span class="font-medium text-gray-600">created at:</span> {{ $place->created_at }}</p>
                            <p><span class="font-medium text-gray-600">updated at:</span> {{ $place->updated_at }}</p>
                        </div>
                        
                        <br>
                        <div class="flex justify-between items-center text-sm font-medium">
                            <div class="flex gap-2">
                                <a href="{{ route('interesting_places.show', $place->id) }}" 
                                   class="px-6 py-1.5 bg-emerald-500 text-white rounded hover:bg-emerald-600 transition">
                                    Show
                                </a>
                                <a href="{{ route('interesting_places.edit', $place->id) }}" 
                                   class="px-6 py-1.5 bg-blue-500 text-white rounded hover:bg-blue-600 transition">
                                    Edit
                                </a>
                            </div>

                            <form action="{{ route('interesting_places.destroy', $place->id) }}" method="POST"
                                  onsubmit="return confirm('Seguro?')">
                                @csrf
                                @method('DELETE')
                                <button type="submit" 
                                        class="px-6 py-1.5 bg-red-500 text-white rounded hover:bg-red-600 transition">
                                    Delete
                                </button>
                            </form>
                        </div>
                    </div>
                @endforeach
            </div>

            {{-- Paginación --}}
            <div class="mt-8">
                {{ $interestingPlaces->links() }}
            </div>
        </div>
    </div>
</x-app-layout>