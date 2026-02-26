<?php

namespace App\Http\Controllers\Web;

use App\Models\Trek;
use App\Models\Municipality;
use App\Models\InterestingPlace; // Importante añadir esto
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
        // Cargamos los lugares para que aparezcan en el select del formulario
        $interestingPlaces = InterestingPlace::all(); 
        return view('CRUD.trek_create', compact('municipalities', 'interestingPlaces'));
    }

    public function store(TrekRequest $request)
    {
        // 1. Creamos el Trek con los datos validados
        $trek = Trek::create($request->validated());

        // 2. Si vienen lugares, los vinculamos con su orden
        if ($request->has('places')) {
            $placesData = [];
            foreach ($request->places as $index => $placeId) {
                if ($placeId) {
                    // El $index del array define el orden (1, 2, 3...)
                    $placesData[$placeId] = ['order' => $index + 1];
                }
            }
            $trek->interestingPlaces()->attach($placesData);
        }

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
        $interestingPlaces = InterestingPlace::all();
        // Cargamos los lugares que ya tiene el trek para poder editarlos
        $trek->load('interestingPlaces');
        
        return view('CRUD.trek_edit', compact('trek', 'municipalities', 'interestingPlaces'));
    }

    public function update(TrekRequest $request, Trek $trek)
    {
        // 1. Actualizamos los datos básicos
        $trek->update($request->validated());

        // 2. Sincronizamos los lugares (borra los viejos y añade los nuevos/editados)
        if ($request->has('places')) {
            $placesData = [];
            foreach ($request->places as $index => $placeId) {
                if ($placeId) {
                    $placesData[$placeId] = ['order' => $index + 1];
                }
            }
            // sync() es clave en el update para actualizar la lista completa
            $trek->interestingPlaces()->sync($placesData);
        } else {
            // Si no viene ningún lugar, limpiamos la relación
            $trek->interestingPlaces()->detach();
        }

        return redirect()->route('treks.index')->with('success', 'Excursió actualitzada!');
    }

    public function destroy(Trek $trek)
    {
        try {
            // Primero eliminamos las relaciones en la tabla pivote si no tienes 'onDelete cascade'
            $trek->interestingPlaces()->detach();
            $trek->delete();
            
            return redirect()->route('treks.index')->with('success', 'Trek eliminat correctament');
        } catch (\Illuminate\Database\QueryException $e) {
            return back()->withErrors(['constraint' => 'No es pot eliminar: l\'excursió té dades vinculades (reunions o inscripcions).']);
        }
    }
}