<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class BuscarPeliculaRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'pelicula' => 'integer|required',
        ];
    }

    public function messages(): array {
        return [
            'pelicula.integer' => 'Id de pelicula invalido.',
            'pelicula.required' => 'Debes escoger una pelicula.',
        ];
    }
}
