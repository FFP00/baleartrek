<x-app-layout>
    <x-slot name="header">
        <h2 class="text-xl font-semibold text-gray-800">
            Editar Comentari
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
                <form action="{{ route('comments.update', $comment->id) }}" method="POST" enctype="multipart/form-data" class="space-y-4">
                    @csrf
                    @method('PUT')

                    {{-- Comentario --}}
                    <div>
                        <label class="block font-medium">Comentari</label>
                        <textarea name="comment" rows="3" 
                                  class="w-full border-gray-300 rounded @error('comment') border-red-500 @enderror">{{ old('comment', $comment->comment) }}</textarea>
                        @error('comment')
                            <p class="text-red-600 text-sm">{{ $message }}</p>
                        @enderror
                    </div>

                    {{-- Score --}}
                    <div>
                        <label class="block font-medium">Puntuació</label>
                        <input type="number" name="score" value="{{ old('score', $comment->score) }}"
                               class="w-full border-gray-300 rounded @error('score') border-red-500 @enderror">
                        @error('score')
                            <p class="text-red-600 text-sm">{{ $message }}</p>
                        @enderror
                    </div>

                    {{-- Estado --}}
                    <div>
                        <label class="block font-medium">Estat</label>
                        <select name="status" class="w-full border-gray-300 rounded">
                            <option value="y" {{ $comment->status == 'y' ? 'selected' : '' }}>Actiu</option>
                            <option value="n" {{ $comment->status == 'n' ? 'selected' : '' }}>Inactiu</option>
                        </select>
                    </div>


                    {{-- Usuario --}}
                    <div>
                        <label class="block font-medium">Usuari</label>
                        <select name="user_id" class="w-full border-gray-300 rounded @error('user_id') border-red-500 @enderror">
                            @foreach($users as $user)
                                <option value="{{ $user->id }}" {{ old('user_id', $comment->user_id) == $user->id ? 'selected' : '' }}>
                                    {{ $user->name }}
                                </option>
                            @endforeach
                        </select>
                        @error('user_id')
                            <p class="text-red-600 text-sm">{{ $message }}</p>
                        @enderror
                    </div>

                    {{-- Reunión --}}
                    <div>
                        <label class="block font-medium">Meeting</label>
                        <select name="meeting_id" class="w-full border-gray-300 rounded @error('meeting_id') border-red-500 @enderror">
                            @foreach($meetings as $meeting)
                                <option value="{{ $meeting->id }}" {{ old('meeting_id', $comment->meeting_id) == $meeting->id ? 'selected' : '' }}>
                                    ID: {{ $meeting->id }}
                                </option>
                            @endforeach
                        </select>
                        @error('meeting_id')
                            <p class="text-red-600 text-sm">{{ $message }}</p>
                        @enderror
                    </div>

                    {{-- Dins del <form> de create i edit --}}

                        <div>
                            <label class="block font-medium">Imatges associades</label>
                            <input type="file" name="images[]" multiple accept="image/*"
                                class="w-full border-gray-300 rounded p-2">
                            <p class="text-xs text-gray-500 mt-1">Pots seleccionar diverses imatges alhora.</p>
                        </div>

                    {{-- Botón --}}
                    <div class="pt-4">
                        <button type="submit"
                                class="px-4 py-2 bg-blue-600 text-white rounded hover:bg-blue-700">
                            Actualitzar
                        </button>
                    </div>

                </form>
            </div>

        </div>
    </div>
</x-app-layout>