<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Paciente extends Model
{
    use HasFactory;
    protected $fillable = [
        'pro_nombre',
        'pro_apellidop',
        'pro_apellidom',
        'direccion',
        'telefono',
        'celular',
        'pro_observaciones',

        'nombre',
        'especie',
        'raza',
        'sexo',
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

        'ult_visita',
    ];
    public function especie_n(){
        return $this->belongsTo(Especie::class,'especie');
    }

    public function raza_n(){
        return $this->belongsTo(Raza::class,'raza');
    }

    public function sexo_n(){
        return $this->belongsTo(Sexo::class,'sexo');
    }

}
