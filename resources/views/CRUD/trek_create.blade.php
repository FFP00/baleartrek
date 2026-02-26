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

                    <div class="pt-4 border-t border-gray-100">
                        <label class="block font-medium mb-2">Llocs d'Interès (Ruta)</label>
                        
                        <div id="places-container" class="space-y-2">
                            </div>

                        <button type="button" id="add-place" class="mt-3 text-sm bg-gray-50 px-4 py-2 rounded border border-gray-200 hover:bg-gray-100 transition">
                            + Afegir lloc d'interès
                        </button>
                    </div>

                    <div class="pt-4 border-t border-gray-100">
                        <button type="submit" class="px-4 py-2 bg-blue-600 text-white rounded hover:bg-blue-700 font-medium transition">
                            Crear Excursió
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <template id="place-row-template">
        <div class="flex items-center gap-2 p-2 bg-gray-50 rounded border border-gray-100 place-row">
            <span class="font-bold text-gray-400 w-6 order-label">1.</span>
            <select name="places[]" class="flex-1 border-gray-300 rounded text-sm">
                <option value="">Selecciona un lloc...</option>
                @foreach($interestingPlaces as $place)
                    <option value="{{ $place->id }}">{{ $place->name }}</option>
                @endforeach
            </select>
            <button type="button" class="remove-place text-red-500 hover:text-red-700 px-2 font-bold text-xl">&times;</button>
        </div>
    </template>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const container = document.getElementById('places-container');
            const btnAdd = document.getElementById('add-place');
            const template = document.getElementById('place-row-template');

            function reorderLabels() {
                container.querySelectorAll('.place-row').forEach((row, index) => {
                    row.querySelector('.order-label').innerText = (index + 1) + '.';
                });
            }

            btnAdd.addEventListener('click', () => {
                const clone = template.content.cloneNode(true);
                container.appendChild(clone);
                reorderLabels();
            });

            container.addEventListener('click', (e) => {
                if (e.target.classList.contains('remove-place')) {
                    e.target.closest('.place-row').remove();
                    reorderLabels();
                }
            });
        });
    </script>
</x-app-layout>