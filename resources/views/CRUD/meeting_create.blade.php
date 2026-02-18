<x-app-layout>
    <x-slot name="header">
        <h2 class="text-xl font-semibold text-gray-800">Crear Nova Trobada</h2>
    </x-slot>

    <div class="py-6">
        <div class="max-w-3xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white shadow-sm sm:rounded-lg p-6">
                <form action="{{ route('meetings.store') }}" method="POST" class="space-y-4">
                    @csrf
                    <div>
                        <label class="block font-medium">Excursió (Trek)</label>
                        <select name="trek_id" class="w-full border-gray-300 rounded">
                            @foreach($treks as $trek)
                                <option value="{{ $trek->id }}">{{ $trek->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div>
                        <label class="block font-medium">Guia Principal</label>
                        <select name="user_id" class="w-full border-gray-300 rounded">
                            @foreach($users as $user)
                                <option value="{{ $user->id }}">{{ $user->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="grid grid-cols-2 gap-4">
                        <div>
                            <label class="block font-medium">Dia</label>
                            <input type="date" name="day" class="w-full border-gray-300 rounded">
                        </div>
                        <div>
                            <label class="block font-medium">Hora</label>
                            <input type="time" name="time" class="w-full border-gray-300 rounded">
                        </div>
                    </div>
                    <div class="grid grid-cols-2 gap-4">
                        <div>
                            <label class="block font-medium">Inici Inscripció</label>
                            <input type="date" name="appDateIni" class="w-full border-gray-300 rounded">
                        </div>
                        <div>
                            <label class="block font-medium">Fi Inscripció</label>
                            <input type="date" name="appDateEnd" class="w-full border-gray-300 rounded">
                        </div>
                    </div>
                    <div class="pt-4">
                        <button type="submit" class="px-4 py-2 bg-blue-600 text-white rounded hover:bg-blue-700">Crear Trobada</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>