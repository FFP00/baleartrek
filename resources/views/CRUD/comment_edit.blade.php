<x-app-layout>
    <x-slot name="header">
        <h2 class="text-xl font-semibold text-gray-800">
            Editar Comentari
        </h2>
    </x-slot>

    {{-- CDN de CKEditor --}}
    <script src="https://cdn.ckeditor.com/ckeditor5/39.0.1/classic/ckeditor.js"></script>

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

                    {{-- Comentario con CKEditor --}}
                    <div>
                        <label class="block font-medium">Comentari</label>
                        {{-- Añadido id="comment" --}}
                        <textarea id="comment" name="comment" rows="3" 
                                  class="w-full border-gray-300 rounded @error('comment') border-red-500 @enderror">{{ old('comment', $comment->comment) }}</textarea>
                        @error('comment')
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

                    {{-- Score - Bloqueado --}}
                    <div>
                        <label class="block font-medium text-gray-500">Puntuació</label>
                        <input type="number" name="score"
                            value="{{ $comment->score }}"
                            readonly
                            class="w-full border-gray-300 rounded bg-gray-100 cursor-not-allowed text-gray-500 shadow-none">
                        <p class="text-xs text-gray-400 mt-1 italic">El valor de 'score' no es pot modificar.</p>
                    </div>

                    {{-- Usuario - Solo información --}}
                    <div>
                        <label class="block font-medium text-gray-500">Usuari</label>
                        <div class="w-full border border-gray-200 rounded p-2 bg-gray-50 text-gray-600">
                            {{ $comment->user->name }}
                        </div>
                        <input type="hidden" name="user_id" value="{{ $comment->user_id }}">
                    </div>

                    {{-- Meeting - Solo información --}}
                    <div>
                        <label class="block font-medium text-gray-500">Meeting</label>
                        <div class="w-full border border-gray-200 rounded p-2 bg-gray-50 text-gray-600">
                            ID: {{ $comment->meeting_id }}
                        </div>
                        <input type="hidden" name="meeting_id" value="{{ $comment->meeting_id }}">
                    </div>

                    {{-- Imatges --}}
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

    {{-- Inicialización de CKEditor --}}
    <script>
        ClassicEditor
            .create(document.querySelector('#comment'), {
                toolbar: ['heading', '|', 'bold', 'italic', 'link', 'bulletedList', 'numberedList']
            })
            .catch(error => {
                console.error(error);
            });
    </script>
</x-app-layout>