<?php

namespace App\Http\Requests\Web;

use Illuminate\Foundation\Http\FormRequest;

class CommentRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true; // Importante para evitar el error de "no autorizado"
    }

    public function rules(): array
    {
        return [
            'comment'    => 'required|string|min:5',
            'score'      => 'required|integer|min:0|max:10', // Ajusta el max según tu lógica
            'status'     => 'required|in:y,n',
            'user_id'    => 'required|exists:users,id',
            'meeting_id' => 'required|exists:meetings,id',
        ];
    }

    public function messages(): array
    {
        return [
            'comment.required' => "Has d'escriure un comentari",
            'score.required'   => "Has de posar una puntuació",
            'user_id.exists'   => "L'usuari seleccionat no és vàlid",
            'meeting_id.exists'=> "La reunió seleccionada no és vàlida",
        ];
    }
}