<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Inventario extends Model
{
    use HasFactory;
    protected $fillable = [
        'articulo',
        'proveedor',
        'tipo',
        'descripcion',
        'unidades',
        'unidades_min',
        'precio_vet',
        'precio_pub',
    ];
    
    public function tipo_inv(){
        return $this->belongsTo(TipoArticulo::class,'tipo');
    }
    public function proveedor_inv(){
        return $this->belongsTo(Proveedor::class,'proveedor');
    }
}
