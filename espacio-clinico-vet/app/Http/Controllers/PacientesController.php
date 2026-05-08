<?php

namespace App\Http\Controllers;

use App\Http\Requests\ConsultaRequest;
use App\Http\Requests\PacienteRequest;
use App\Models\Consulta;
use App\Models\Especie;
use App\Models\Paciente;
use App\Models\Raza;
use App\Models\Sexo;
use App\Models\TipoConsulta;
use App\Models\Venta;
use Illuminate\Http\Request;

class PacientesController extends Controller
{
    public function index_consultar_paciente(){
        $sexos= Sexo::paginate();
        $especies= Especie::paginate();
        $razas= Raza::paginate();

        $pacientes= Paciente::paginate();
        return view('dashboard.pacientes.pacientes',compact('pacientes','sexos','especies','razas'));
    }

    public function registrar_paciente(PacienteRequest $request){
        $paciente = new Paciente();
        $paciente->pro_nombre = $request->pro_nombre;
        $paciente->pro_apellidop = $request->pro_apellidop;
        $paciente->pro_apellidom  = $request->pro_apellidom;
        $paciente->direccion  = $request->direccion;
        $paciente->telefono  = $request->telefono;
        $paciente->celular  = $request->celular;
        $paciente->pro_observaciones  = $request->pro_observaciones;

        $paciente->nombre  = $request->nombre;
        $paciente->especie  = $request->especie;
        $paciente->raza  = $request->raza;
        $paciente->sexo  = $request->sexo;
        $paciente->edad  = $request->edad;
        $paciente->peso  = $request->peso;
        $paciente->color  = $request->color;
        $paciente->alimentacion  = $request->alimentacion;

        $paciente->ult_desp  = $request->ult_desp;
        $paciente->v_puppy  = $request->v_puppy;
        $paciente->v_quintuple  = $request->v_quintuple;
        $paciente->v_sextuple  = $request->v_sextuple;
        $paciente->v_giardia  = $request->v_giardia;
        $paciente->v_bordetela  = $request->v_bordetela;
        $paciente->v_rabia  = $request->v_rabia;
        $paciente->v_triplef  = $request->v_triplef;
        $paciente->v_refuerzofe  = $request->v_refuerzofe;
        $paciente->v_leucemia  = $request->v_leucemia;
        $paciente->v_otros  = $request->v_otros;
        
        $paciente->prox_vacuna  = $request->prox_vacuna;
        $paciente->fecha_prox_vacuna  = $request->fecha_prox_vacuna;
        
        $paciente->cirugias  = $request->cirugias;
        $paciente->obs_estetica  = $request->obs_estetica;
        $paciente->obs_clinicas  = $request->obs_clinicas;
        $paciente->obs_pension  = $request->obs_pension;

        $paciente->ult_visita  = $request->ult_visita;
        $paciente->save();
        return redirect()->route('consultar_paciente');
    }

    public function eliminar_paciente(Paciente $paciente){

        $venta = Venta::all();
        $consulta = Consulta::all();

        foreach ($venta as $ventas) {
            if($ventas->paciente == $paciente->id){
                return redirect()->route('consultar_proveedor');
            }
        }
        
        foreach ($consulta as $consultas) {
            if($consultas->paciente == $paciente->id){
                return redirect()->route('consultar_proveedor');
            }
        }

        $paciente->delete();
        return redirect()->route('consultar_paciente');





    }
    
    public function modificar_paciente(PacienteRequest $request , Paciente $paciente){
        
        $paciente->pro_nombre = $request->pro_nombre;
        $paciente->pro_apellidop = $request->pro_apellidop;
        $paciente->pro_apellidom  = $request->pro_apellidom;
        $paciente->direccion  = $request->direccion;
        $paciente->telefono  = $request->telefono;
        $paciente->celular  = $request->celular;
        $paciente->pro_observaciones  = $request->pro_observaciones;

        $paciente->nombre  = $request->nombre;
        $paciente->especie  = $request->especie;
        $paciente->raza  = $request->raza;
        $paciente->sexo  = $request->sexo;
        $paciente->edad  = $request->edad;
        $paciente->peso  = $request->peso;
        $paciente->color  = $request->color;
        $paciente->alimentacion  = $request->alimentacion;

        $paciente->ult_desp  = $request->ult_desp;
        $paciente->v_puppy  = $request->v_puppy;
        $paciente->v_quintuple  = $request->v_quintuple;
        $paciente->v_sextuple  = $request->v_sextuple;
        $paciente->v_giardia  = $request->v_giardia;
        $paciente->v_bordetela  = $request->v_bordetela;
        $paciente->v_rabia  = $request->v_rabia;
        $paciente->v_triplef  = $request->v_triplef;
        $paciente->v_refuerzofe  = $request->v_refuerzofe;
        $paciente->v_leucemia  = $request->v_leucemia;
        $paciente->v_otros  = $request->v_otros;
        
        $paciente->prox_vacuna  = $request->prox_vacuna;
        $paciente->fecha_prox_vacuna  = $request->fecha_prox_vacuna;
        
        $paciente->cirugias  = $request->cirugias;
        $paciente->obs_estetica  = $request->obs_estetica;
        $paciente->obs_clinicas  = $request->obs_clinicas;
        $paciente->obs_pension  = $request->obs_pension;

        $paciente->ult_visita  = $request->ult_visita;

        $paciente->save();
        return redirect()->route('consultar_paciente');
    }
}
