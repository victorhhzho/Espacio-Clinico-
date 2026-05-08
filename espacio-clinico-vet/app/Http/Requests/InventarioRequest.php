<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class InventarioRequest extends FormRequest
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
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array|string>
     */
    public function rules(): array
    {
        return [
            'articulo' => 'required',
            'proveedor' => 'required',
            'tipo' => 'required',
            'descripcion' => 'required',
            'unidades' => 'required',
            'unidades_min' => 'required',
            'precio_vet' => 'required',
            'precio_pub' => 'required',
        ];
    }
}
