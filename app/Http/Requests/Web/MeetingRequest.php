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
}