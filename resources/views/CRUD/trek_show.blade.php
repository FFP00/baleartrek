<x-app-layout>
    <x-slot name="header">
        <h2 class="text-xl font-semibold text-gray-800">
            Detalles de l'Excursió
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="flex flex-col">
                <div class="bg-white p-8 shadow-sm rounded-lg border border-gray-100">

                    <h1 class="text-xl">
                        <strong>{{ $trek->name }}</strong>
                    </h1>
                    <br>

                    <div class="space-y-1 text-gray-700">
                        <p><strong>Registre: </strong>{{ $trek->regNumber }}</p>
                        <p><strong>Municipi: </strong>{{ $trek->municipality->name }}</p>
                        <p><strong>Estat: </strong>{{ $trek->status == 'y' ? 'Activa' : 'Inactiva' }}</p>
                        <p><strong>Puntuació Mitjana: </strong>{{ $trek->totalScore }} ({{ $trek->countScore }} vots)</p>
                        
                        <br>
                        <p><strong>Llocs d'Interès Remarcables:</strong></p>
                        <ul class="list-disc ml-8 mt-2">
                            @forelse($trek->interestingPlaces->sortBy('pivot.order') as $place)
                                <li>
                                    <strong>Ordre {{ $place->pivot->order }}:</strong> {{ $place->name }} 
                                    <span class="text-sm text-gray-500">({{ $place->gps }})</span>
                                </li>
                            @empty
                                <li class="text-gray-500 italic">No hi ha llocs assignats a aquesta excursió.</li>
                            @endforelse
                        </ul>
                        
                        <br>
                        <p><span class="font-medium text-gray-600">created at:</span> {{ $trek->created_at }}</p>
                        <p><span class="font-medium text-gray-600">updated at:</span> {{ $trek->updated_at }}</p>
                    </div>

                    <br>
                    <div class="flex justify-between items-center text-sm font-medium border-t pt-4">
                        <div class="flex gap-2">
                            <a href="{{ route('treks.index') }}" 
                                class="px-6 py-1.5 bg-emerald-500 text-white rounded hover:bg-emerald-600 transition">
                                Tornar
                            </a>
                            <a href="{{ route('treks.edit', $trek->id) }}" 
                                class="px-6 py-1.5 bg-blue-500 text-white rounded hover:bg-blue-600 transition">
                                Edit
                            </a>
                        </div>

                        <form action="{{ route('treks.destroy', $trek->id) }}" method="POST"
                                onsubmit="return confirm('¿Seguro que quieres eliminar esta excursión?')">
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