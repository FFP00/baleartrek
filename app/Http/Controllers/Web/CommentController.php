<?php

namespace App\Http\Controllers\Web;

use App\Models\Comment;
use App\Models\User;
use App\Models\Meeting; // Asumo que tienes este modelo
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\Web\CommentRequest;
use App\Http\Requests\StoreImageRequest;
use App\Models\Image;

class CommentController extends Controller
{
    public function index(Request $request)
    {
        $comments = Comment::latest()->paginate(20);

        return view('CRUD.comment_index', compact('comments'));
    }

    public function create()
    {
        $users = User::all();
        $meetings = Meeting::all(); // Necesitas reuniones para asignar el comentario
        return view('CRUD.comment_create', compact('users', 'meetings'));
    }

    public function store(CommentRequest $request)
    {
        // Creem el comentari primer
        $comment = Comment::create($request->validated());

        // Gestionem la pujada d'imatges
        if ($request->hasFile('images')) {
            foreach ($request->file('images') as $file) {
                // Guarda la imatge a la carpeta 'public/comments_images'
                $path = $file->store('comments_images', 'public');

                // Crea la relació a la base de dades
                $comment->images()->create([
                    'url' => $path,
                ]);
            }
        }

        return redirect()->route('comments.index')->with('success', 'Comentari creat amb imatges!');
    }

    public function show(Comment $comment)
    {
        $comment->load('images');
        return view('CRUD.comment_show', compact('comment'));
    }

    public function edit(Comment $comment)
    {
        $users = User::all();
        $meetings = Meeting::all();
        return view('CRUD.comment_edit', compact('comment', 'users', 'meetings'));
    }

    public function update(CommentRequest $request, Comment $comment)
    {
        $comment->update($request->validated());

        if ($request->hasFile('images')) {
            foreach ($request->file('images') as $file) {
                $path = $file->store('comments_images', 'public');
                $comment->images()->create(['url' => $path]);
            }
        }

        return redirect()->route('comments.show', $comment->id)->with('success', 'Actualitzat!');
    }

    public function destroy(Comment $comment)
    {
        $comment->delete();
        return back()->with('success', 'Comentari eliminat');
    }

    public function image(StoreImageRequest $request, Comment $comment)
    {
        // Si la validación falla, Laravel volverá atrás automáticamente con los errores
        
        $path = $request->file('url')->store('images', 'public'); // Opción profesional
        
        Image::create([
            'url' => $path,
            'comment_id' => $comment->id,
        ]);
        
        return back()->with('status', 'Imagen subida correctamente');
    }
}