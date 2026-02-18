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
}