<x-app-layout>
    <x-slot name="header"><h2 class="text-xl font-semibold text-gray-800">Editar Excursió</h2></x-slot>
    <div class="py-6">
        <div class="max-w-3xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white shadow-sm sm:rounded-lg p-6">
                <form action="{{ route('treks.update', $trek->id) }}" method="POST" class="space-y-4">
                    @csrf @method('PUT')
                    <div>
                        <label class="block font-medium">Nom</label>
                        <input type="text" name="name" value="{{ old('name', $trek->name) }}" class="w-full border-gray-300 rounded">
                    </div>
                    <div>
                        <label class="block font-medium">Estat</label>
                        <select name="status" class="w-full border-gray-300 rounded">
                            <option value="y" {{ $trek->status == 'y' ? 'selected' : '' }}>Activa</option>
                            <option value="n" {{ $trek->status == 'n' ? 'selected' : '' }}>Inactiva</option>
                        </select>
                    </div>
                    <div>
                        <label class="block font-medium">Municipi</label>
                        <select name="municipality_id" class="w-full border-gray-300 rounded">
                            @foreach($municipalities as $municipality)
                                <option value="{{ $municipality->id }}" {{ $trek->municipality_id == $municipality->id ? 'selected' : '' }}>
                                    {{ $municipality->name }}
                                </option>
                            @endforeach
                        </select>
                    </div>
                    <button type="submit" class="px-4 py-2 bg-blue-600 text-white rounded">Actualitzar</button>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>