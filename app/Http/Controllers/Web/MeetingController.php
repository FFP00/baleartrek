<?php

namespace App\Http\Controllers\Web;

use App\Models\Meeting;
use App\Models\User;
use App\Models\Trek;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\Web\MeetingRequest;

class MeetingController extends Controller
{
    public function index()
    {
        $meetings = Meeting::with(['user', 'trek'])->latest()->paginate(20);
        return view('CRUD.meeting_index', compact('meetings'));
    }

    public function create()
    {
        $users = User::all();
        $treks = Trek::all();
        return view('CRUD.meeting_create', compact('users', 'treks'));
    }

    public function store(MeetingRequest $request)
    {
        Meeting::create($request->validated());
        // Corregido: meetings.index (en plural)
        return redirect()->route('meetings.index')->with('success', 'Trobada creada correctament!');
    }

    public function show(Meeting $meeting)
    {
        // Esto es vital para ver el nombre del Trek en el detalle
        $meeting->load(['user', 'trek']); 
        return view('CRUD.meeting_show', compact('meeting'));
    }

    public function edit(Meeting $meeting)
    {
        $users = User::all();
        $treks = Trek::all();
        return view('CRUD.meeting_edit', compact('meeting', 'users', 'treks'));
    }

    public function update(MeetingRequest $request, Meeting $meeting)
    {
        $meeting->update($request->validated());
        return redirect()->route('meetings.index')->with('success', 'Trobada actualitzada!');
    }

    public function destroy(Meeting $meeting)
    {
        try {
            $meeting->delete();
            return redirect()->route('meetings.index')->with('success', 'Trobada eliminada');
        } catch (\Exception $e) {
            return back()->withErrors(['constraint' => 'No es pot eliminar: té dades vinculades.']);
        }
    }
}