<x-app-layout>
    <x-slot name="header">
        <h2 class="text-xl font-semibold text-gray-800">Detalles de la Trobada</h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white p-8 shadow-sm rounded-lg border border-gray-100">
                <h1 class="text-xl"><strong>Trobada: {{ $meeting->trek->name }}</strong></h1>
                <br>
                <div class="space-y-1 text-gray-700">
                    <p><strong>Guia: </strong>{{ $meeting->user->name }}</p>
                    <p><strong>Dia de l'excursió: </strong>{{ $meeting->day }}</p>
                    <p><strong>Hora: </strong>{{ $meeting->time }}</p>
                    <p><strong>Inici Inscripció: </strong>{{ $meeting->appDateIni }}</p>
                    <p><strong>Fi Inscripció: </strong>{{ $meeting->appDateEnd }}</p>
                    <p><strong>Puntuació acumulada: </strong>{{ $meeting->totalScore }} ({{ $meeting->countScore }} vots)</p>
                    <br>
                    <p><span class="font-medium text-gray-600">created at:</span> {{ $meeting->created_at }}</p>
                    <p><span class="font-medium text-gray-600">updated at:</span> {{ $meeting->updated_at }}</p>
                </div>
                <br>
                <div class="flex justify-between items-center text-sm font-medium border-t pt-4">
                    <div class="flex gap-2">
                        <a href="{{ route('meetings.index') }}" class="px-6 py-1.5 bg-emerald-500 text-white rounded">Tornar</a>
                        <a href="{{ route('meetings.edit', $meeting->id) }}" class="px-6 py-1.5 bg-blue-500 text-white rounded">Edit</a>
                    </div>
                    <form action="{{ route('meetings.destroy', $meeting->id) }}" method="POST">
                        @csrf @method('DELETE')
                        <button type="submit" class="px-6 py-1.5 bg-red-500 text-white rounded">Delete</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>