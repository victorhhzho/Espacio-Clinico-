@extends('layouts.plantilla')
@section('title','CONSULTAS')
@section('contenido')
  <div id=contenido_tab class="d-flex align-items-end flex-column mb-3">
    <table class="table" id="tabla">
      <thead>
        <tr>
        <th scope="col">Id</th>  
          <th scope="col">Paciente</th>
          <th scope="col">Motivo</th>
          <th scope="col">Fecha</th>
          <th style="text-align: center; width:15%"  scope="col" colspan="3">Opciones</th>
        </tr>
      </thead>
      <tbody>
                      
          @forelse ($consultas as $consultasItem)
            <td scope="row">{{ $consultasItem->id }}</td>
            <td>{{ $consultasItem->paciente_n->nombre }}</td>
            <td>{{ $consultasItem->motivo}}</td>
            <td>{{ $consultasItem->fecha }}</td>
            <td>
                <button id="btn_con{{ $consultasItem->id }}" class="boton text-white bg-[#abad28] hover:bg-[#75761a]" data-stuff='["{{ $consultasItem->id }}","{{ $consultasItem->paciente }}","{{ $consultasItem->tipo_consulta }}","{{ $consultasItem->medico }}","{{ $consultasItem->cedula}}","{{ $consultasItem->fecha}}","{{ $consultasItem->motivo}}","{{ $consultasItem->anamnesis}}","{{ $consultasItem->temperatura}}","{{ $consultasItem->frecuencia_resp}}","{{ $consultasItem->campos_pulm}}","{{ $consultasItem->frecuencia_car}}","{{ $consultasItem->condicion_corp}}","{{ $consultasItem->porcentaje_desh}}","{{ $consultasItem->t_llenado_cap}}","{{ $consultasItem->hogar_animal}}","{{ $consultasItem->companeros}}","{{ $consultasItem->alimentacion}}","{{ $consultasItem->exp_enf_cont}}","{{ $consultasItem->enfermedades_act}}","{{ $consultasItem->tratamiento_act}}","{{ $consultasItem->reacciones_medicamentos}}","{{ $consultasItem->estado_fisio}}","{{ $consultasItem->list_prob}}","{{ $consultasItem->pruebas_rec}}","{{ $consultasItem->resultados}}","{{ $consultasItem->tratamiento}}","{{ $consultasItem->observaciones}}","{{ $consultasItem->proxima_cita}}"]' onclick="consultar('#btn_con{{ $consultasItem->id }}','#consultar')">
                  <i class="icon fa-solid fa-circle-info"></i>
                </button> 
            </td>
            <td>
                <button id="btn_act{{ $consultasItem->id }}" class="boton text-white bg-[#3c74ed] hover:bg-[#2c4780]" data-stuff='["{{ $consultasItem->id }}","{{ $consultasItem->paciente }}","{{ $consultasItem->tipo_consulta }}","{{ $consultasItem->medico }}","{{ $consultasItem->cedula}}","{{ $consultasItem->fecha}}","{{ $consultasItem->motivo}}","{{ $consultasItem->anamnesis}}","{{ $consultasItem->temperatura}}","{{ $consultasItem->frecuencia_resp}}","{{ $consultasItem->campos_pulm}}","{{ $consultasItem->frecuencia_car}}","{{ $consultasItem->condicion_corp}}","{{ $consultasItem->porcentaje_desh}}","{{ $consultasItem->t_llenado_cap}}","{{ $consultasItem->hogar_animal}}","{{ $consultasItem->companeros}}","{{ $consultasItem->alimentacion}}","{{ $consultasItem->exp_enf_cont}}","{{ $consultasItem->enfermedades_act}}","{{ $consultasItem->tratamiento_act}}","{{ $consultasItem->reacciones_medicamentos}}","{{ $consultasItem->estado_fisio}}","{{ $consultasItem->list_prob}}","{{ $consultasItem->pruebas_rec}}","{{ $consultasItem->resultados}}","{{ $consultasItem->tratamiento}}","{{ $consultasItem->observaciones}}","{{ $consultasItem->proxima_cita}}"]' onclick="actualizar('#btn_act{{ $consultasItem->id }}','#actualizar{{ $consultasItem->id }}','{{ $consultasItem->id}}')">
                  <i class="icon fa-solid fa-pen-to-square"></i>
                </button>
  
                <div class="modal fade" id="actualizar{{$consultasItem->id}}" tabindex="-1" aria-labelledby="actualizarLabel" aria-hidden="true">
                  <div class="modal-dialog">
                    <div class="modal-content">
                      <div class="modal-header" style="background-color:#009F93">
                        <h1 class="fs-5 text-white" id="actualizarLabel">Actualizar paciente</h1>
                      </div>
                      <div class="modal-body">
                        <form action="{{ route('modificar_consulta',$consultasItem) }}" method="POST">
                          @method('put')
                          @csrf
                            <div class="mb-3" style="display: none">
                                <label for="id" class="form-label" >Id</label>
                                <input type="text" name="id" id="id" class="form-control" >
                            </div>
                            <div class="mb-3">
                                <label for="paciente" class="form-label">Nombre del paciente: </label>
                                <select name="paciente" id="paciente_act{{$consultasItem->id}}" class="form-control">
                                    @foreach ($pacientes as $pacientesItem)
                                    <option value="{{$pacientesItem->id}}">{{$pacientesItem->nombre}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="mb-3">
                                <label for="tipo_consulta" class="form-label">Tipo de consulta</label>
                                <select name="tipo_consulta" id="tipo_consulta_act{{$consultasItem->id}}" class="form-control">
                                    @foreach ($tipos as $tiposItem)
                                    <option value="{{$tiposItem->id}}">{{$tiposItem->nombre}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="mb-3">
                                <label for="medico" class="form-label">Medico</label>
                                <input type="text" name="medico" id="medico_act{{$consultasItem->id}}" value="{{Auth::user()->nombre}} {{Auth::user()->apellidop}}" class="form-control" readonly>
                            </div>
                            <div class="mb-3">
                                <label for="cedula" class="form-label">Cedula</label>
                                <input type="text" name="cedula" id="cedula_act{{$consultasItem->id}}" value="{{Auth::user()->cedula}}" class="form-control" readonly>
                            </div>
                            <div class="mb-3">
                                <label for="fecha" class="form-label">Fecha de consulta</label>
                                <input type="date" name="fecha" id="fecha_act{{$consultasItem->id}}" class="form-control" >
                            </div>
                            <div class="mb-3">
                                <label for="motivo" class="form-label">Motivo</label>
                                <input type="text" name="motivo" id="motivo_act{{$consultasItem->id}}" class="form-control" >
                            </div>
                            <div class="mb-3">
                                <label for="anamnesis" class="form-label">Anamnesis: </label>
                                <textarea type="text" rows="2" style="resize: none" name="anamnesis" id="anamnesis_act{{$consultasItem->id}}" class="form-control"></textarea>
                            </div>
                            <div class="mb-3">
                                <label for="temperatura" class="form-label">Temperatura</label>
                                <input type="text" name="temperatura" id="temperatura_act{{$consultasItem->id}}" class="form-control" >
                            </div>
                            <div class="mb-3">
                                <label for="frecuencia_resp" class="form-label">Frecuencia Respiratoria</label>
                                <input type="text" name="frecuencia_resp" id="frecuencia_resp_act{{$consultasItem->id}}" class="form-control" >
                            </div>
                            <div class="mb-3">
                                <label for="campos_pulm" class="form-label">Campos pulmonares</label>
                                <input type="text" name="campos_pulm" id="campos_pulm_act{{$consultasItem->id}}" class="form-control" >
                            </div>
                            <div class="mb-3">
                                <label for="frecuencia_car" class="form-label">Frecuencia Cardiaca</label>
                                <input type="text" name="frecuencia_car" id="frecuencia_car_act{{$consultasItem->id}}" class="form-control" >
                            </div>
                            <div class="mb-3">
                                <label for="condicion_corp" class="form-label">Condición Corporal</label>
                                <input type="text" name="condicion_corp" id="condicion_corp_act{{$consultasItem->id}}" class="form-control" >
                            </div>
                            <div class="mb-3">
                                <label for="porcentaje_desh" class="form-label">Porcentaje de deshidratación</label>
                                <input type="text" name="porcentaje_desh" id="porcentaje_desh_act{{$consultasItem->id}}" class="form-control" >
                            </div>
                            <div class="mb-3">
                                <label for="t_llenado_cap" class="form-label">Tiempo de llenado capilar</label>
                                <input type="text" name="t_llenado_cap" id="t_llenado_cap_act{{$consultasItem->id}}" class="form-control" >
                            </div>
            
            
                            <div class="mb-3">
                                <label for="hogar_animal" class="form-label">Descripcion del hogar del animal</label>
                                <textarea type="text" rows="2" style="resize: none" name="hogar_animal" id="hogar_animal_act{{$consultasItem->id}}" class="form-control"></textarea>
                            </div>
                            <div class="mb-3">
                                <label for="companeros" class="form-label">¿Vive con otros animales? Especifique</label>
                                <textarea type="text" rows="2" style="resize: none" name="companeros" id="companeros_act{{$consultasItem->id}}" class="form-control"></textarea>
                            </div>
                            <div class="mb-3">
                                <label for="alimentacion" class="form-label">Alimentación</label>
                                <textarea type="text" rows="2" style="resize: none" name="alimentacion" id="alimentacion_act{{$consultasItem->id}}" class="form-control"></textarea>
                            </div>
                            <div class="mb-3">
                                <label for="exp_enf_cont" class="form-label">¿Se expuso a enfermedades contagiosas?</label>
                                <textarea type="text" rows="2" style="resize: none" name="exp_enf_cont" id="exp_enf_cont_act{{$consultasItem->id}}" class="form-control"></textarea>
                            </div>
                            <div class="mb-3">
                                <label for="enfermedades_act" class="form-label">¿Está enfermo actualmente?</label>
                                <textarea type="text" rows="2" style="resize: none" name="enfermedades_act" id="enfermedades_act_act{{$consultasItem->id}}" class="form-control"></textarea>
                            </div>
                            <div class="mb-3">
                                <label for="tratamiento_act" class="form-label">En caso de estar enfermo. ¿Que tratamiento recibe? </label>
                                <textarea type="text" rows="2" style="resize: none" name="tratamiento_act" id="tratamiento_act_act{{$consultasItem->id}}" class="form-control"></textarea>
                            </div>
                            <div class="mb-3">
                                <label for="reacciones_medicamentos" class="form-label">¿Tiene reacciones alergicas a medicamentos?</label>
                                <textarea type="text" rows="2" style="resize: none" name="reacciones_medicamentos" id="reacciones_medicamentos_act{{$consultasItem->id}}" class="form-control"></textarea>
                            </div>
            
                            <div class="mb-3">
                                <label for="estado_fisio" class="form-label">Estados fisiologico del animal</label>
                                <textarea type="text" rows="2" style="resize: none" name="estado_fisio" id="estado_fisio_act{{$consultasItem->id}}" class="form-control"></textarea>
                            </div>
                            <div class="mb-3">
                                <label for="list_prob" class="form-label">Problemas detectados</label>
                                <textarea type="text" rows="2" style="resize: none" name="list_prob" id="list_prob_act{{$consultasItem->id}}" class="form-control"></textarea>
                            </div>
                            <div class="mb-3">
                                <label for="pruebas_rec" class="form-label">Pruebas recomendadas</label>
                                <textarea type="text" rows="2" style="resize: none" name="pruebas_rec" id="pruebas_rec_act{{$consultasItem->id}}" class="form-control"></textarea>
                            </div>
                            <div class="mb-3">
                                <label for="resultados" class="form-label">Diagnostico / Resultados</label>
                                <textarea type="text" rows="2" style="resize: none" name="resultados" id="resultados_act{{$consultasItem->id}}" class="form-control"></textarea>
                            </div>
                            <div class="mb-3">
                                <label for="tratamiento" class="form-label">Tratamiento</label>
                                <textarea type="text" rows="2" style="resize: none" name="tratamiento" id="tratamiento_act{{$consultasItem->id}}" class="form-control"></textarea>
                            </div>
                            <div class="mb-3">
                                <label for="observaciones" class="form-label">Observaciones</label>
                                <textarea type="text" rows="2" style="resize: none" name="observaciones" id="observaciones_act{{$consultasItem->id}}" class="form-control"></textarea>
                            </div>
                            <div class="mb-3">
                                <label for="proxima_cita" class="form-label">Proxima cita</label>
                                <input type="date" name="proxima_cita" id="proxima_cita_act{{$consultasItem->id}}" class="form-control">
                            </div>
                            <button class="btn btn-primary text-white bg-[#037171bb] hover:bg-[#037171]" type="submit">Aceptar</button>
                        </form>
                      </div>
                      <div class="modal-footer">
                        <button class="btn btn-secondary text-white bg-[#656565bb] hover:bg-[#353535bb]" type="button" data-bs-dismiss="modal">Cancelar</button>
                      </div>
                    </div>
                  </div>
                </div> 
            </td>
            <td>
                <button class="boton text-white bg-[#8b2222] hover:bg-[#471818]" data-bs-toggle="modal" data-bs-target="#eliminar{{$consultasItem->id}}">
                  <i class="icon fa-solid fa-trash-can"></i>
                </button>
  
                <div class="modal fade" id="eliminar{{$consultasItem->id}}" tabindex="-1" aria-labelledby="eliminarLabel" aria-hidden="true">
                  <div class="modal-dialog">
                    <div class="modal-content">
                      <div class="modal-header" style="background-color:#009F93">
                        <h1 class="fs-5 text-white" id="eliminarLabel">Eliminar registro</h1>
                      </div>
                      <div class="modal-body">
                        <p>¿Usted desea eliminar el registro?</p><br>
  
                        <strong>Id: {{$consultasItem->id}}</strong><br>
                        <strong>Paciente: {{$consultasItem->paciente_n->nombre}}</strong><br>
                        <strong>Motivo: {{$consultasItem->motivo}}</strong><br>
                        <strong>Fecha: {{$consultasItem->fecha}}</strong><br><br><br>
  
                        <p>Nota: No puedes borrar un paciente si tiene consultas, ventas o eventos registrados, tienes que borrarlos primero.</p><br>
  
                      </div>
                      <div class="modal-footer">
                        <form action="{{route('eliminar_consulta',$consultasItem->id)}}" method="POST">
                          @csrf
                          @method('DELETE')
                          <button class="btn btn-primary text-white bg-[#8b2222] hover:bg-[#471818]" type="submit">Aceptar</button>
                        </form>
                        <button class="btn btn-secondary text-white bg-[#656565bb] hover:bg-[#353535bb]" type="button" data-bs-dismiss="modal">Cancelar</button>
                      </div>
                    </div>
                  </div>
                </div>
              </td>
          </tr>
          @empty
          <tr>
            <td style="text-align: center" colspan="7">No hay pacientes en registrados</td>
          </tr>
          @endforelse
      </tbody>
    </table>
  </div>

  <div id=contenido class="d-flex align-items-end flex-column mb-3">
    <button class="btn btn-primary text-white bg-[#037171bb] hover:bg-[#037171]" data-bs-toggle="modal" data-bs-target="#agregar">
      <i class="fa-solid fa-circle-plus fa-lg" ></i>
      Agregar Paciente
    </button>
  </div>    
@endsection
@section('modales_script')
  <script> 
    function consultar(boton, modal){
      $(modal).modal('show');
      var vars = $(boton).data('stuff');
      $('#id_con').val(vars[0]);
      $('#pacienete_con').val(vars[1]);
      $('#tipo_consulta_con').val(vars[2]);
      $('#medico_con').val(vars[3]);
      $('#cedula_con').val(vars[4]);
      $('#fecha_con').val(vars[5]);
      $('#motivo_con').val(vars[6]);
      $('#anamnesis_con').val(vars[7]);
      $('#temperatura_con').val(vars[8]);
      $('#frecuencia_resp_con').val(vars[9]);
      $('#campos_pulm_con').val(vars[10]);
      $('#frecuencia_car_con').val(vars[11]);
      $('#condicion_corp_con').val(vars[12]);
      $('#porcentaje_desh_con').val(vars[13]);
      $('#t_llenado_cap_con').val(vars[14]);
      $('#hogar_animal_con').val(vars[15]);
      $('#companeros_con').val(vars[16]);
      $('#alimentacion_con').val(vars[17]);
      $('#exp_enf_cont_con').val(vars[18]);
      $('#enfermedades_act_con').val(vars[19]);
      $('#tratamiento_act_con').val(vars[20]);
      $('#reacciones_medicamentos_con').val(vars[21]);
      $('#estado_fisio_con').val(vars[22]);
      $('#list_prob_con').val(vars[23]);
      $('#pruebas_rec_con').val(vars[24]);
      $('#resultados_con').val(vars[25]);
      $('#tratamiento_con').val(vars[26]);
      $('#observaciones_con').val(vars[27]);
      $('#proxima_cita_con').val(vars[28]);
    }
    function actualizar(boton, modal, num){
      $(modal).modal('show');
      var vars = $(boton).data('stuff');
      $('#id_act'+num).val(vars[0]);
      $('#pacienete_act'+num).val(vars[1]);
      $('#tipo_consulta_act'+num).val(vars[2]);
      $('#medico_act'+num).val(vars[3]);
      $('#cedula_act'+num).val(vars[4]);
      $('#fecha_act'+num).val(vars[5]);
      $('#motivo_act'+num).val(vars[6]);
      $('#anamnesis_act'+num).val(vars[7]);
      $('#temperatura_act'+num).val(vars[8]);
      $('#frecuencia_resp_act'+num).val(vars[9]);
      $('#campos_pulm_act'+num).val(vars[10]);
      $('#frecuencia_car_act'+num).val(vars[11]);
      $('#condicion_corp_act'+num).val(vars[12]);
      $('#porcentaje_desh_act'+num).val(vars[13]);
      $('#t_llenado_cap_act'+num).val(vars[14]);
      $('#hogar_animal_act'+num).val(vars[15]);
      $('#companeros_act'+num).val(vars[16]);
      $('#alimentacion_act'+num).val(vars[17]);
      $('#exp_enf_cont_act'+num).val(vars[18]);
      $('#enfermedades_act_act'+num).val(vars[19]);
      $('#tratamiento_act_act'+num).val(vars[20]);
      $('#reacciones_medicamentos_act'+num).val(vars[21]);
      $('#estado_fisio_act'+num).val(vars[22]);
      $('#list_prob_act'+num).val(vars[23]);
      $('#pruebas_rec_act'+num).val(vars[24]);
      $('#resultados_act'+num).val(vars[25]);
      $('#tratamiento_act'+num).val(vars[26]);
      $('#observaciones_act'+num).val(vars[27]);
      $('#proxima_cita_act'+num).val(vars[28]);
    }
  </script>
@endsection
@section('modales')

<div class="modal fade" id="consultar" tabindex="-1" aria-labelledby="consultarLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header" style="background-color:#009F93">
          <h1 class="fs-5 text-white" id="consultarLabel">Consultar paciente</h1>
        </div>
        <div class="modal-body">
            <div class="mb-3" style="display: none">
                <label for="id" class="form-label" >Id</label>
                <input type="text" name="id" id="id_con" class="form-control" >
            </div>
            <div class="mb-3">
                <label for="paciente" class="form-label">Nombre del paciente: </label>
                <select name="paciente" id="paciente_con" class="form-control">
                    @foreach ($pacientes as $pacientesItem)
                    <option value="{{$pacientesItem->id}}">{{$pacientesItem->nombre}}</option>
                    @endforeach
                </select>
            </div>
            <div class="mb-3">
                <label for="tipo_consulta" class="form-label">Tipo de consulta</label>
                <select name="tipo_consulta" id="tipo_consulta_con" class="form-control">
                    @foreach ($tipos as $tiposItem)
                    <option value="{{$tiposItem->id}}">{{$tiposItem->nombre}}</option>
                    @endforeach
                </select>
            </div>
            <div class="mb-3">
                <label for="medico" class="form-label">Medico</label>
                <input type="text" name="medico" id="medico" value="{{Auth::user()->nombre}} {{Auth::user()->apellidop}}" class="form-control" readonly>
            </div>
            <div class="mb-3">
                <label for="cedula" class="form-label">Cedula</label>
                <input type="text" name="cedula" id="cedula" value="{{Auth::user()->cedula}}" class="form-control" readonly>
            </div>
            <div class="mb-3">
                <label for="fecha" class="form-label">Fecha de consulta</label>
                <input type="date" name="fecha" id="fecha_con" class="form-control" >
            </div>
            <div class="mb-3">
                <label for="motivo" class="form-label">Motivo</label>
                <input type="text" name="motivo" id="motivo_con" class="form-control" >
            </div>
            <div class="mb-3">
                <label for="anamnesis" class="form-label">Anamnesis: </label>
                <textarea type="text" rows="2" style="resize: none" name="anamnesis" id="anamnesis_con" class="form-control"></textarea>
            </div>
            <div class="mb-3">
                <label for="temperatura" class="form-label">Temperatura</label>
                <input type="text" name="temperatura" id="temperatura_con" class="form-control" >
            </div>
            <div class="mb-3">
                <label for="frecuencia_resp" class="form-label">Frecuencia Respiratoria</label>
                <input type="text" name="frecuencia_resp" id="frecuencia_resp_con" class="form-control" >
            </div>
            <div class="mb-3">
                <label for="campos_pulm" class="form-label">Campos pulmonares</label>
                <input type="text" name="campos_pulm" id="campos_pulm_con" class="form-control" >
            </div>
            <div class="mb-3">
                <label for="frecuencia_car" class="form-label">Frecuencia Cardiaca</label>
                <input type="text" name="frecuencia_car" id="frecuencia_car_con" class="form-control" >
            </div>
            <div class="mb-3">
                <label for="condicion_corp" class="form-label">Condición Corporal</label>
                <input type="text" name="condicion_corp" id="condicion_corp_con" class="form-control" >
            </div>
            <div class="mb-3">
                <label for="porcentaje_desh" class="form-label">Porcentaje de deshidratación</label>
                <input type="text" name="porcentaje_desh" id="porcentaje_desh_con" class="form-control" >
            </div>
            <div class="mb-3">
                <label for="t_llenado_cap" class="form-label">Tiempo de llenado capilar</label>
                <input type="text" name="t_llenado_cap" id="t_llenado_cap_con" class="form-control" >
            </div>


            <div class="mb-3">
                <label for="hogar_animal" class="form-label">Descripcion del hogar del animal</label>
                <textarea type="text" rows="2" style="resize: none" name="hogar_animal" id="hogar_animal_con" class="form-control"></textarea>
            </div>
            <div class="mb-3">
                <label for="companeros" class="form-label">¿Vive con otros animales? Especifique</label>
                <textarea type="text" rows="2" style="resize: none" name="companeros" id="companeros_con" class="form-control"></textarea>
            </div>
            <div class="mb-3">
                <label for="alimentacion" class="form-label">Alimentación</label>
                <textarea type="text" rows="2" style="resize: none" name="alimentacion" id="alimentacion_con" class="form-control"></textarea>
            </div>
            <div class="mb-3">
                <label for="exp_enf_cont" class="form-label">¿Se expuso a enfermedades contagiosas?</label>
                <textarea type="text" rows="2" style="resize: none" name="exp_enf_cont" id="exp_enf_cont_con" class="form-control"></textarea>
            </div>
            <div class="mb-3">
                <label for="enfermedades_act" class="form-label">¿Está enfermo actualmente?</label>
                <textarea type="text" rows="2" style="resize: none" name="enfermedades_act" id="enfermedades_act_con" class="form-control"></textarea>
            </div>
            <div class="mb-3">
                <label for="tratamiento_act" class="form-label">En caso de estar enfermo. ¿Que tratamiento recibe? </label>
                <textarea type="text" rows="2" style="resize: none" name="tratamiento_act_con" id="tratamiento_act" class="form-control"></textarea>
            </div>
            <div class="mb-3">
                <label for="reacciones_medicamentos" class="form-label">¿Tiene reacciones alergicas a medicamentos?</label>
                <textarea type="text" rows="2" style="resize: none" name="reacciones_medicamentos" id="reacciones_medicamentos_con" class="form-control"></textarea>
            </div>

            <div class="mb-3">
                <label for="estado_fisio" class="form-label">Estados fisiologico del animal</label>
                <textarea type="text" rows="2" style="resize: none" name="estado_fisio" id="estado_fisio_con" class="form-control"></textarea>
            </div>
            <div class="mb-3">
                <label for="list_prob" class="form-label">Problemas detectados</label>
                <textarea type="text" rows="2" style="resize: none" name="list_prob" id="list_prob_con" class="form-control"></textarea>
            </div>
            <div class="mb-3">
                <label for="pruebas_rec" class="form-label">Pruebas recomendadas</label>
                <textarea type="text" rows="2" style="resize: none" name="pruebas_rec" id="pruebas_rec_con" class="form-control"></textarea>
            </div>
            <div class="mb-3">
                <label for="resultados" class="form-label">Diagnostico / Resultados</label>
                <textarea type="text" rows="2" style="resize: none" name="resultados" id="resultados_con" class="form-control"></textarea>
            </div>
            <div class="mb-3">
                <label for="tratamiento" class="form-label">Tratamiento</label>
                <textarea type="text" rows="2" style="resize: none" name="tratamiento" id="tratamiento_con" class="form-control"></textarea>
            </div>
            <div class="mb-3">
                <label for="observaciones" class="form-label">Observaciones</label>
                <textarea type="text" rows="2" style="resize: none" name="observaciones" id="observaciones_con" class="form-control"></textarea>
            </div>
            <div class="mb-3">
                <label for="proxima_cita" class="form-label">Proxima cita</label>
                <input type="date" name="proxima_cita" id="proxima_cita_con" class="form-control">
            </div>
          <div class="modal-footer">
            <button class="btn btn-primary text-white bg-[#037171bb] hover:bg-[#037171]" type="button" data-bs-dismiss="modal">Cerrar</button>
          </div>
        </div>
      </div>
    </div>
  </div>

<div class="modal fade" id="agregar" tabindex="-1" aria-labelledby="agregarLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header" style="background-color:#009F93">
          <h1 class="fs-5 text-white" id="agregarLabel">Agregar consulta</h1>
        </div>
        <div class="modal-body">
          <form action="{{ route('registrar_consulta') }}" method="POST">
            @csrf
            <div class="mb-3" style="display: none">
                <label for="id" class="form-label" >Id</label>
                <input type="text" name="id" id="id" class="form-control" >
            </div>
            <div class="mb-3">
                <label for="paciente" class="form-label">Nombre del paciente: </label>
                <select name="paciente" id="paciente" class="form-control">
                    @foreach ($pacientes as $pacientesItem)
                    <option value="{{$pacientesItem->id}}">{{$pacientesItem->nombre}}</option>
                    @endforeach
                </select>
            </div>
            <div class="mb-3">
                <label for="tipo_consulta" class="form-label">Tipo de consulta</label>
                <select name="tipo_consulta" id="tipo_consulta" class="form-control">
                    @foreach ($tipos as $tiposItem)
                    <option value="{{$tiposItem->id}}">{{$tiposItem->nombre}}</option>
                    @endforeach
                </select>
            </div>
            <div class="mb-3">
                <label for="medico" class="form-label">Medico</label>
                <input type="text" name="medico" id="medico" value="{{Auth::user()->nombre}} {{Auth::user()->apellidop}}" class="form-control" readonly>
            </div>
            <div class="mb-3">
                <label for="cedula" class="form-label">Cedula</label>
                <input type="text" name="cedula" id="cedula" value="{{Auth::user()->cedula}}" class="form-control" readonly>
            </div>
            <div class="mb-3">
                <label for="fecha" class="form-label">Fecha de consulta</label>
                <input type="date" name="fecha" id="fecha" class="form-control" >
            </div>
            <div class="mb-3">
                <label for="motivo" class="form-label">Motivo</label>
                <input type="text" name="motivo" id="motivo" class="form-control" >
            </div>
            <div class="mb-3">
                <label for="anamnesis" class="form-label">Anamnesis: </label>
                <textarea type="text" rows="2" style="resize: none" name="anamnesis" id="anamnesis" class="form-control"></textarea>
            </div>
            <div class="mb-3">
                <label for="temperatura" class="form-label">Temperatura</label>
                <input type="text" name="temperatura" id="temperatura" class="form-control" >
            </div>
            <div class="mb-3">
                <label for="frecuencia_resp" class="form-label">Frecuencia Respiratoria</label>
                <input type="text" name="frecuencia_resp" id="frecuencia_resp" class="form-control" >
            </div>
            <div class="mb-3">
                <label for="campos_pulm" class="form-label">Campos pulmonares</label>
                <input type="text" name="campos_pulm" id="campos_pulm" class="form-control" >
            </div>
            <div class="mb-3">
                <label for="frecuencia_car" class="form-label">Frecuencia Cardiaca</label>
                <input type="text" name="frecuencia_car" id="frecuencia_car" class="form-control" >
            </div>
            <div class="mb-3">
                <label for="condicion_corp" class="form-label">Condición Corporal</label>
                <input type="text" name="condicion_corp" id="condicion_corp" class="form-control" >
            </div>
            <div class="mb-3">
                <label for="porcentaje_desh" class="form-label">Porcentaje de deshidratación</label>
                <input type="text" name="porcentaje_desh" id="porcentaje_desh" class="form-control" >
            </div>
            <div class="mb-3">
                <label for="t_llenado_cap" class="form-label">Tiempo de llenado capilar</label>
                <input type="text" name="t_llenado_cap" id="t_llenado_cap" class="form-control" >
            </div>


            <div class="mb-3">
                <label for="hogar_animal" class="form-label">Descripcion del hogar del animal</label>
                <textarea type="text" rows="2" style="resize: none" name="hogar_animal" id="hogar_animal" class="form-control"></textarea>
            </div>
            <div class="mb-3">
                <label for="companeros" class="form-label">¿Vive con otros animales? Especifique</label>
                <textarea type="text" rows="2" style="resize: none" name="companeros" id="companeros" class="form-control"></textarea>
            </div>
            <div class="mb-3">
                <label for="alimentacion" class="form-label">Alimentación</label>
                <textarea type="text" rows="2" style="resize: none" name="alimentacion" id="alimentacion" class="form-control"></textarea>
            </div>
            <div class="mb-3">
                <label for="exp_enf_cont" class="form-label">¿Se expuso a enfermedades contagiosas?</label>
                <textarea type="text" rows="2" style="resize: none" name="exp_enf_cont" id="exp_enf_cont" class="form-control"></textarea>
            </div>
            <div class="mb-3">
                <label for="enfermedades_act" class="form-label">¿Está enfermo actualmente?</label>
                <textarea type="text" rows="2" style="resize: none" name="enfermedades_act" id="enfermedades_act" class="form-control"></textarea>
            </div>
            <div class="mb-3">
                <label for="tratamiento_act" class="form-label">En caso de estar enfermo. ¿Que tratamiento recibe? </label>
                <textarea type="text" rows="2" style="resize: none" name="tratamiento_act" id="tratamiento_act" class="form-control"></textarea>
            </div>
            <div class="mb-3">
                <label for="reacciones_medicamentos" class="form-label">¿Tiene reacciones alergicas a medicamentos?</label>
                <textarea type="text" rows="2" style="resize: none" name="reacciones_medicamentos" id="reacciones_medicamentos" class="form-control"></textarea>
            </div>

            <div class="mb-3">
                <label for="estado_fisio" class="form-label">Estados fisiologico del animal</label>
                <textarea type="text" rows="2" style="resize: none" name="estado_fisio" id="estado_fisio" class="form-control"></textarea>
            </div>
            <div class="mb-3">
                <label for="list_prob" class="form-label">Problemas detectados</label>
                <textarea type="text" rows="2" style="resize: none" name="list_prob" id="list_prob" class="form-control"></textarea>
            </div>
            <div class="mb-3">
                <label for="pruebas_rec" class="form-label">Pruebas recomendadas</label>
                <textarea type="text" rows="2" style="resize: none" name="pruebas_rec" id="pruebas_rec" class="form-control"></textarea>
            </div>
            <div class="mb-3">
                <label for="resultados" class="form-label">Diagnostico / Resultados</label>
                <textarea type="text" rows="2" style="resize: none" name="resultados" id="resultados" class="form-control"></textarea>
            </div>
            <div class="mb-3">
                <label for="tratamiento" class="form-label">Tratamiento</label>
                <textarea type="text" rows="2" style="resize: none" name="tratamiento" id="tratamiento" class="form-control"></textarea>
            </div>
            <div class="mb-3">
                <label for="observaciones" class="form-label">Observaciones</label>
                <textarea type="text" rows="2" style="resize: none" name="observaciones" id="observaciones" class="form-control"></textarea>
            </div>
            <div class="mb-3">
                <label for="proxima_cita" class="form-label">Proxima cita</label>
                <input type="date" name="proxima_cita" id="proxima_cita" class="form-control">
            </div>

            <button class="btn btn-primary text-white bg-[#037171bb] hover:bg-[#037171]" type="submit">Aceptar</button>
          </form>
        </div>
        <div class="modal-footer">
          <button class="btn btn-secondary text-white bg-[#656565bb] hover:bg-[#353535bb]" type="button" data-bs-dismiss="modal">Cancelar</button>
        </div>
      </div>
    </div>
  </div>
@endsection