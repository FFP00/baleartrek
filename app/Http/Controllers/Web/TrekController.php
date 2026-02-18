<?php

namespace App\Http\Controllers\Web;

use App\Models\Trek;
use App\Models\Municipality;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\Web\TrekRequest;

class TrekController extends Controller
{
    public function index()
    {
        $treks = Trek::with('municipality')->latest()->paginate(20);
        return view('CRUD.trek_index', compact('treks'));
    }

    public function create()
    {
        $municipalities = Municipality::all();
        return view('CRUD.trek_create', compact('municipalities'));
    }

    public function store(TrekRequest $request)
    {
        Trek::create($request->validated());
        return redirect()->route('treks.index')->with('success', 'Excursió creada!');
    }

    public function show(Trek $trek)
    {
        $trek->load(['municipality', 'interestingPlaces']);
        return view('CRUD.trek_show', compact('trek'));
    }

    public function edit(Trek $trek)
    {
        $municipalities = Municipality::all();
        return view('CRUD.trek_edit', compact('trek', 'municipalities'));
    }

    public function update(TrekRequest $request, Trek $trek)
    {
        $trek->update($request->validated());
        return redirect()->route('treks.index')->with('success', 'Excursió actualitzada!');
    }

    public function destroy(Trek $trek)
    {
        try {
            $trek->delete();
            return back()->with('success', 'Excursió eliminada');
        } catch (\Illuminate\Database\QueryException $e) {
            return back()->withErrors(['constraint' => 'No es pot eliminar: l\'excursió té dades vinculades (llocs o reunions).']);
        }
    }
}