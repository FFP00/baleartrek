<?php

namespace App\Http\Requests\Web;

use Illuminate\Foundation\Http\FormRequest;

class InterestingPlaceRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'name' => 'required|max:255',
            'description' => 'nullable',
            'latitude' => 'required|numeric',
            'longitude' => 'required|numeric',
            'place_type_id' => 'required|exists:place_types,id',
        ];
    }

    public function messages(): array
    {
        return [
            'name.required' => "Has d'informar un nom per al lloc",
            'place_type_id.required' => "Has de seleccionar un tipus de lloc",
            'latitude.required' => "La latitud és obligatòria",
            'longitude.required' => "La longitud és obligatòria",
        ];
    }
}