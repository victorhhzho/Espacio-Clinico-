<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Consulta extends Model
{
    use HasFactory;
    protected $table = "consultas";
    use HasFactory;
    protected $fillable = [
        'paciente',
        'tipo_consulta',
        'medico',
        'cedula',
        'fecha',

        'motivo',
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
    public function paciente_n(){
        return $this->belongsTo(Paciente::class,'paciente');
    }

    public function tipoc_n(){
        return $this->belongsTo(TipoConsulta::class,'tipo_consulta');
    }
}
