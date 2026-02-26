<x-app-layout>
    <x-slot name="header">
        <h2 class="text-xl font-semibold text-gray-800">
            Detalles de el Usuario
        </h2>
    </x-slot>

        <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
    <div class="flex flex-col">
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
                        </div>
                    </div>
                    </div>
                    </div>
                    </div>
</x-app-layout>
