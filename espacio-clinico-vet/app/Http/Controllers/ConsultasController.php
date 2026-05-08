<?php

namespace App\Http\Controllers;

use App\Http\Requests\ConsultaRequest;
use App\Models\Consulta;
use App\Models\Paciente;
use App\Models\TipoConsulta;
use Illuminate\Http\Request;

class ConsultasController extends Controller
{
    public function perfil_clinico(){
        $tipos= TipoConsulta::paginate();
        $consultas= Consulta::paginate();
        $pacientes= Paciente::paginate();
        return view('dashboard.pacientes.perfil_clinico',compact('consultas','tipos','pacientes'));
    }

    public function registrar_consulta(ConsultaRequest $request){
        $consulta = new Consulta;
        $consulta->paciente = $request->paciente;
        $consulta->tipo_consulta = $request->tipo_consulta;
        $consulta->medico = $request->medico;
        $consulta->cedula = $request->cedula;
        $consulta->fecha = $request->fecha;
        $consulta->motivo = $request->motivo;
        $consulta->anamnesis = $request->anamnesis;
        $consulta->temperatura = $request->temperatura;
        $consulta->frecuencia_resp = $request->frecuencia_resp;
        $consulta->campos_pulm = $request->campos_pulm;
        $consulta->frecuencia_car = $request->frecuencia_car;
        $consulta->condicion_corp = $request->condicion_corp;
        $consulta->porcentaje_desh = $request->porcentaje_desh;
        $consulta->t_llenado_cap = $request->t_llenado_cap;
        $consulta->hogar_animal = $request->hogar_animal;
        $consulta->companeros = $request->companeros;
        $consulta->alimentacion = $request->alimentacion;
        $consulta->exp_enf_cont = $request->exp_enf_cont;
        $consulta->enfermedades_act = $request->enfermedades_act;
        $consulta->tratamiento_act = $request->tratamiento_act;
        $consulta->reacciones_medicamentos = $request->reacciones_medicamentos;

        $consulta->estado_fisio = $request->estado_fisio;
        $consulta->list_prob = $request->list_prob;
        $consulta->pruebas_rec = $request->pruebas_rec;
        $consulta->resultados = $request->resultados;
        $consulta->tratamiento = $request->tratamiento;
        $consulta->observaciones = $request->observaciones;
        $consulta->proxima_cita = $request->proxima_cita;
        $consulta->save();
        return redirect()->route('perfil_clinico');
    }

    public function eliminar_consulta(Consulta $consulta){
        $consulta->delete();
        return redirect()->route('perfil_clinico');
    }
    
    public function modificar_consulta(ConsultaRequest $request , Consulta $consulta){
        $consulta->paciente = $request->paciente;
        $consulta->tipo_consulta = $request->tipo_consulta;
        $consulta->medico = $request->medico;
        $consulta->cedula = $request->cedula;
        $consulta->fecha = $request->fecha;
        $consulta->motivo = $request->motivo;
        $consulta->anamnesis = $request->anamnesis;
        $consulta->temperatura = $request->temperatura;
        $consulta->frecuencia_resp = $request->frecuencia_resp;
        $consulta->campos_pulm = $request->campos_pulm;
        $consulta->frecuencia_car = $request->frecuencia_car;
        $consulta->condicion_corp = $request->condicion_corp;
        $consulta->porcentaje_desh = $request->porcentaje_desh;
        $consulta->t_llenado_cap = $request->t_llenado_cap;
        $consulta->hogar_animal = $request->hogar_animal;
        $consulta->companeros = $request->companeros;
        $consulta->alimentacion = $request->alimentacion;
        $consulta->exp_enf_cont = $request->exp_enf_cont;
        $consulta->enfermedades_act = $request->enfermedades_act;
        $consulta->tratamiento_act = $request->tratamiento_act;
        $consulta->reacciones_medicamentos = $request->reacciones_medicamentos;

        $consulta->estado_fisio = $request->estado_fisio;
        $consulta->list_prob = $request->list_prob;
        $consulta->pruebas_rec = $request->pruebas_rec;
        $consulta->resultados = $request->resultados;
        $consulta->tratamiento = $request->tratamiento;
        $consulta->observaciones = $request->observaciones;
        $consulta->proxima_cita = $request->proxima_cita;
        $consulta->save();
        return redirect()->route('perfil_clinico');
    }

}
