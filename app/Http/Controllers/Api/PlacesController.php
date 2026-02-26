<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\InterestingPlace;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class PlacesController extends Controller
{
    /**
     * Muestra una lista de los lugares de interés.
     */
    public function index()
    {
        // Cargamos la relación con el tipo de lugar para evitar el problema N+1
        $places = InterestingPlace::with('placeType')->get();
        return response()->json($places);
    }

    /**
     * Almacena un nuevo lugar de interés.
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name'          => 'required|string|max:100',
            'gps'           => 'required|string|unique:interesting_places,gps',
            'place_type_id' => 'required|exists:place_types,id',
        ]);

        if ($validator->fails()) {
            return response()->json($validator->errors(), 400);
        }

        $place = InterestingPlace::create($request->all());

        return response()->json([
            'message' => 'Lugar creado con éxito',
            'data'    => $place
        ], 201);
    }

    /**
     * Muestra un lugar específico con sus rutas (treks) asociadas.
     */
    public function show($id)
    {
        $place = InterestingPlace::with(['placeType', 'treks'])->find($id);

        if (!$place) {
            return response()->json(['message' => 'Lugar no encontrado'], 404);
        }

        return response()->json($place);
    }

    /**
     * Actualiza un lugar de interés existente.
     */
    public function update(Request $request, $id)
    {
        $place = InterestingPlace::find($id);

        if (!$place) {
            return response()->json(['message' => 'Lugar no encontrado'], 404);
        }

        $validator = Validator::make($request->all(), [
            'name'          => 'sometimes|string|max:100',
            // Validamos que el GPS sea único pero ignorando el ID actual
            'gps'           => 'sometimes|string|unique:interesting_places,gps,' . $id,
            'place_type_id' => 'sometimes|exists:place_types,id',
        ]);

        if ($validator->fails()) {
            return response()->json($validator->errors(), 400);
        }

        $place->update($request->all());

        return response()->json([
            'message' => 'Lugar actualizado correctamente',
            'data'    => $place
        ]);
    }

    /**
     * Elimina un lugar de interés.
     */
    public function destroy($id)
    {
        $place = InterestingPlace::find($id);

        if (!$place) {
            return response()->json(['message' => 'Lugar no encontrado'], 404);
        }

        try {
            $place->delete();
            return response()->json(['message' => 'Lugar eliminado correctamente']);
        } catch (\Exception $e) {
            // Esto manejará errores si intentas borrar un lugar que tiene restricciones en la DB
            return response()->json(['message' => 'No se puede eliminar el lugar.'], 500);
        }
    }
}