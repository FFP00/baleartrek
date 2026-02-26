<?php

namespace App\Http\Requests\Web;

use Illuminate\Foundation\Http\FormRequest;

class MeetingRequest extends FormRequest
{
    public function authorize(): bool { return true; }

    public function rules(): array
    {
        return [
            'user_id'    => 'required|exists:users,id',
            'trek_id'    => 'required|exists:treks,id',
            'day'        => 'required|date',
            'time'       => 'required',
            'appDateIni' => 'required|date',
            'appDateEnd' => 'required|date|after_or_equal:appDateIni',
        ];
    }

    public function messages(): array
    {
        return [
            'user_id.required'    => 'L\'usuari és obligatori.',
            'user_id.exists'      => 'L\'usuari seleccionat no és vàlid.',
            'trek_id.required'    => 'La ruta (trek) és obligatòria.',
            'trek_id.exists'      => 'La ruta seleccionada no existeix.',
            'day.required'        => 'La data del dia és obligatòria.',
            'day.date'            => 'El format de la data no és correcte.',
            'time.required'       => 'L\'hora és obligatòria.',
            'appDateIni.required' => 'La data d\'inici és obligatòria.',
            'appDateIni.date'     => 'La data d\'inici no té un format vàlid.',
            'appDateEnd.required' => 'La data de finalització és obligatòria.',
            'appDateEnd.date'     => 'La data de finalització no té un format vàlid.',
            'appDateEnd.after_or_equal' => 'La data de finalització ha de ser igual o posterior a la data d\'inici.',
        ];
    }
}