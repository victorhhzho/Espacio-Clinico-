@extends('layouts.plantilla')
@section('title','PACIENTES')
@section('contenido')
    <div id=contenido_tab>
        <div class="table-responsive">
            <table class="table" id="tabla">
                <thead>
                <tr>
                    <th style="text-align: center" scope="col">Expediente</th>
                    <th scope="col">Paciente</th>
                    <th scope="col">Propietario</th>
                    <th scope="col">Telefono</th>
                    <th style="text-align: center; width:15%"  scope="col" colspan="3">Opciones</th>
                </tr>
                </thead>
                <tbody>
                                
                    @forelse ($pacientes as $pacientesItem)
                    <td style="text-align: center" scope="row">{{$pacientesItem->id }}</td>
                    <td>{{ $pacientesItem->nombre }}</td>
                    <td>{{ $pacientesItem->pro_nombre }}</td>
                    <td>{{ $pacientesItem->telefono }}</td>
                    <td>
                        <button id="btn_con{{ $pacientesItem->id }}" class="boton text-white bg-[#abad28] hover:bg-[#75761a]" data-stuff='["{{ $pacientesItem->id }}","{{ $pacientesItem->pro_nombre }}","{{ $pacientesItem->pro_apellidop }}","{{ $pacientesItem->pro_apellidom }}","{{ $pacientesItem->direccion}}","{{ $pacientesItem->telefono}}","{{ $pacientesItem->celular}}","{{ $pacientesItem->pro_observaciones}}","{{ $pacientesItem->nombre}}","{{ $pacientesItem->especie}}","{{ $pacientesItem->raza}}","{{ $pacientesItem->sexo}}","{{ $pacientesItem->edad}}","{{ $pacientesItem->peso}}","{{ $pacientesItem->color}}","{{ $pacientesItem->alimentacion}}","{{ $pacientesItem->ult_desp}}","{{ $pacientesItem->v_puppy}}","{{ $pacientesItem->v_quintuple}}","{{ $pacientesItem->v_sextuple}}","{{ $pacientesItem->v_giardia}}","{{ $pacientesItem->v_bordetela}}","{{ $pacientesItem->v_rabia}}","{{ $pacientesItem->v_triplef}}","{{ $pacientesItem->v_refuerzofe}}","{{ $pacientesItem->v_leucemia}}","{{ $pacientesItem->v_otros}}","{{ $pacientesItem->prox_vacuna}}","{{ $pacientesItem->fecha_prox_vacuna}}","{{ $pacientesItem->cirugias}}","{{ $pacientesItem->obs_estetica}}","{{ $pacientesItem->obs_clinicas}}","{{ $pacientesItem->obs_pension}}","{{ $pacientesItem->ult_visita}}"]' onclick="consultar('#btn_con{{ $pacientesItem->id }}','#consultar')">
                        <i class="icon fa-solid fa-circle-info"></i>
                        </button> 
                    </td>
                    <td>
                        <button id="btn_act{{ $pacientesItem->id }}" class="boton text-white bg-[#3c74ed] hover:bg-[#2c4780]" data-stuff='["{{ $pacientesItem->id }}","{{ $pacientesItem->pro_nombre }}","{{ $pacientesItem->pro_apellidop }}","{{ $pacientesItem->pro_apellidom }}","{{ $pacientesItem->direccion}}","{{ $pacientesItem->telefono}}","{{ $pacientesItem->celular}}","{{ $pacientesItem->pro_observaciones}}","{{ $pacientesItem->nombre}}","{{ $pacientesItem->especie}}","{{ $pacientesItem->raza}}","{{ $pacientesItem->sexo}}","{{ $pacientesItem->edad}}","{{ $pacientesItem->peso}}","{{ $pacientesItem->color}}","{{ $pacientesItem->alimentacion}}","{{ $pacientesItem->ult_desp}}","{{ $pacientesItem->v_puppy}}","{{ $pacientesItem->v_quintuple}}","{{ $pacientesItem->v_sextuple}}","{{ $pacientesItem->v_giardia}}","{{ $pacientesItem->v_bordetela}}","{{ $pacientesItem->v_rabia}}","{{ $pacientesItem->v_triplef}}","{{ $pacientesItem->v_refuerzofe}}","{{ $pacientesItem->v_leucemia}}","{{ $pacientesItem->v_otros}}","{{ $pacientesItem->prox_vacuna}}","{{ $pacientesItem->fecha_prox_vacuna}}","{{ $pacientesItem->cirugias}}","{{ $pacientesItem->obs_estetica}}","{{ $pacientesItem->obs_clinicas}}","{{ $pacientesItem->obs_pension}}","{{ $pacientesItem->ult_visita}}"]' onclick="actualizar('#btn_act{{ $pacientesItem->id }}','#actualizar{{ $pacientesItem->id }}','{{ $pacientesItem->id}}')">
                        <i class="icon fa-solid fa-pen-to-square"></i>
                        </button>
        
        
                        <div class="modal fade" id="actualizar{{$pacientesItem->id}}" tabindex="-1" aria-labelledby="actualizarLabel" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                            <div class="modal-header" style="background-color:#009F93">
                                <h1 class="fs-5 text-white" id="actualizarLabel">Actualizar paciente</h1>
                            </div>
                            <div class="modal-body">
                                <form action="{{ route('modificar_paciente',$pacientesItem) }}" method="POST">
                                @method('put')
                                @csrf
                                <div class="mb-3" style="display: none">
                                    <label for="id" class="form-label" >Id</label>
                                    <input type="text" name="id" id="id_act{{$pacientesItem->id}}" class="form-control" >
                                </div>
                                <h1 class="text-xl font-bold">
                                Información del propietario
                                </h1><br>
                                <div class="mb-3">
                                    <label for="pro_nombre" class="form-label">Nombre</label>
                                    <input type="text" name="pro_nombre" id="pro_nombre_act{{$pacientesItem->id}}" class="form-control" >
                                </div>
                                <div class="mb-3">
                                    <label for="pro_apellidop" class="form-label">Apellido Paterno</label>
                                    <input type="text" name="pro_apellidop" id="pro_apellidop_act{{$pacientesItem->id}}" class="form-control" >
                                </div>
                                <div class="mb-3">
                                    <label for="pro_apellidom" class="form-label">Apellido Materno</label>
                                    <input type="text" name="pro_apellidom" id="pro_apellidom_act{{$pacientesItem->id}}" class="form-control" >
                                </div>
                                <div class="mb-3">
                                    <label for="direccion" class="form-label">Direccion</label>
                                    <input type="text" name="direccion" id="direccion_act{{$pacientesItem->id}}" class="form-control">
                                </div>
                                <div class="mb-3">
                                    <label for="telefono" class="form-label">Telefono</label>
                                    <input type="tel" name="telefono" id="telefono_act{{$pacientesItem->id}}" class="form-control" >
                                </div>
                                <div class="mb-3">
                                    <label for="celular" class="form-label">Celular</label>
                                    <input type="tel" name="celular" id="celular_act{{$pacientesItem->id}}" class="form-control" >
                                </div>
                                <div class="mb-3">
                                    <label for="pro_observaciones" class="form-label">Observaciones del propietaro: </label>
                                    <textarea type="text" rows="2" style="resize: none" name="pro_observaciones" id="pro_observaciones_act{{$pacientesItem->id}}" class="form-control"></textarea>
                                </div>
                                <h1 class="text-xl font-bold">
                                    Información del paciente
                                </h1><br>
                                <div class="mb-3">
                                    <label for="nombre" class="form-label">Nombre</label>
                                    <input type="text" name="nombre" id="nombre_act{{$pacientesItem->id}}" class="form-control" >
                                </div>
                                <div class="mb-3">
                                    <label for="especie" class="form-label">Especie</label>
                                    <select name="especie" id="especie_act{{$pacientesItem->id}}" class="form-control">
                                        @foreach ($especies as $especiesItem)
                                        <option value="{{$especiesItem->id}}">{{$especiesItem->nombre}}</option>
                                        @endforeach
                                        </select>
                                </div>
                                <div class="mb-3">
                                    <label for="raza" class="form-label">Raza</label>
                                    <select name="raza" id="raza_act{{$pacientesItem->id}}" class="form-control">
                                        @foreach ($razas as $razasItem)
                                        <option value="{{$razasItem->id}}">{{$razasItem->nombre}}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="mb-3">
                                    <label for="sexo" class="form-label">Sexo</label>
                                    <select name="sexo" id="sexo_act{{$pacientesItem->id}}" class="form-control">
                                        @foreach ($sexos as $sexosItem)
                                        <option value="{{$sexosItem->id}}">{{$sexosItem->nombre}}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="mb-3">
                                    <label for="edad" class="form-label">Edad</label>
                                    <input type="number" rows="4" name="edad" id="edad_act{{$pacientesItem->id}}" class="form-control">
                                </div>
                                <div class="mb-3">
                                    <label for="peso" class="form-label">Peso</label>
                                    <input type="text" inputmode="numeric" pattern="[0-9]+([\.,][0-9]+)?" name="peso" id="peso_act{{$pacientesItem->id}}" class="form-control" >
                                </div>
                                <div class="mb-3">
                                    <label for="color" class="form-label">Color</label>
                                    <input type="text" name="color" id="color_act{{$pacientesItem->id}}" class="form-control" >
                                </div>
                                <div class="mb-3">
                                    <label for="alimentacion" class="form-label">Alimentación</label>
                                    <input type="text" name="alimentacion" id="alimentacion_act{{$pacientesItem->id}}" class="form-control" >
                                </div>
                                <div class="mb-3">
                                    <label for="ult_desp" class="form-label">Última desparacitación</label>
                                    <input type="date" name="ult_desp" id="ult_desp_act{{$pacientesItem->id}}" class="form-control" >
                                </div>
                                <div class="mb-3">
                                    <label for="v_puppy" class="form-label">Vacuna  Puppy</label>
                                    <input type="date" name="v_puppy" id="v_puppy_act{{$pacientesItem->id}}" class="form-control" >
                                </div>
                                <div class="mb-3">
                                    <label for="v_quintuple" class="form-label">Vacuna Quintuple</label>
                                    <input type="date" name="v_quintuple" id="v_quintuple_act{{$pacientesItem->id}}" class="form-control" >
                                </div>
                                <div class="mb-3">
                                    <label for="v_sextuple" class="form-label">Vacuna Sextuple</label>
                                    <input type="date" name="v_sextuple" id="v_sextuple_act{{$pacientesItem->id}}" class="form-control" >
                                </div>
                                <div class="mb-3">
                                    <label for="v_giardia" class="form-label">Vacuna Giardia</label>
                                    <input type="date" name="v_giardia" id="v_giardia_act{{$pacientesItem->id}}" class="form-control" >
                                </div>
                                <div class="mb-3">
                                    <label for="v_bordetela" class="form-label">Vacuna Bordetela</label>
                                    <input type="date" name="v_bordetela" id="v_bordetela_act{{$pacientesItem->id}}" class="form-control" >
                                </div>
                                <div class="mb-3">
                                    <label for="v_rabia" class="form-label">Vacuna Rabia</label>
                                    <input type="date" name="v_rabia" id="v_rabia_act{{$pacientesItem->id}}" class="form-control" >
                                </div>
                                <div class="mb-3">
                                    <label for="v_triplef" class="form-label">Vacuna Triple Felino</label>
                                    <input type="date" name="v_triplef" id="v_triplef_act{{$pacientesItem->id}}" class="form-control" >
                                </div>
                                <div class="mb-3">
                                    <label for="v_refuerzofe" class="form-label">Vacuna Refuerzo Felino</label>
                                    <input type="date" name="v_refuerzofe" id="v_refuerzofe_act{{$pacientesItem->id}}" class="form-control" >
                                </div>
                                <div class="mb-3">
                                    <label for="v_leucemia" class="form-label">Vacuna de Leucemia</label>
                                    <input type="date" name="v_leucemia" id="v_leucemia_act{{$pacientesItem->id}}" class="form-control" >
                                </div>
                                <div class="mb-3">
                                    <label for="v_otros" class="form-label">Otros</label>
                                    <input type="date" name="v_otros" id="v_otros_act{{$pacientesItem->id}}" class="form-control" >
                                </div>
                        
                        
                                <div class="mb-3">
                                    <label for="prox_vacuna" class="form-label">Nombre de vacuna</label>
                                    <input type="text" name="prox_vacuna" id="prox_vacuna_act{{$pacientesItem->id}}" class="form-control" >
                                </div>
                                <div class="mb-3">
                                    <label for="fecha_prox_vacuna" class="form-label">Fecha de aplicación</label>
                                    <input type="date" name="fecha_prox_vacuna" id="fecha_prox_vacuna" class="form-control" >
                                </div>
                        
                                <div class="mb-3">
                                    <label for="cirugias" class="form-label">Cirugías y enfermedades</label>
                                    <textarea type="text" rows="2" style="resize: none" name="cirugias" id="cirugias_act{{$pacientesItem->id}}" class="form-control" ></textarea>
                                </div>
                                <div class="mb-3">
                                    <label for="obs_estetica" class="form-label">Observaciones para estética y baño</label>
                                    <textarea type="text" rows="2" style="resize: none" name="obs_estetica" id="obs_estetica_act{{$pacientesItem->id}}" class="form-control" ></textarea>
                                </div>
                                <div class="mb-3">
                                    <label for="obs_clinicas" class="form-label">Observaciones clinicas</label>
                                    <textarea type="text" rows="2" style="resize: none" name="obs_clinicas" id="obs_clinicas_act{{$pacientesItem->id}}" class="form-control" ></textarea>
                                </div>
                                <div class="mb-3">
                                    <label for="obs_pension" class="form-label">Observaciones para pensión</label>
                                    <textarea type="text" rows="2" style="resize: none" name="obs_pension" id="obs_pension_act{{$pacientesItem->id}}" class="form-control"></textarea>
                                </div>
                                <div class="mb-3">
                                    <label for="ult_visita" class="form-label">Fecha de Última visita</label>
                                    <input type="date" name="ult_visita" id="ult_visita_act{{$pacientesItem->id}}" class="form-control" >
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
                        <button class="boton text-white bg-[#8b2222] hover:bg-[#471818]" data-bs-toggle="modal" data-bs-target="#eliminar{{$pacientesItem->id}}">
                        <i class="icon fa-solid fa-trash-can"></i>
                        </button>
        
                        <div class="modal fade" id="eliminar{{$pacientesItem->id}}" tabindex="-1" aria-labelledby="eliminarLabel" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                            <div class="modal-header" style="background-color:#009F93">
                                <h1 class="fs-5 text-white" id="eliminarLabel">Eliminar registro</h1>
                            </div>
                            <div class="modal-body">
                                <p>¿Usted desea eliminar el registro?</p><br>
        
                                <strong>Expediente: {{$pacientesItem->id}}</strong><br>
                                <strong>Paciente: {{$pacientesItem->nombre}}</strong><br>
                                <strong>Propietario: {{$pacientesItem->pro_nombre}}</strong><br>
                                <strong>Telefono: {{$pacientesItem->telefono}}</strong><br><br><br>
        
                                <p>Nota: No puedes borrar un paciente si tiene consultas, ventas o eventos registrados, tienes que borrarlos primero.</p><br>
        
                            </div>
                            <div class="modal-footer">
                                <form action="{{route('eliminar_paciente',$pacientesItem->id)}}" method="POST">
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
      $('#pro_nombre_con').val(vars[1]);
      $('#pro_apellidop_con').val(vars[2]);
      $('#pro_apellidom_con').val(vars[3]);
      $('#direccion_con').val(vars[4]);
      $('#telefono_con').val(vars[5]);
      $('#celular_con').val(vars[6]);
      $('#pro_observaciones_con').val(vars[7]);
      $('#nombre_con').val(vars[8]);
      $('#especie_con').val(vars[9]);
      $('#raza_con').val(vars[10]);
      $('#sexo_con').val(vars[11]);
      $('#edad_con').val(vars[12]);
      $('#peso_con').val(vars[13]);
      $('#color_con').val(vars[14]);
      $('#alimentacion_con').val(vars[15]);
      $('#ult_desp_con').val(vars[16]);
      $('#v_puppy_con').val(vars[17]);
      $('#v_quintuple_con').val(vars[18]);
      $('#v_sextuple_con').val(vars[19]);
      $('#v_giardia_con').val(vars[20]);
      $('#v_bordetela_con').val(vars[21]);
      $('#v_rabia_con').val(vars[22]);
      $('#v_triplef_con').val(vars[23]);
      $('#v_refuerzofe_con').val(vars[24]);
      $('#v_leucemia_con').val(vars[25]);
      $('#v_otros_con').val(vars[26]);
      $('#prox_vacuna_con').val(vars[27]);
      $('#fecha_prox_vacuna_con').val(vars[28]);
      $('#cirugias_con').val(vars[29]);
      $('#obs_estetica_con').val(vars[30]);
      $('#obs_clinicas_con').val(vars[31]);
      $('#obs_pension_con').val(vars[32]);
      $('#ult_visita_con').val(vars[33]);

    }
    function actualizar(boton, modal, num){
      $(modal).modal('show');
      var vars = $(boton).data('stuff');
      $('#id_act'+num).val(vars[0]);
      $('#pro_nombre_act'+num).val(vars[1]);
      $('#pro_apellidop_act'+num).val(vars[2]);
      $('#pro_apellidom_act'+num).val(vars[3]);
      $('#direccion_act'+num).val(vars[4]);
      $('#telefono_act'+num).val(vars[5]);
      $('#celular_act'+num).val(vars[6]);
      $('#pro_observaciones_act'+num).val(vars[7]);
      $('#nombre_act'+num).val(vars[8]);
      $('#especie_act'+num).val(vars[9]);
      $('#raza_act'+num).val(vars[10]);
      $('#sexo_act'+num).val(vars[11]);
      $('#edad_act'+num).val(vars[12]);
      $('#peso_act'+num).val(vars[13]);
      $('#color_act'+num).val(vars[14]);
      $('#alimentacion_act'+num).val(vars[15]);
      $('#ult_desp_act'+num).val(vars[16]);
      $('#v_puppy_act'+num).val(vars[17]);
      $('#v_quintuple_act'+num).val(vars[18]);
      $('#v_sextuple_act'+num).val(vars[19]);
      $('#v_giardia_act'+num).val(vars[20]);
      $('#v_bordetela_act'+num).val(vars[21]);
      $('#v_rabia_act'+num).val(vars[22]);
      $('#v_triplef_act'+num).val(vars[23]);
      $('#v_refuerzofe_act'+num).val(vars[24]);
      $('#v_leucemia_act'+num).val(vars[25]);
      $('#v_otros_act'+num).val(vars[26]);
      $('#prox_vacuna_act'+num).val(vars[27]);
      $('#fecha_prox_vacuna_act'+num).val(vars[28]);
      $('#cirugias_act'+num).val(vars[29]);
      $('#obs_estetica_act'+num).val(vars[30]);
      $('#obs_clinicas_act'+num).val(vars[31]);
      $('#obs_pension_act'+num).val(vars[32]);
      $('#ult_visita_act'+num).val(vars[33]);
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
        <h1 class="text-xl font-bold">
        Información del propietario
        </h1><br>
        <div class="mb-3">
            <label for="pro_nombre" class="form-label">Nombre</label>
            <input type="text" name="pro_nombre" id="pro_nombre_con" class="form-control" readonly>
        </div>
        <div class="mb-3">
            <label for="pro_apellidop" class="form-label">Apellido Paterno</label>
            <input type="text" name="pro_apellidop" id="pro_apellidop_con" class="form-control" readonly>
        </div>
        <div class="mb-3">
            <label for="pro_apellidom" class="form-label">Apellido Materno</label>
            <input type="text" name="pro_apellidom" id="pro_apellidom_con" class="form-control" readonly>
        </div>
        <div class="mb-3">
            <label for="direccion" class="form-label">Direccion</label>
            <input type="text" name="direccion" id="direccion_con" class="form-control" readonly>
        </div>
        <div class="mb-3">
            <label for="telefono" class="form-label">Telefono</label>
            <input type="tel" name="telefono" id="telefono_con" class="form-control" readonly>
        </div>
        <div class="mb-3">
            <label for="celular" class="form-label">Celular</label>
            <input type="tel" name="celular" id="celular_con" class="form-control" readonly>
        </div>
        <div class="mb-3">
            <label for="pro_observaciones" class="form-label">Observaciones del propietaro: </label>
            <textarea type="text" rows="2" style="resize: none" name="pro_observaciones" id="pro_observaciones_con" class="form-control" readonly></textarea>
        </div>
        <h1 class="text-xl font-bold">
            Información del paciente
        </h1><br>
        <div class="mb-3">
            <label for="nombre" class="form-label">Nombre</label>
            <input type="text" name="nombre" id="nombre_con" class="form-control" readonly>
        </div>
        <div class="mb-3">
            <label for="especie" class="form-label">Especie</label>
            <select name="especie" id="especie_con" class="form-control">
                @foreach ($especies as $especiesItem)
                <option value="{{$especiesItem->id}}">{{$especiesItem->nombre}}</option>
                @endforeach
              </select>
        </div>
        <div class="mb-3">
            <label for="raza" class="form-label">Raza</label>
            <select name="raza" id="raza_con" class="form-control">
                @foreach ($razas as $razasItem)
                <option value="{{$razasItem->id}}">{{$razasItem->nombre}}</option>
                @endforeach
            </select>
        </div>
        <div class="mb-3">
            <label for="sexo" class="form-label">Sexo</label>
            <select name="sexo" id="sexo_con" class="form-control">
                @foreach ($sexos as $sexosItem)
                <option value="{{$sexosItem->id}}">{{$sexosItem->nombre}}</option>
                @endforeach
            </select>
        </div>
        <div class="mb-3">
            <label for="edad" class="form-label">Edad</label>
            <input type="number" name="edad" id="edad_con" class="form-control" readonly>
        </div>
        <div class="mb-3">
            <label for="peso" class="form-label">Peso</label>
            <input type="text" inputmode="numeric" pattern="[0-9]+([\.,][0-9]+)?" name="peso" id="peso_con" class="form-control" readonly>
        </div>
        <div class="mb-3">
            <label for="color" class="form-label">Color</label>
            <input type="text" name="color" id="color_con" class="form-control" readonly>
        </div>
        <div class="mb-3">
            <label for="alimentacion" class="form-label">Alimentación</label>
            <input type="text" name="alimentacion" id="alimentacion_con" class="form-control" readonly>
        </div>
        <div class="mb-3">
            <label for="ult_desp" class="form-label">Última desparacitación</label>
            <input type="date" name="ult_desp" id="ult_desp_con" class="form-control" readonly>
        </div>
        <div class="mb-3">
            <label for="v_puppy" class="form-label">Vacuna  Puppy</label>
            <input type="date" name="v_puppy" id="v_puppy_con" class="form-control" readonly>
        </div>
        <div class="mb-3">
            <label for="v_quintuple" class="form-label">Vacuna Quintuple</label>
            <input type="date" name="v_quintuple" id="v_quintuple_con" class="form-control" readonly>
        </div>
        <div class="mb-3">
            <label for="v_sextuple" class="form-label">Vacuna Sextuple</label>
            <input type="date" name="v_sextuple" id="v_sextuple_con" class="form-control" readonly>
        </div>
        <div class="mb-3">
            <label for="v_giardia" class="form-label">Vacuna Giardia</label>
            <input type="date" name="v_giardia" id="v_giardia_con" class="form-control" readonly>
        </div>
        <div class="mb-3">
            <label for="v_bordetela" class="form-label">Vacuna Bordetela</label>
            <input type="date" name="v_bordetela" id="v_bordetela_con" class="form-control" readonly>
        </div>
        <div class="mb-3">
            <label for="v_rabia" class="form-label">Vacuna Rabia</label>
            <input type="date" name="v_rabia" id="v_rabia_con" class="form-control" readonly>
        </div>
        <div class="mb-3">
            <label for="v_triplef" class="form-label">Vacuna Triple Felino</label>
            <input type="date" name="v_triplef" id="v_triplef_con" class="form-control" readonly>
        </div>
        <div class="mb-3">
            <label for="v_refuerzofe" class="form-label">Vacuna Refuerzo Felino</label>
            <input type="date" name="v_refuerzofe" id="v_refuerzofe_con" class="form-control" readonly>
        </div>
        <div class="mb-3">
            <label for="v_leucemia" class="form-label">Vacuna de Leucemia</label>
            <input type="date" name="v_leucemia" id="v_leucemia_con" class="form-control" readonly>
        </div>
        <div class="mb-3">
            <label for="v_otros" class="form-label">Otros</label>
            <input type="date" name="v_otros" id="v_otros_con" class="form-control" readonly>
        </div>


        <div class="mb-3">
            <label for="prox_vacuna" class="form-label">Nombre de vacuna</label>
            <input type="text" name="prox_vacuna" id="prox_vacuna_con" class="form-control" readonly>
        </div>
        <div class="mb-3">
            <label for="fecha_prox_vacuna" class="form-label">Fecha de aplicación</label>
            <input type="date" name="fecha_prox_vacuna" id="fecha_prox_vacuna_con" class="form-control" readonly>
        </div>

        <div class="mb-3">
            <label for="cirugias" class="form-label">Cirugías y enfermedades</label>
            <textarea type="text" rows="2" style="resize: none" name="cirugias" id="cirugias_con" class="form-control" readonly></textarea>
        </div>
        <div class="mb-3">
            <label for="obs_estetica" class="form-label">Observaciones para estética y baño</label>
            <textarea type="text" rows="2" style="resize: none" name="obs_estetica" id="obs_estetica_con" class="form-control" readonly></textarea>
        </div>
        <div class="mb-3">
            <label for="obs_clinicas" class="form-label">Observaciones clinicas</label>
            <textarea type="text" rows="2" style="resize: none" name="obs_clinicas" id="obs_clinicas_con" class="form-control" readonly></textarea>
        </div>
        <div class="mb-3">
            <label for="obs_pension" class="form-label">Observaciones para pensión</label>
            <textarea type="text" rows="2" style="resize: none" name="obs_pension" id="obs_pension_con" class="form-control" readonly></textarea>
        </div>
        <div class="mb-3">
            <label for="ult_visita" class="form-label">Fecha de Última visita</label>
            <input type="date" name="ult_visita" id="ult_visita_con" class="form-control" readonly>
        </div>
      </div>
    </div>
  </div>
</div>

<div class="modal fade" id="agregar" tabindex="-1" aria-labelledby="agregarLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header" style="background-color:#009F93">
          <h1 class="fs-5 text-white" id="agregarLabel">Agregar paciente</h1>
        </div>
        <div class="modal-body">
          <form action="{{ route('registrar_paciente') }}" method="POST">
            @csrf
            <div class="mb-3" style="display: none">
                <label for="id" class="form-label" >Id</label>
                <input type="text" name="id" id="id" class="form-control" >
            </div>
            <h1 class="text-xl font-bold">
            Información del propietario
            </h1><br>
            <div class="mb-3">
                <label for="pro_nombre" class="form-label">Nombre</label>
                <input type="text" name="pro_nombre" id="pro_nombre" class="form-control" >
            </div>
            <div class="mb-3">
                <label for="pro_apellidop" class="form-label">Apellido Paterno</label>
                <input type="text" name="pro_apellidop" id="pro_apellidop" class="form-control" >
            </div>
            <div class="mb-3">
                <label for="pro_apellidom" class="form-label">Apellido Materno</label>
                <input type="text" name="pro_apellidom" id="pro_apellidom" class="form-control" >
            </div>
            <div class="mb-3">
                <label for="direccion" class="form-label">Direccion</label>
                <input type="text" name="direccion" id="direccion" class="form-control" >
            </div>
            <div class="mb-3">
                <label for="telefono" class="form-label">Telefono</label>
                <input type="tel" name="telefono" id="telefono" class="form-control" >
            </div>
            <div class="mb-3">
                <label for="celular" class="form-label">Celular</label>
                <input type="tel" name="celular" id="celular" class="form-control" >
            </div>
            <div class="mb-3">
                <label for="pro_observaciones" class="form-label">Observaciones del propietaro: </label>
                <textarea type="text" rows="2" style="resize: none" name="pro_observaciones" id="pro_observaciones" class="form-control"></textarea>
            </div>
            <h1 class="text-xl font-bold">
                Información del paciente
            </h1><br>
            <div class="mb-3">
                <label for="nombre" class="form-label">Nombre</label>
                <input type="text" name="nombre" id="nombre" class="form-control" >
            </div>
            <div class="mb-3">
                <label for="especie" class="form-label">Especie</label>
                <select name="especie" id="especie" class="form-control">
                    @foreach ($especies as $especiesItem)
                    <option value="{{$especiesItem->id}}">{{$especiesItem->nombre}}</option>
                    @endforeach
                  </select>
            </div>
            <div class="mb-3">
                <label for="raza" class="form-label">Raza</label>
                <select name="raza" id="raza" class="form-control">
                    @foreach ($razas as $razasItem)
                    <option value="{{$razasItem->id}}">{{$razasItem->nombre}}</option>
                    @endforeach
                </select>
            </div>
            <div class="mb-3">
                <label for="sexo" class="form-label">Sexo</label>
                <select name="sexo" id="sexo" class="form-control">
                    @foreach ($sexos as $sexosItem)
                    <option value="{{$sexosItem->id}}">{{$sexosItem->nombre}}</option>
                    @endforeach
                </select>
            </div>
            <div class="mb-3">
                <label for="edad" class="form-label">Edad</label>
                <input type="number" rows="4" name="edad" id="edad" class="form-control">
            </div>
            <div class="mb-3">
                <label for="peso" class="form-label">Peso</label>
                <input type="text" inputmode="numeric" pattern="[0-9]+([\.,][0-9]+)?" name="peso" id="peso" class="form-control" >
            </div>
            <div class="mb-3">
                <label for="color" class="form-label">Color</label>
                <input type="text" name="color" id="color" class="form-control" >
            </div>
            <div class="mb-3">
                <label for="alimentacion" class="form-label">Alimentación</label>
                <input type="text" name="alimentacion" id="alimentacion" class="form-control" >
            </div>
            <div class="mb-3">
                <label for="ult_desp" class="form-label">Última desparacitación</label>
                <input type="date" name="ult_desp" id="ult_desp" class="form-control" >
            </div>
            <div class="mb-3">
                <label for="v_puppy" class="form-label">Vacuna  Puppy</label>
                <input type="date" name="v_puppy" id="v_puppy" class="form-control" >
            </div>
            <div class="mb-3">
                <label for="v_quintuple" class="form-label">Vacuna Quintuple</label>
                <input type="date" name="v_quintuple" id="v_quintuple" class="form-control" >
            </div>
            <div class="mb-3">
                <label for="v_sextuple" class="form-label">Vacuna Sextuple</label>
                <input type="date" name="v_sextuple" id="v_sextuple" class="form-control" >
            </div>
            <div class="mb-3">
                <label for="v_giardia" class="form-label">Vacuna Giardia</label>
                <input type="date" name="v_giardia" id="v_giardia" class="form-control" >
            </div>
            <div class="mb-3">
                <label for="v_bordetela" class="form-label">Vacuna Bordetela</label>
                <input type="date" name="v_bordetela" id="v_bordetela" class="form-control" >
            </div>
            <div class="mb-3">
                <label for="v_rabia" class="form-label">Vacuna Rabia</label>
                <input type="date" name="v_rabia" id="v_rabia" class="form-control" >
            </div>
            <div class="mb-3">
                <label for="v_triplef" class="form-label">Vacuna Triple Felino</label>
                <input type="date" name="v_triplef" id="v_triplef" class="form-control" >
            </div>
            <div class="mb-3">
                <label for="v_refuerzofe" class="form-label">Vacuna Refuerzo Felino</label>
                <input type="date" name="v_refuerzofe" id="v_refuerzofe" class="form-control" >
            </div>
            <div class="mb-3">
                <label for="v_leucemia" class="form-label">Vacuna de Leucemia</label>
                <input type="date" name="v_leucemia" id="v_leucemia" class="form-control" >
            </div>
            <div class="mb-3">
                <label for="v_otros" class="form-label">Otros</label>
                <input type="date" name="v_otros" id="v_otros" class="form-control" >
            </div>


            <div class="mb-3">
                <label for="prox_vacuna" class="form-label">Nombre de vacuna</label>
                <input type="text" name="prox_vacuna" id="prox_vacuna" class="form-control" >
            </div>
            <div class="mb-3">
                <label for="fecha_prox_vacuna" class="form-label">Fecha de aplicación</label>
                <input type="date" name="fecha_prox_vacuna" id="fecha_prox_vacuna" class="form-control" >
            </div>

            <div class="mb-3">
                <label for="cirugias" class="form-label">Cirugías y enfermedades</label>
                <textarea type="text" rows="2" style="resize: none" name="cirugias" id="cirugias" class="form-control" ></textarea>
            </div>
            <div class="mb-3">
                <label for="obs_estetica" class="form-label">Observaciones para estética y baño</label>
                <textarea type="text" rows="2" style="resize: none" name="obs_estetica" id="obs_estetica" class="form-control" ></textarea>
            </div>
            <div class="mb-3">
                <label for="obs_clinicas" class="form-label">Observaciones clinicas</label>
                <textarea type="text" rows="2" style="resize: none" name="obs_clinicas" id="obs_clinicas" class="form-control" ></textarea>
            </div>
            <div class="mb-3">
                <label for="obs_pension" class="form-label">Observaciones para pensión</label>
                <textarea type="text" rows="2" style="resize: none" name="obs_pension" id="obs_pension" class="form-control"></textarea>
            </div>
            <div class="mb-3">
                <label for="ult_visita" class="form-label">Fecha de Última visita</label>
                <input type="date" name="ult_visita" id="ult_visita" class="form-control" >
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