<?php

namespace App\Http\Requests\Web;

use Illuminate\Foundation\Http\FormRequest;

class TrekRequest extends FormRequest
{
    public function authorize(): bool { return true; }

    public function rules(): array
    {
        return [
            'regNumber'       => 'required|string|max:20|unique:treks,regNumber,' . ($this->trek->id ?? ''),
            'name'            => 'required|string|max:100',
            'status'          => 'required|in:y,n',
            'municipality_id' => 'required|exists:municipalities,id',
        ];
    }

    public function messages(): array
    {
        return [
            'regNumber.required'        => 'El número de registre és obligatori.',
            'regNumber.string'          => 'El número de registre ha de ser una cadena de text.',
            'regNumber.max'             => 'El número de registre no pot superar els 20 caràcters.',
            'regNumber.unique'          => 'Aquest número de registre ja està en ús.',
            'name.required'             => 'El nom de la ruta és obligatori.',
            'name.string'               => 'El nom ha de ser una cadena de text.',
            'name.max'                  => 'El nom no pot superar els 100 caràcters.',
            'status.required'           => 'L\'estat és obligatori.',
            'status.in'                 => 'L\'estat seleccionat no és vàlid (ha de ser "Sí" o "No").',
            'municipality_id.required'  => 'El municipi és obligatori.',
            'municipality_id.exists'    => 'El municipi seleccionat no existeix a la nostra base de dades.',
        ];
    }
}