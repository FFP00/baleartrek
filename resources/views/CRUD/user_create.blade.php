<x-app-layout>
    <x-slot name="header">
        <h2 class="text-xl font-semibold text-gray-800">
            Crear Usuari
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
                <form action="{{ route('users.store') }}" method="POST" class="space-y-4">
                    @csrf

                    {{-- Nombre --}}
                    <div>
                        <label class="block font-medium">Nom</label>
                        <input type="text" name="name" value="{{ old('name') }}"
                               class="w-full border-gray-300 rounded @error('name') border-red-500 @enderror">
                        @error('name')
                            <p class="text-red-600 text-sm">{{ $message }}</p>
                        @enderror
                    </div>

                    {{-- Apellido --}}
                    <div>
                        <label class="block font-medium">Llinatge</label>
                        <input type="text" name="lastname" value="{{ old('lastname') }}"
                               class="w-full border-gray-300 rounded @error('lastname') border-red-500 @enderror">
                        @error('lastname')
                            <p class="text-red-600 text-sm">{{ $message }}</p>
                        @enderror
                    </div>

                    {{-- DNI --}}
                    <div>
                        <label class="block font-medium">DNI</label>
                        <input type="text" name="dni" value="{{ old('dni') }}"
                               class="w-full border-gray-300 rounded @error('dni') border-red-500 @enderror">
                        @error('dni')
                            <p class="text-red-600 text-sm">{{ $message }}</p>
                        @enderror
                    </div>

                    {{-- Email --}}
                    <div>
                        <label class="block font-medium">Email</label>
                        <input type="email" name="email" value="{{ old('email') }}"
                               class="w-full border-gray-300 rounded @error('email') border-red-500 @enderror">
                        @error('email')
                            <p class="text-red-600 text-sm">{{ $message }}</p>
                        @enderror
                    </div>

                    {{-- Teléfono --}}
                    <div>
                        <label class="block font-medium">Telèfon</label>
                        <input type="text" name="phone" value="{{ old('phone') }}"
                               class="w-full border-gray-300 rounded @error('phone') border-red-500 @enderror">
                        @error('phone')
                            <p class="text-red-600 text-sm">{{ $message }}</p>
                        @enderror
                    </div>

                    {{-- Password --}}
                    <div>
                        <label class="block font-medium">Contrasenya</label>
                        <input type="password" name="password"
                               class="w-full border-gray-300 rounded @error('password') border-red-500 @enderror">
                        @error('password')
                            <p class="text-red-600 text-sm">{{ $message }}</p>
                        @enderror
                    </div>

                    {{-- Estado --}}
                    <div>
                        <label class="block font-medium">Estat</label>
                        <select name="status" class="w-full border-gray-300 rounded">
                            <option value="y" {{ old('status') == 'y' ? 'selected' : '' }}>Actiu</option>
                            <option value="n" {{ old('status') == 'n' ? 'selected' : '' }}>Inactiu</option>
                        </select>
                    </div>

                    {{-- Rol --}}
                    <div>
                        <label class="block font-medium">Rol</label>
                        <select name="role_id" class="w-full border-gray-300 rounded">
                            @foreach($roles as $role)
                                <option value="{{ $role->id }}">{{ $role->name }}</option>
                            @endforeach
                        </select>
                    </div>

                    {{-- Botón --}}
                    <div class="pt-4">
                        <button type="submit"
                                class="px-4 py-2 bg-blue-600 text-white rounded hover:bg-blue-700">
                            Crear Usuari
                        </button>
                    </div>

                </form>
            </div>

        </div>
    </div>
</x-app-layout>
