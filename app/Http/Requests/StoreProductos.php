<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreProductos extends FormRequest
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
            'nombre'        => 'required|string|max:128',
            'costo'         => 'required|numeric|min:1',
            'precio'        => 'required|numeric|min:1',
            'unidades'      => 'required|numeric|min:1',
            'descuento'     => 'nullable|numeric|min:1',
            'descripcion'   => 'nullable|string|max:256',
            'codigo'        => 'required|string|max:32',
            'modelo'        => 'required|string|max:32',
            'categorias_ID' => 'numeric|min:1',
            'marcas_ID'     => 'numeric|min:1',
            'colors_ID'     => 'numeric|min:1',
            'generos_ID'    => 'numeric|min:1'
        ];
    }

    public function messages()
    {
        return [
            'max' => 'El :attribute no debe superar los :max caracteres.',
            'min' => 'El :attribute debe ser positivo'
        ];
    }
}
