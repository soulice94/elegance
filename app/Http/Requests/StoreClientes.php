<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreClientes extends FormRequest
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
     * @return array
     */
    public function rules()
    {
        return [
            'nombre'    => 'required|string|max:70',
            'paterno'   => 'required|string|max:70',
            'materno'   => 'required|string|max:70',
            'celular'   => 'required|string|max:20',
            'email'     => 'email|nullable|max:70',
        ];
    }
}
