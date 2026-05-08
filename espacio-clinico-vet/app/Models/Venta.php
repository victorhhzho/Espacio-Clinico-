<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Venta extends Model
{
    use HasFactory;
    protected $fillable = [
        'fecha',
        'paciente',
        'servicio',
        'descripcion',
        'metodo_pago',
        'estado_pago',
        'monto',
        'adeudo',
    ];

    public function paciente_n(){
        return $this->belongsTo(Paciente::class,'paciente');
    }
    public function servicio_n(){
        return $this->belongsTo(Servicio::class,'servicio');
    }
    public function metodo_n(){
        return $this->belongsTo(MetodoPago::class,'metodo_pago');
    }
    public function estado_n(){
        return $this->belongsTo(EstadoPago::class,'estado_pago');
    }
}
