<x-app-layout>
    <x-slot name="header">
        <h2 class="text-xl font-semibold text-gray-800">
            Detalls de l'Usuari
        </h2>
    </x-slot>

    <div class="py-6">
        <div class="max-w-3xl mx-auto sm:px-6 lg:px-8">

            <div class="bg-white shadow-sm sm:rounded-lg p-6 space-y-4">

                <div>
                    <p class="text-gray-600"><strong>ID:</strong> {{ $user->id }}</p>
                    <p class="text-gray-600"><strong>Nom:</strong> {{ $user->name }}</p>
                    <p class="text-gray-600"><strong>Llinatge:</strong> {{ $user->lastname }}</p>
                    <p class="text-gray-600"><strong>DNI:</strong> {{ $user->dni }}</p>
                    <p class="text-gray-600"><strong>Email:</strong> {{ $user->email }}</p>
                    <p class="text-gray-600"><strong>Telèfon:</strong> {{ $user->phone }}</p>

                    <p class="text-gray-600">
                        <strong>Rol:</strong> {{ $user->role->name ?? 'Sense rol' }}
                    </p>

                    <p class="text-gray-600">
                        <strong>Estat:</strong>
                        <span class="{{ $user->status == 'y' ? 'text-green-600' : 'text-red-600' }}">
                            {{ $user->status == 'y' ? 'Actiu' : 'Inactiu' }}
                        </span>
                    </p>

                    <p class="text-gray-600"><strong>Creat:</strong> {{ $user->created_at }}</p>
                    <p class="text-gray-600"><strong>Actualitzat:</strong> {{ $user->updated_at }}</p>
                </div>

                <div class="pt-4 flex gap-3">
                    <a href="{{ route('users.index') }}"
                       class="px-4 py-2 bg-gray-200 text-gray-800 rounded hover:bg-gray-300">
                        Tornar al llistat
                    </a>

                    <a href="{{ route('users.edit', $user->id) }}"
                       class="px-4 py-2 bg-blue-600 text-white rounded hover:bg-blue-700">
                        Editar
                    </a>
                </div>

            </div>

        </div>
    </div>
</x-app-layout>
