<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreImageRequest extends FormRequest
{
    // Cambia esto a true para permitir el uso del request
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            // Valida que sea imagen, formatos permitidos y tamaño máximo (10MB)
            'url' => 'required|image|mimes:jpeg,jpg,png,bmp|max:10240',
        ];
    }

    public function messages()
    {
        return [
            'url.required' => 'La imagen es obligatoria',
            'url.image' => 'El archivo debe ser una imagen',
            'url.mimes' => 'La imagen debe ser jpeg, jpg, png o bmp',
            'url.max' => 'La imagen no puede superar 10MB',
        ];
    }
}