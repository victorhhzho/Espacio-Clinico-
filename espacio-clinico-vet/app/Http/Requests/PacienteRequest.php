<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use SebastianBergmann\Type\TrueType;

class PacienteRequest extends FormRequest
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
            'pro_nombre',
            'pro_apellidop',
            'pro_apellidom',
            'direccion',
            'telefono',
            'celular',
            'pro_observaciones',
    
            'nombre' => 'required',
            'especie' => 'required',
            'raza' => 'required',
            'sexo' => 'required',
            'edad',
            'peso',
            'color',
            'alimentacion',
    
            'ult_desp',
            'v_puppy',
            'v_quintuple',
            'v_sextuple',
            'v_giardia',
            'v_bordetela',
            'v_rabia',
            'v_triplef',
            'v_refuerzofe',
            'v_leucemia',
            'v_otros',
            
            'prox_vacuna',
            'fecha_prox_vacuna',
            
            'cirugias',
            'obs_estetica',
            'obs_clinicas',
            'obs_pension',
            
            'ult_visita' => 'required',
        ];
    }
}
