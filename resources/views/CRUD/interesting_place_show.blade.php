<x-app-layout>
    <x-slot name="header">
        <h2 class="text-xl font-semibold text-gray-800">
            Detalles del Lloc
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="flex flex-col">
                <div class="bg-white p-8 shadow-sm rounded-lg border border-gray-100">

                    <h1 class="text-xl">
                            <strong>{{ $interestingPlace->name }}</strong>
                        </h1>
                        <br>

                        <div class="space-y-1 text-gray-700">
                            <p><strong>GPS: </strong>{{ $interestingPlace->gps }}</p>
                            <p><strong>Tipus de Lloc:</strong> {{ $interestingPlace->placeType->name }}</p>

                        <p><span class="font-medium text-gray-600">created at:</span> {{ $interestingPlace->created_at }}</p>
                        <p><span class="font-medium text-gray-600">updated at:</span> {{ $interestingPlace->updated_at }}</p>
                    </div>

                    <br>
                    <div class="flex justify-between items-center text-sm font-medium">
                        <div class="flex gap-2">
                            <a href="{{ route('interesting_places.index') }}" 
                                class="px-6 py-1.5 bg-emerald-500 text-white rounded hover:bg-emerald-600 transition">
                                Tornar
                            </a>
                            <a href="{{ route('interesting_places.edit', $interestingPlace->id) }}" 
                                class="px-6 py-1.5 bg-blue-500 text-white rounded hover:bg-blue-600 transition">
                                Edit
                            </a>
                        </div>

                        <form action="{{ route('interesting_places.destroy', $interestingPlace->id) }}" method="POST"
                                onsubmit="return confirm('¿Seguro que quieres eliminar este lugar?')">
                            @csrf
                            @method('DELETE')
                            <button type="submit" 
                                    class="px-6 py-1.5 bg-red-500 text-white rounded hover:bg-red-600 transition">
                                Delete
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>