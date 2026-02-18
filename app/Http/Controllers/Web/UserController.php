<?php

namespace App\Http\Controllers\Web;

use Illuminate\Http\Request;

use App\Models\User;
use App\Models\Role;
use App\Http\Controllers\Controller;
use App\Http\Requests\Web\UserRequest;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        // Capturamos el término de búsqueda
        $search = $request->input('search');

        $users = User::query()
            ->when($search, function ($query, $search) {
                $query->where(function($q) use ($search) {
                    $q->where('name', 'LIKE', "%{$search}%")
                    ->orWhere('lastname', 'LIKE', "%{$search}%")
                    ->orWhere('dni', 'LIKE', "%{$search}%")
                    ->orWhere('email', 'LIKE', "%{$search}%");
                });
            })
            ->with('role') // Eager loading para optimizar rendimiento
            ->latest()    // Ordenar por los más recientes
            ->paginate(20)
            ->withQueryString(); // Mantiene el filtro al cambiar de página en la paginación

        return view('CRUD.user_index', compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $roles = Role::all();
        return view('CRUD.user_create', compact('roles'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(UserRequest $request)
    {
        User::create($request->validated());
        return redirect()->route('users.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(User $user)
    {
        return view('CRUD.user_show', compact("user"));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(User $user)
    {
        $roles = Role::all();
        return view('CRUD.user_edit', compact("user","roles"));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UserRequest $request, User $user)
    {
        $user->update($request->all());
        return redirect()->route('users.show', $user->id)->with('success', 'Actualitzat!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(User $user)
    {
        $user->deleteOrFail();
        return back()->with('status', 'User eliminado correctamente');
    }
}
