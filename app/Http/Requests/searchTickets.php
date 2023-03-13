<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class searchTickets extends FormRequest
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
            'auxiliar' => [''],
            'searchByEstatus' => ['string'],
            'searchByDepartamento' => ['numeric'],
            'searchByFecha' => [''],
            'updateStatus' => ['string'],
        ];
    }
}
