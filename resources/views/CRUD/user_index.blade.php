<x-app-layout>
    <x-slot name="header">
        <h2 class="text-xl font-semibold text-gray-800">
            Llista d'Usuaris
        </h2>
    </x-slot>

    <div class="py-6">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">

            {{-- Missatge d'èxit --}}
            @if(session('success'))
                <div class="mb-4 p-3 bg-green-100 text-green-800 rounded">
                    {{ session('success') }}
                </div>
            @endif

            <div class="mb-4">
                <a href="{{ route('users.create') }}"
                   class="px-4 py-2 bg-blue-600 text-white rounded hover:bg-blue-700">
                    Crear Usuari
                </a>
            </div>

            <div class="bg-white shadow-sm sm:rounded-lg p-6">
                <table class="w-full text-left border-collapse">
                    <thead>
                        <tr class="bg-gray-100 border-b">
                            <th class="p-2">ID</th>
                            <th class="p-2">Nom</th>
                            <th class="p-2">Llinatge</th>
                            <th class="p-2">DNI</th>
                            <th class="p-2">Email</th>
                            <th class="p-2">Telèfon</th>
                            <th class="p-2">Rol</th>
                            <th class="p-2">Estat</th>
                            <th class="p-2">Creat</th>
                            <th class="p-2">Actualitzat</th>
                            <th class="p-2">Accions</th>
                        </tr>
                    </thead>

                    <tbody>
                        @foreach ($users as $user)
                            <tr class="border-b">
                                <td class="p-2">{{ $user->id }}</td>
                                <td class="p-2">{{ $user->name }}</td>
                                <td class="p-2">{{ $user->lastname }}</td>
                                <td class="p-2">{{ $user->dni }}</td>
                                <td class="p-2">{{ $user->email }}</td>
                                <td class="p-2">{{ $user->phone }}</td>
                                <td class="p-2">{{ $user->role->name ?? 'Sense rol' }}</td>

                                <td class="p-2">
                                    <span class="{{ $user->status === 'y' ? 'text-green-600' : 'text-red-600' }}">
                                        {{ $user->status === 'y' ? 'Actiu' : 'Inactiu' }}
                                    </span>
                                </td>

                                <td class="p-2">{{ $user->created_at }}</td>
                                <td class="p-2">{{ $user->updated_at }}</td>

                                <td class="p-2 flex gap-2">
                                    <a href="{{ route('users.edit', $user->id) }}"
                                       class="px-3 py-1 bg-yellow-500 text-white rounded hover:bg-yellow-600">
                                        Editar
                                    </a>

                                    <form action="{{ route('users.destroy', $user->id) }}" method="POST"
                                          onsubmit="return confirm('Segur que vols eliminar aquest usuari?')">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit"
                                                class="px-3 py-1 bg-red-600 text-white rounded hover:bg-red-700">
                                            Eliminar
                                        </button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>

                {{-- PAGINACIÓN --}}
                <div class="mt-4">
                    {{ $users->links() }}
                </div>

            </div>
        </div>
    </div>
</x-app-layout>
