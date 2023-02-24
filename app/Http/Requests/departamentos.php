<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class departamentos extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'name' => ['required', 'string', 'max:20'],
            'descripcion' => ['required', 'string', 'max:100'],
            'fotoPerfil' => ['required', 'image']
        ];
    }
}
