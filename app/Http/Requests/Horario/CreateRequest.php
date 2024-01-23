<?php

namespace App\Http\Requests\Horario;

use Illuminate\Foundation\Http\FormRequest;

class CreateRequest extends FormRequest
{

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'facultad' => ['required', 'string'],
            'carrera' => ['required', 'string'],
            'curso' => ['required', 'integer'],
            'content' => ['required', 'array'],
        ];
    }
}
