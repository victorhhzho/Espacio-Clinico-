<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Notificaciones extends Model
{
    use HasFactory;
    protected $fillable = [
        'mensaje',
        'tipo',
        'estado',
        'fecha_aviso'
    ];
    
    public function tipo_n(){
        return $this->belongsTo(TipoNotificaciones::class,'tipo');
    }

    public function estado_n(){
        return $this->belongsTo(EstadoNotificaciones::class,'estado');
    }
}
