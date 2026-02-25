<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Meeting;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class MeetingController extends Controller
{
    /**
     * Muestra una lista de todos los meetings.
     */
    public function index()
    {
        $meetings = Meeting::with(['user', 'trek', 'comments'])->get();
        return response()->json([
            'success' => true,
            'data' => $meetings
        ], 200);
    }

    /**
     * Crea un nuevo meeting.
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'user_id'    => 'required|exists:users,id',
            'trek_id'    => 'required|exists:treks,id',
            'day'        => 'required|date',
            'time'       => 'required',
            'appDateIni' => 'required|date',
            'appDateEnd' => 'required|date|after_or_equal:appDateIni',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'success' => false,
                'errors' => $validator->errors()
            ], 400);
        }

        $meeting = Meeting::create($request->all());

        return response()->json([
            'success' => true,
            'message' => 'Meeting creado correctamente.',
            'data' => $meeting
        ], 201);
    }

    /**
     * Muestra un meeting específico.
     */
    public function show($id)
    {
        $meeting = Meeting::with(['user', 'trek', 'comments.user'])->find($id);

        if (!$meeting) {
            return response()->json([
                'success' => false,
                'message' => 'Meeting no encontrado.'
            ], 404);
        }

        return response()->json([
            'success' => true,
            'data' => $meeting
        ], 200);
    }

    /**
     * Actualiza un meeting existente.
     */
    public function update(Request $request, $id)
    {
        $meeting = Meeting::find($id);

        if (!$meeting) {
            return response()->json(['success' => false, 'message' => 'Meeting no encontrado.'], 404);
        }

        $validator = Validator::make($request->all(), [
            'day'        => 'date',
            'time'       => 'string',
            'appDateIni' => 'date',
            'appDateEnd' => 'date|after_or_equal:appDateIni',
        ]);

        if ($validator->fails()) {
            return response()->json(['success' => false, 'errors' => $validator->errors()], 400);
        }

        $meeting->update($request->all());

        return response()->json([
            'success' => true,
            'message' => 'Meeting actualizado correctamente.',
            'data' => $meeting
        ], 200);
    }

    /**
     * Elimina un meeting.
     */
    public function destroy($id)
    {
        $meeting = Meeting::find($id);

        if (!$meeting) {
            return response()->json(['success' => false, 'message' => 'Meeting no encontrado.'], 404);
        }

        try {
            $meeting->delete();
            return response()->json([
                'success' => true,
                'message' => 'Meeting eliminado correctamente.'
            ], 200);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'No se pudo eliminar el meeting (puede tener restricciones de integridad).'
            ], 500);
        }
    }
}