<x-app-layout>
    <x-slot name="header">
        <h2 class="text-xl font-semibold text-gray-800">Editar Excursió</h2>
    </x-slot>

    <div class="py-6">
        <div class="max-w-3xl mx-auto sm:px-6 lg:px-8">
            
            {{-- Errores generales --}}
            @if ($errors->any())
                <div class="mb-4 p-3 bg-red-50 text-red-700 rounded border border-red-200">
                    <ul class="list-disc ml-5 text-sm">
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <div class="bg-white shadow-sm sm:rounded-lg p-6">
                <form action="{{ route('treks.update', $trek->id) }}" method="POST" class="space-y-4">
                    @csrf 
                    @method('PUT')

                    {{-- Campo Número de Registre --}}
                    <div>
                        <label class="block font-medium">Número de Registre</label>
                        <input type="text" name="regNumber" 
                               value="{{ old('regNumber', $trek->regNumber) }}" 
                               class="w-full rounded @error('regNumber') border-red-500 @else border-gray-300 @enderror">
                        @error('regNumber')
                            <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    {{-- Campo Nom --}}
                    <div>
                        <label class="block font-medium">Nom</label>
                        <input type="text" name="name" 
                               value="{{ old('name', $trek->name) }}" 
                               class="w-full rounded @error('name') border-red-500 @else border-gray-300 @enderror">
                        @error('name')
                            <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    {{-- Campo Estat --}}
                    <div>
                        <label class="block font-medium">Estat</label>
                        <select name="status" class="w-full rounded @error('status') border-red-500 @else border-gray-300 @enderror">
                            <option value="y" {{ old('status', $trek->status) == 'y' ? 'selected' : '' }}>Activa</option>
                            <option value="n" {{ old('status', $trek->status) == 'n' ? 'selected' : '' }}>Inactiva</option>
                        </select>
                        @error('status')
                            <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    {{-- Campo Municipi --}}
                    <div>
                        <label class="block font-medium">Municipi</label>
                        <select name="municipality_id" class="w-full rounded @error('municipality_id') border-red-500 @else border-gray-300 @enderror">
                            @foreach($municipalities as $municipality)
                                <option value="{{ $municipality->id }}" 
                                    {{ old('municipality_id', $trek->municipality_id) == $municipality->id ? 'selected' : '' }}>
                                    {{ $municipality->name }}
                                </option>
                            @endforeach
                        </select>
                        @error('municipality_id')
                            <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="pt-2">
                        <button type="submit" class="px-6 py-2 bg-blue-600 text-white rounded hover:bg-blue-700 transition font-bold">
                            Actualitzar
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>