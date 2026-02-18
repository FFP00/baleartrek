<?php

namespace App\Http\Controllers\Web;

use App\Models\Municipality;
use App\Models\Island;
use App\Models\Zone;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\Web\MunicipalityRequest;

class MunicipalityController extends Controller
{
    public function index()
    {
        $municipalities = Municipality::with(['island', 'zone'])->latest()->paginate(20);
        return view('CRUD.municipality_index', compact('municipalities'));
    }

    public function create()
    {
        $islands = Island::all();
        $zones = Zone::all();
        return view('CRUD.municipality_create', compact('islands', 'zones'));
    }

    public function store(MunicipalityRequest $request)
    {
        Municipality::create($request->validated());
        return redirect()->route('municipality.index')->with('success', 'Municipi creat!');
    }

    public function show(Municipality $municipality)
    {
        return view('CRUD.municipality_show', compact('municipality'));
    }

    public function edit(Municipality $municipality)
    {
        $islands = Island::all();
        $zones = Zone::all();
        return view('CRUD.municipality_edit', compact('municipality', 'islands', 'zones'));
    }

    public function update(MunicipalityRequest $request, Municipality $municipality)
    {
        $municipality->update($request->validated());
        return redirect()->route('municipality.index')->with('success', 'Municipi actualitzat!');
    }

    public function destroy(Municipality $municipality)
    {
        try {
            $municipality->delete();
            return back()->with('success', 'Municipi eliminat');
        } catch (\Illuminate\Database\QueryException $e) {
            return back()->withErrors(['constraint' => 'No es pot eliminar: aquest municipi té rutes o dades vinculades.']);
        }
    }
}