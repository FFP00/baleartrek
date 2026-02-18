<x-app-layout>
    <x-slot name="header">
        <h2 class="text-xl font-semibold text-gray-800 leading-tight">
            Listado de Usuarios
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            
            {{-- Mensaje de éxito --}}
            @if(session('success'))
                <div class="mb-4 p-3 bg-green-100 text-green-800 rounded shadow-sm">
                    {{ session('success') }}
                </div>
            @endif

            {{-- Buscador Simplificado --}}
            <div class="bg-white p-6 shadow-sm rounded-lg mb-6 border border-gray-100">
                <h3 class="font-bold mb-2 text-gray-700">Buscar usuarios</h3>
                <p class="text-xs text-gray-500 uppercase mb-2">Nombre, Apellidos, DNI o Email</p>
                
                <form action="{{ route('users.index') }}" method="GET">
                    <div class="relative">
                        <input type="text" 
                            name="search" 
                            value="{{ request('search') }}" 
                            placeholder="Buscar por nombre, DNI, correo..." 
                            class="w-full border-gray-200 rounded-lg text-sm focus:ring-blue-500 focus:border-blue-500 py-2.5">
                    </div>
                </form>

                <p class="mt-2 text-xs text-gray-400">
                    @if(request('search'))
                        Mostrando resultados para: "<strong>{{ request('search') }}</strong>"
                    @else
                        Mostrando todos los usuarios
                    @endif
                </p>
            </div>

            <div class="flex flex-col">
                @foreach ($users as $user)
                    {{-- Card Estilo Imagen --}}
                    <div class="bg-white p-8 shadow-sm rounded-lg border border-gray-100">

                        <h1 class="text-xl">
                            <strong>{{ $user->name }} {{ $user->lastname }}</strong>
                        </h1>
                        <br>

                        <div class="space-y-1 text-gray-700">
                            <p><strong>Email:</strong> {{ $user->email }}</p>
                            <p><strong>DNI:</strong> {{ $user->dni }}</p>
                            <p><strong>Teléfono:</strong> {{ $user->phone ?? 'N/A' }}</p>
                            <p><strong>Rol:</strong> {{ $user->role->name }}</p>
                            
                            <p>
                                <strong>Estado:</strong> 
                                @if($user->status == 'y')
                                    <span class="text-emerald-500 font-semibold">Activo</span>
                                @else
                                    <span class="text-red-500 font-semibold">Inactivo</span>
                                @endif
                            </p>

                            <p><span class="font-medium text-gray-600">created at:</span> {{ $user->created_at }}</p>
                            <p><span class="font-medium text-gray-600">updated at:</span> {{ $user->updated_at }}</p>
                        </div>

                        <br>
                        <div class="flex justify-between items-center">
                            <div class="flex gap-2">
                                <a href="{{ route('users.show', $user->id) }}" 
                                   class="px-6 py-1.5 bg-emerald-500 text-white font-medium rounded hover:bg-emerald-600 transition text-sm">
                                    Show
                                </a>
                                <a href="{{ route('users.edit', $user->id) }}" 
                                   class="px-6 py-1.5 bg-blue-500 text-white font-medium rounded hover:bg-blue-600 transition text-sm">
                                    Edit
                                </a>
                            </div>

                            <form action="{{ route('users.destroy', $user->id) }}" method="POST"
                                  onsubmit="return confirm('¿Seguro que quieres eliminar este usuario?')">
                                @csrf
                                @method('DELETE')
                                <button type="submit" 
                                        class="px-6 py-1.5 bg-red-500 text-white font-medium rounded hover:bg-red-600 transition text-sm">
                                    Delete
                                </button>
                            </form>
                        </div>
                    </div>
                @endforeach
            </div>

            {{-- Paginación --}}
            <div class="mt-8">
                {{ $users->links() }}
            </div>
        </div>
    </div>
</x-app-layout>