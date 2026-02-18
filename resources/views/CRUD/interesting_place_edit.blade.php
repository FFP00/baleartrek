<x-app-layout>
    <x-slot name="header">
        <h2 class="text-xl font-semibold text-gray-800">
            Editar Lloc d'Interès
        </h2>
    </x-slot>

    <div class="py-6">
        <div class="max-w-3xl mx-auto sm:px-6 lg:px-8">

            {{-- Errors --}}
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
                <form action="{{ route('interesting_places.update', $interestingPlace->id) }}" method="POST" enctype="multipart/form-data" class="space-y-4">
                    @csrf
                    @method('PUT')

                    {{-- Nom --}}
                    <div>
                        <label class="block font-medium">Nom</label>
                        <input type="text" name="name" value="{{ old('name', $interestingPlace->name) }}" 
                                  class="w-full border-gray-300 rounded @error('name') border-red-500 @enderror">
                        @error('name')
                            <p class="text-red-600 text-sm">{{ $message }}</p>
                        @enderror
                    </div>

                    {{-- GPS --}}
                    <div>
                        <label class="block font-medium">GPS</label>
                        <input type="text" name="gps" value="{{ old('gps', $interestingPlace->gps) }}"
                               class="w-full border-gray-300 rounded @error('gps') border-red-500 @enderror">
                        @error('gps')
                            <p class="text-red-600 text-sm">{{ $message }}</p>
                        @enderror
                    </div>

                    {{-- Tipus de Lloc --}}
                    <div>
                        <label class="block font-medium">Tipus de Lloc</label>
                        <select name="place_type_id" class="w-full border-gray-300 rounded">
                            @foreach($placeTypes as $type)
                                <option value="{{ $type->id }}" {{ $interestingPlace->place_type_id == $type->id ? 'selected' : '' }}>{{ $type->name }}</option>
                            @endforeach
                        </select>
                    </div>

                    {{-- Botón --}}
                    <div class="pt-4">
                        <button type="submit"
                                class="px-4 py-2 bg-blue-600 text-white rounded hover:bg-blue-700">
                            Actualitzar
                        </button>
                    </div>

                </form>
            </div>

        </div>
    </div>
</x-app-layout>