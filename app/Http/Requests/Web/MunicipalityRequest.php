<?php

namespace App\Http\Requests\Web;

use Illuminate\Foundation\Http\FormRequest;

class MunicipalityRequest extends FormRequest
{
    public function authorize(): bool { return true; }

    public function rules(): array
    {
        return [
            'name'      => 'required|string|max:100',
            'island_id' => 'required|exists:islands,id',
            'zone_id'   => 'required|exists:zones,id',
        ];
    }
}