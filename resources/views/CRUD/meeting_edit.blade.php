<x-app-layout>
    <x-slot name="header">
        <h2 class="text-xl font-semibold text-gray-800">
            Editar Trobada
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
                <form action="{{ route('meetings.update', $meeting->id) }}" method="POST" class="space-y-4">
                    @csrf
                    @method('PUT')

                    {{-- Excursió (Trek) --}}
                    <div>
                        <label class="block font-medium">Trek</label>
                        <select name="trek_id" class="w-full border-gray-300 rounded @error('trek_id') border-red-500 @enderror">
                            @foreach($treks as $trek)
                                <option value="{{ $trek->id }}" {{ old('trek_id', $meeting->trek_id) == $trek->id ? 'selected' : '' }}>
                                    {{ $trek->name }}
                                </option>
                            @endforeach
                        </select>
                    </div>

                    {{-- Guia Principal --}}
                    <div>
                        <label class="block font-medium">Guia Principal</label>
                        <select name="user_id" class="w-full border-gray-300 rounded @error('user_id') border-red-500 @enderror">
                            @foreach($users as $user)
                                <option value="{{ $user->id }}" {{ old('user_id', $meeting->user_id) == $user->id ? 'selected' : '' }}>
                                    {{ $user->name }}
                                </option>
                            @endforeach
                        </select>
                    </div>

                    {{-- Dia i Hora --}}
                    <div class="grid grid-cols-2 gap-4">
                        <div>
                            <label class="block font-medium">Dia</label>
                            <input type="date" name="day" value="{{ old('day', $meeting->day) }}" 
                                   class="w-full border-gray-300 rounded @error('day') border-red-500 @enderror">
                        </div>
                        <div>
                            <label class="block font-medium">Hora</label>
                            <input type="time" name="time" value="{{ old('time', $meeting->time) }}" 
                                   class="w-full border-gray-300 rounded @error('time') border-red-500 @enderror">
                        </div>
                    </div>

                    {{-- Dates d'Inscripció --}}
                    <div class="grid grid-cols-2 gap-4">
                        <div>
                            <label class="block font-medium">Inici Inscripció</label>
                            <input type="date" name="appDateIni" value="{{ old('appDateIni', $meeting->appDateIni) }}" 
                                   class="w-full border-gray-300 rounded @error('appDateIni') border-red-500 @enderror">
                        </div>
                        <div>
                            <label class="block font-medium">Fi Inscripció</label>
                            <input type="date" name="appDateEnd" value="{{ old('appDateEnd', $meeting->appDateEnd) }}" 
                                   class="w-full border-gray-300 rounded @error('appDateEnd') border-red-500 @enderror">
                        </div>
                    </div>

                    {{-- Botó Actualitzar --}}
                    <div class="pt-4">
                        <button type="submit"
                                class="px-4 py-2 bg-blue-600 text-white rounded hover:bg-blue-700 font-medium transition">
                            Actualitzar Trobada
                        </button>
                    </div>

                </form>
            </div>

        </div>
    </div>
</x-app-layout>