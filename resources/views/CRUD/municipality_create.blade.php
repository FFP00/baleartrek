<x-app-layout>
    <x-slot name="header"><h2 class="text-xl font-semibold text-gray-800">Crear Municipi</h2></x-slot>
    <div class="py-6">
        <div class="max-w-3xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white shadow-sm sm:rounded-lg p-6">
                <form action="{{ route('municipality.store') }}" method="POST" class="space-y-4">
                    @csrf
                    <div>
                        <label class="block font-medium">Nom del Municipi</label>
                        <input type="text" name="name" value="{{ old('name') }}" class="w-full border-gray-300 rounded">
                    </div>
                    <div>
                        <label class="block font-medium">Illa</label>
                        <select name="island_id" class="w-full border-gray-300 rounded">
                            @foreach($islands as $island)
                                <option value="{{ $island->id }}">{{ $island->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div>
                        <label class="block font-medium">Zona</label>
                        <select name="zone_id" class="w-full border-gray-300 rounded">
                            @foreach($zones as $zone)
                                <option value="{{ $zone->id }}">{{ $zone->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <button type="submit" class="px-4 py-2 bg-blue-600 text-white rounded">Crear</button>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>