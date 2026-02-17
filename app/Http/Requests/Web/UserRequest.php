<?php

namespace App\Http\Requests\Web;

use Illuminate\Foundation\Http\FormRequest;

class UserRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules()
    {
        $userId = $this->user ? $this->user->id : null;

        return [
            'name' => 'required',
            'lastname' => 'required',
            'dni' => 'required|unique:users,dni,' . $userId,
            'email' => 'required|email|unique:users,email,' . $userId,
            'phone' => 'required',
            'role_id' => 'required',
            'status' => 'required|in:y,n',
            // Solo obligatorio al crear
            'password' => $this->isMethod('POST') ? 'required|min:6' : 'nullable',
        ];
    }


    public function messages()
    {
        return [
            'name.required' => "Has d'informar un nom",
            'lastname.required' => "Has d'informar un llinatge",
            'dni.required' => "Has d'informar un DNI",
            'email.required' => "Has d'informar un email",
            'phone.required' => "Has d'informar un telèfon",
            'dni.unique' => "El DNI ja està registrat",
            'email.unique' => "L'email ja està registrat",

        ];
    }
}
