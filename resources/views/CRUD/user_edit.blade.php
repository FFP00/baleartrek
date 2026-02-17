<x-app-layout>
    <x-slot name="header">
        <h2 class="text-xl font-semibold text-gray-800">
            Editar Usuari
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
                <form action="{{ route('users.update', $user->id) }}" method="POST" class="space-y-4">
                    @csrf
                    @method('PUT')

                    {{-- Nombre --}}
                    <div>
                        <label class="block font-medium">Nom</label>
                        <input type="text" name="name" value="{{ old('name', $user->name) }}"
                               class="w-full border-gray-300 rounded @error('name') border-red-500 @enderror">
                        @error('name')
                            <p class="text-red-600 text-sm">{{ $message }}</p>
                        @enderror
                    </div>

                    {{-- Llinatge --}}
                    <div>
                        <label class="block font-medium">Llinatge</label>
                        <input type="text" name="lastname" value="{{ old('lastname', $user->lastname) }}"
                               class="w-full border-gray-300 rounded @error('lastname') border-red-500 @enderror">
                        @error('lastname')
                            <p class="text-red-600 text-sm">{{ $message }}</p>
                        @enderror
                    </div>

                    {{-- DNI --}}
                    <div>
                        <label class="block font-medium">DNI</label>
                        <input type="text" name="dni" value="{{ old('dni', $user->dni) }}"
                               class="w-full border-gray-300 rounded @error('dni') border-red-500 @enderror">
                        @error('dni')
                            <p class="text-red-600 text-sm">{{ $message }}</p>
                        @enderror
                    </div>

                    {{-- Email --}}
                    <div>
                        <label class="block font-medium">Email</label>
                        <input type="email" name="email" value="{{ old('email', $user->email) }}"
                               class="w-full border-gray-300 rounded @error('email') border-red-500 @enderror">
                        @error('email')
                            <p class="text-red-600 text-sm">{{ $message }}</p>
                        @enderror
                    </div>

                    {{-- Teléfono --}}
                    <div>
                        <label class="block font-medium">Telèfon</label>
                        <input type="text" name="phone" value="{{ old('phone', $user->phone) }}"
                               class="w-full border-gray-300 rounded @error('phone') border-red-500 @enderror">
                        @error('phone')
                            <p class="text-red-600 text-sm">{{ $message }}</p>
                        @enderror
                    </div>

                    {{-- Rol --}}
                    <div>
                        <label class="block font-medium">Rol</label>
                        <select name="role_id" class="w-full border-gray-300 rounded">
                            @foreach ($roles as $role)
                                <option value="{{ $role->id }}"
                                    {{ $role->id == $user->role_id ? 'selected' : '' }}>
                                    {{ $role->name }}
                                </option>
                            @endforeach
                        </select>
                        @error('role_id')
                            <p class="text-red-600 text-sm">{{ $message }}</p>
                        @enderror
                    </div>

                    {{-- Estado --}}
                    <div>
                        <label class="block font-medium">Estat</label>
                        <select name="status" class="w-full border-gray-300 rounded">
                            <option value="y" {{ $user->status == 'y' ? 'selected' : '' }}>Actiu</option>
                            <option value="n" {{ $user->status == 'n' ? 'selected' : '' }}>Inactiu</option>
                        </select>
                        @error('status')
                            <p class="text-red-600 text-sm">{{ $message }}</p>
                        @enderror
                    </div>

                    {{-- Botón --}}
                    <div class="pt-4">
                        <button type="submit"
                                class="px-4 py-2 bg-blue-600 text-white rounded hover:bg-blue-700">
                            Actualitzar
                        </button>

                        <a href="{{ route('users.index') }}"
                           class="ms-3 px-4 py-2 bg-gray-200 text-gray-800 rounded hover:bg-gray-300">
                            Tornar
                        </a>
                    </div>

                </form>
            </div>

        </div>
    </div>
</x-app-layout>
