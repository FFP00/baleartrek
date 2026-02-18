<x-app-layout>
    <x-slot name="header">
        <h2 class="text-xl font-semibold text-gray-800 leading-tight">
            Llistat d'Excursions
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            
            @if(session('success'))
                <div class="mb-4 p-3 bg-green-100 text-green-800 rounded shadow-sm">
                    {{ session('success') }}
                </div>
            @endif

            @error('constraint')
                <div class="mb-4 p-4 bg-red-100 text-red-700 rounded border-l-4 border-red-500">
                    {{ $message }}
                </div>
            @enderror

            <div class="flex flex-col gap-4">
                @foreach ($treks as $trek)
                    <div class="bg-white p-8 shadow-sm rounded-lg border border-gray-100">

                        <h1 class="text-xl">
                            <strong>{{ $trek->name }}</strong>
                        </h1>
                        <br>

                        <div class="space-y-1 text-gray-700">
                            <p><strong>Registre: </strong>{{ $trek->regNumber }}</p>
                            <p><strong>Municipi: </strong>{{ $trek->municipality->name }}</p>
                            <p><strong>Estat: </strong>{{ $trek->status == 'y' ? 'Activa' : 'Inactiva' }}</p>
                            
                            <p><span class="font-medium text-gray-600">created at:</span> {{ $trek->created_at }}</p>
                            <p><span class="font-medium text-gray-600">updated at:</span> {{ $trek->updated_at }}</p>
                        </div>
                        
                        <br>
                        <div class="flex justify-between items-center text-sm font-medium">
                            <div class="flex gap-2">
                                <a href="{{ route('treks.show', $trek->id) }}" 
                                   class="px-6 py-1.5 bg-emerald-500 text-white rounded hover:bg-emerald-600 transition">
                                    Show
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
                @endforeach
            </div>

            <div class="mt-8">
                {{ $treks->links() }}
            </div>
        </div>
    </div>
</x-app-layout>