<x-app-layout>
    <x-slot name="header">
        <h2 class="text-xl font-semibold text-gray-800">Crear Excursió</h2>
    </x-slot>

    <div class="py-6">
        <div class="max-w-3xl mx-auto sm:px-6 lg:px-8">

            @if ($errors->any())
                <div class="mb-4 p-4 bg-red-100 text-red-700 rounded">
                    <ul class="list-disc ms-5">
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <div class="bg-white shadow-sm sm:rounded-lg p-6">
                <form action="{{ route('treks.store') }}" method="POST" class="space-y-4">
                    @csrf

                    <div>
                        <label class="block font-medium">Número de Registre</label>
                        <input type="text" name="regNumber" value="{{ old('regNumber') }}" 
                               class="w-full border-gray-300 rounded @error('regNumber') border-red-500 @enderror">
                    </div>

                    <div>
                        <label class="block font-medium">Nom</label>
                        <input type="text" name="name" value="{{ old('name') }}"
                               class="w-full border-gray-300 rounded @error('name') border-red-500 @enderror">
                    </div>

                    <div>
                        <label class="block font-medium">Municipi</label>
                        <select name="municipality_id" class="w-full border-gray-300 rounded">
                            @foreach($municipalities as $municipality)
                                <option value="{{ $municipality->id }}" {{ old('municipality_id') == $municipality->id ? 'selected' : '' }}>
                                    {{ $municipality->name }}
                                </option>
                            @endforeach
                        </select>
                    </div>

                    <div>
                        <label class="block font-medium">Estat</label>
                        <select name="status" class="w-full border-gray-300 rounded">
                            <option value="y" {{ old('status') == 'y' ? 'selected' : '' }}>Activa</option>
                            <option value="n" {{ old('status') == 'n' ? 'selected' : '' }}>Inactiva</option>
                        </select>
                    </div>

                    <div class="pt-4">
                        <button type="submit" class="px-4 py-2 bg-blue-600 text-white rounded hover:bg-blue-700 font-medium transition">
                            Crear Excursió
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>