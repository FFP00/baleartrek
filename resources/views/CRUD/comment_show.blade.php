<x-app-layout>
    <x-slot name="header">
        <h2 class="text-xl font-semibold text-gray-800">
            Detalles del Comentario
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">

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

            <div class="flex flex-col">
                <div class="bg-white p-8 shadow-sm rounded-lg border border-gray-100">

                    <h1 class="text-xl">
                            <strong>{{ $comment->comment }}</strong>
                            
                        </h1>
                        <br>

                        <div class="space-y-1 text-gray-700">
                            <p><strong>Usuari: </strong>{{ $comment->user->name }}</p>
                            <p><strong>Puntuació:</strong> {{ $comment->score }}</p>
                            <p><strong>ID Reunió:</strong> {{ $comment->meeting_id }}</p>
                        
                        <p>
                            <strong>Estado:</strong> 
                            @if($comment->status == 'y')
                                <span class="text-emerald-500 font-semibold">Activo</span>
                            @else
                                <span class="text-red-500 font-semibold">Inactivo</span>
                            @endif
                        </p>

                        <p><span class="font-medium text-gray-600">created at:</span> {{ $comment->created_at }}</p>
                        <p><span class="font-medium text-gray-600">updated at:</span> {{ $comment->updated_at }}</p>
                    </div>

                    <div class="grid grid-cols-3 gap-4 mt-6 mb-6">
                        @forelse($comment->images as $image)
                            <div class="relative group">
                                <img src="{{ str_starts_with($image->url, 'http') ? $image->url : asset('storage/' . $image->url) }}" 
                                    alt="Imagen comentario" 
                                    class="h-24 w-24 object-cover rounded-lg border shadow-sm hover:scale-105 transition-transform">
                            </div>
                        @empty
                            <p class="text-sm text-gray-500 italic">Aquest comentari no té imatges.</p>
                        @endforelse
                    </div>

                    <br>
                    <div class="flex justify-between items-center">
                        <div class="flex gap-2">
                            <a href="{{ route('comments.show', $comment->id) }}" 
                                class="px-6 py-1.5 bg-emerald-500 text-white font-medium rounded hover:bg-emerald-600 transition text-sm">
                                Show
                            </a>
                            <a href="{{ route('comments.edit', $comment->id) }}" 
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