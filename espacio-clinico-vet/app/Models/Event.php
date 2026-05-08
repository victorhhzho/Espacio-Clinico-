<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
    use HasFactory;
    protected $fillable = [
        'event',
        'start_date',
        'end_date',
        'paciente',
    ];

    public function paciente_n(){
        return $this->belongsTo(Paciente::class,'paciente');
    }
}
