<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class VentaRequest extends FormRequest
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
            'fecha' => 'required',
            'paciente' => 'required',
            'servicio' => 'required',
            'descripcion' => 'required',
            'metodo_pago' => 'required',
            'estado_pago' => 'required',
            'monto' => 'required',
            'adeudo' => 'required',
        ];
    }
}
