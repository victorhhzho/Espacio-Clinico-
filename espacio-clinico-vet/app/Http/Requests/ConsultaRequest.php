<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ConsultaRequest extends FormRequest
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
            'paciente' => 'required',
            'tipo_consulta' => 'required',
            'medico' => 'required',
            'cedula' => 'required',
            'fecha' => 'required',
    
            'motivo' => 'required',
            'anamnesis',
    
            'temperatura',
            'frecuencia_resp',
            'campos_pulm',
            'frecuencia_car',
            'condicion_corp',
            'porcentaje_desh',
            't_llenado_cap',
    
            'hogar_animal',
            'companeros',
            'alimentacion',
            'exp_enf_cont',
            'enfermedades_act',
            'tratamiento_act',
            'reacciones_medicamentos',
    
            'estado_fisio',
            'list_prob',
            'pruebas_rec',
            'resultados',
            'tratamiento',
            'observaciones',
            'proxima_cita',
        ];
    }
}
