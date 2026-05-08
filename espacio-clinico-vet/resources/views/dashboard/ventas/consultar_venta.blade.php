@extends('layouts.plantilla')
@section('title','VENTAS')
@section('contenido')
  <div id="contenido_tab">
    <div class="table-responsive">
      <table class="table" id="tabla">
        <thead>
          <tr>
            <th scope="col">Folio</th>
            <th scope="col">Servicio</th>
            <th scope="col">Metodo del pago</th>
            <th scope="col">Estado del pago</th>
            <th style="text-align: center; width:15%"  scope="col" colspan="3">Opciones</th>
          </tr>
        </thead>
        <tbody>
                        
            @forelse ($ventas as $ventasItem)
              <td scope="row">{{ $ventasItem->id }}</td>
              <td>{{ $ventasItem->servicio_n->nombre }}</td>
              <td>{{ $ventasItem->metodo_n->nombre }}</td>
              <td>{{ $ventasItem->estado_n->nombre }}</td>
              <td>
                <button id="btn_con{{ $ventasItem->id }}" class="boton text-white bg-[#abad28] hover:bg-[#75761a]" data-stuff='["{{ $ventasItem->id }}","{{ $ventasItem->fecha }}","{{ $ventasItem->paciente_n->nombre }}","{{ $ventasItem->servicio_n->nombre }}","{{ $ventasItem->descripcion }}","{{ $ventasItem->metodo_n->nombre }}","{{ $ventasItem->estado_n->nombre}}","{{ $ventasItem->monto}}","{{ $ventasItem->adeudo}}"]' onclick="consultar('#btn_con{{ $ventasItem->id }}','#consultar')">
                  <i class="icon fa-solid fa-circle-info"></i>
                </button> 
              </td>
              <td>
                <button id="btn_act{{ $ventasItem->id }}" class="boton text-white bg-[#3c74ed] hover:bg-[#2c4780]" data-stuff='["{{ $ventasItem->id }}","{{ $ventasItem->fecha }}","{{ $ventasItem->paciente }}","{{ $ventasItem->servicio }}","{{ $ventasItem->descripcion }}","{{ $ventasItem->metodo_pago }}","{{ $ventasItem->estado_pago}}","{{ $ventasItem->monto}}","{{ $ventasItem->adeudo}}"]' onclick="actualizar('#btn_act{{ $ventasItem->id }}','#actualizar{{ $ventasItem->id }}','{{ $ventasItem->id}}')">
                  <i class="icon fa-solid fa-pen-to-square"></i>
                </button>
  
  
                <div class="modal fade" id="actualizar{{$ventasItem->id}}" tabindex="-1" aria-labelledby="actualizarLabel" aria-hidden="true">
                  <div class="modal-dialog">
                    <div class="modal-content">
                      <div class="modal-header" style="background-color:#009F93">
                        <h1 class="fs-5 text-white" id="actualizarLabel">Actualizar venta</h1>
                      </div>
                      <div class="modal-body">
                        <form action="{{ route('modificar_venta',$ventasItem) }}" method="POST">
                          @method('put')
                          @csrf
                          <div class="mb-3" style="display: none">
                            <label for="id" class="form-label" >Id</label>
                            <input type="text" name="id" id="id_act{{ $ventasItem->id }}" class="form-control">
                          </div>
                          <div class="mb-3">
                              <label for="fecha" class="form-label">Fecha</label>
                              <input type="date" name="fecha" id="fecha_act{{ $ventasItem->id }}" class="form-control" >
                            </div>
                          <div class="mb-3">
                              <label for="paciente" class="form-label">Paciente</label>
                              <select name="paciente" id="paciente_act{{ $ventasItem->id }}" class="form-control">
                                @foreach ($pacientes as $pacientesItem)
                                <option value="{{$pacientesItem->id}}">({{$pacientesItem->id}}) - {{$pacientesItem->nombre}}</option>
                                @endforeach
                              </select>
                          </div>
                          <div class="mb-3">
                              <label for="servicio" class="form-label">Servicio</label>
                              <select name="servicio" id="servicio_act{{ $ventasItem->id }}" class="form-control">
                                @foreach ($servicios as $serviciosItem)
                                <option value="{{$serviciosItem->id}}">{{$serviciosItem->nombre}}</option>
                                @endforeach
                              </select>
                          </div>
                          <div class="mb-3">
                            <label for="descripcion" class="form-label">Descripcion</label>
                            <input type="text" name="descripcion" id="descripcion_act{{ $ventasItem->id }}" class="form-control" >
                          </div>
                          <div class="mb-3">
                              <label for="metodo_pago" class="form-label">Metodo de pago</label>
                              <select name="metodo_pago" id="metodo_pago_act{{ $ventasItem->id }}" class="form-control">
                                @foreach ($metodos as $metodosItem)
                                <option value="{{$metodosItem->id}}">{{$metodosItem->nombre}}</option>
                                @endforeach
                              </select>
                          </div>
                          <div class="mb-3">
                              <label for="estado_pago" class="form-label">Estado de pago</label>
                              <select name="estado_pago" id="estado_pago_act{{ $ventasItem->id }}" class="form-control">
                                @foreach ($estados as $estadosItem)
                                <option value="{{$estadosItem->id}}">{{$estadosItem->nombre}}</option>
                                @endforeach
                              </select>
                          </div>
                          <div class="mb-3">
                              <label for="monto" class="form-label">Monto</label>
                              <input type="text" inputmode="numeric" pattern="[0-9]+([\.,][0-9]+)?" name="monto" id="monto_act{{ $ventasItem->id }}" placeholder="$ 0.0" class="form-control" >
                          </div>
                          <div class="mb-3">
                              <label for="adeudo" class="form-label">Adeudo</label>
                              <input type="text" inputmode="numeric" pattern="[0-9]+([\.,][0-9]+)?" name="adeudo" id="adeudo_act{{ $ventasItem->id }}" placeholder="$ 0.0" class="form-control" >
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
                <button class="boton text-white bg-[#8b2222] hover:bg-[#471818]" data-bs-toggle="modal" data-bs-target="#eliminar{{$ventasItem->id}}">
                  <i class="icon fa-solid fa-trash-can"></i>
                </button>
  
                <div class="modal fade" id="eliminar{{$ventasItem->id}}" tabindex="-1" aria-labelledby="eliminarLabel" aria-hidden="true">
                  <div class="modal-dialog">
                    <div class="modal-content">
                      <div class="modal-header" style="background-color:#009F93">
                        <h1 class="fs-5 text-white" id="eliminarLabel">Eliminar registro</h1>
                      </div>
                      <div class="modal-body">
                        <p>¿Usted desea eliminar el registro?</p><br>
  
                        <strong>Folio: {{$ventasItem->id}}</strong><br>
                        <strong>Paciente: {{$ventasItem->paciente_n->nombre}}</strong><br>
                        <strong>Servicio: {{$ventasItem->servicio_n->nombre}}</strong><br>
                        <strong>Descripcion: {{$ventasItem->descripcion}}</strong><br><br><br>
  
                        <p>Nota: No puedes borrar un proveedor si tienes articulos del mismo en el inventario. Tienes que borrar los articulos primero.</p><br>
  
                      </div>
                      <div class="modal-footer">
                        <form action="{{route('eliminar_venta',$ventasItem->id)}}" method="POST">
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
              <td style="text-align: center" colspan="7">No hay ventras registradas</td>
            </tr>
            @endforelse
        </tbody>
      </table>  
    </div>
  </div>

  <div id=contenido class="d-flex align-items-end flex-column mb-3">
    <button class="btn btn-primary text-white bg-[#037171bb] hover:bg-[#037171]" data-bs-toggle="modal" data-bs-target="#agregar">
      <i class="fa-solid fa-circle-plus fa-lg" ></i>
      Agregar venta
    </button>
  </div>    
@endsection
@section('modales_script')
  <script>
    
    function consultar(boton, modal){
      $(modal).modal('show');
      var vars = $(boton).data('stuff');
      $('#id_con').val(vars[0]);
      $('#fecha_con').val(vars[1]);
      $('#paciente_con').val(vars[2]);
      $('#servicio_con').val(vars[3]);
      $('#descripcion_con').val(vars[4]);
      $('#metodo_pago_con').val(vars[5]);
      $('#estado_pago_con').val(vars[6]);
      $('#monto_con').val(vars[7]);
      $('#adeudo_con').val(vars[8]);
    }
    function actualizar(boton, modal, num){
      $(modal).modal('show');
      var vars = $(boton).data('stuff');
      $('#id_act'+num).val(vars[0]);
      $('#fecha_act'+num).val(vars[1]);
      $('#paciente_act'+num).val(vars[2]);
      $('#servicio_act'+num).val(vars[3]);
      $('#descripcion_act'+num).val(vars[4]);
      $('#metodo_pago_act'+num).val(vars[5]);
      $('#estado_pago_act'+num).val(vars[6]);
      $('#monto_act'+num).val(vars[7]);
      $('#adeudo_act'+num).val(vars[8]);
    }
  </script>
@endsection
@section('modales')

<div class="modal fade" id="consultar" tabindex="-1" aria-labelledby="consultarLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header" style="background-color:#009F93">
        <h1 class="fs-5 text-white" id="consultarLabel">Consultar venta</h1>
      </div>
      <div class="modal-body">
        <div class="mb-3">
            <label for="id" class="form-label" >Folio</label>
            <input type="text" name="id" id="id_con" class="form-control" readonly>
        </div>
        <div class="mb-3">
            <label for="fecha" class="form-label">Fecha</label>
            <input type="date" name="fecha" id="fecha_con" class="form-control" >
          </div>
        <div class="mb-3">
            <label for="paciente" class="form-label">Paciente</label>
            <input type="text" name="nombre" id="paciente_con" class="form-control" readonly>
        </div>
        <div class="mb-3">
            <label for="servicio" class="form-label">Servicio</label>
            <input type="text" rows="2" style="resize: none" name="servicio" id="servicio_con" class="form-control" readonly>
        </div>
        <div class="mb-3">
            <label for="descripcion" class="form-label">Descripcion</label>
            <input type="text" name="descripcion" id="descripcion_con" class="form-control" readonly>
        </div>
        <div class="mb-3">
            <label for="metodo_pago" class="form-label">Metodo de pago</label>
            <input type="text" rows="4" style="resize: none" name="metodo_pago" id="metodo_pago_con" class="form-control">
        </div>
        <div class="mb-3">
            <label for="estado_pago" class="form-label">Estado de pago</label>
            <input type="text" rows="4" style="resize: none" name="estado_pago" id="estado_pago_con" class="form-control">
        </div>
        <div class="mb-3">
            <label for="monto" class="form-label">Monto</label>
            <input type="text" rows="4" style="resize: none" name="monto" id="monto_con" class="form-control">
        </div>
        <div class="mb-3">
            <label for="adeudo" class="form-label">Adeudo</label>
            <input type="text" rows="4" style="resize: none" name="adeudo" id="adeudo_con" class="form-control">
        </div>
      </div>
      <div class="modal-footer">
        <button class="btn btn-primary text-white bg-[#037171bb] hover:bg-[#037171]" type="button" data-bs-dismiss="modal">Cerrar</button>
      </div>
    </div>
  </div>
</div>

  <div class="modal fade" id="agregar" tabindex="-1" aria-labelledby="agregarLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header" style="background-color:#009F93">
          <h1 class="fs-5 text-white" id="agregarLabel">Agregar Venta</h1>
        </div>
        <div class="modal-body">
          <form action="{{ route('registrar_venta') }}" method="POST">
            @csrf
            <div class="mb-3" style="display: none">
                <label for="id" class="form-label" >Id</label>
                <input type="text" name="id" id="id" class="form-control">
              </div>
              <div class="mb-3">
                <label for="fecha" class="form-label">Fecha</label>
                <input type="date" name="fecha" id="fecha" class="form-control" >
              </div>
              <div class="mb-3">
                  <label for="paciente" class="form-label">Paciente</label>
                  <select name="paciente" id="paciente" class="form-control">
                    @foreach ($pacientes as $pacientesItem)
                    <option value="{{$pacientesItem->id}}">({{$pacientesItem->id}}) - {{$pacientesItem->nombre}}</option>
                    @endforeach
                  </select>
              </div>
              <div class="mb-3">
                  <label for="servicio" class="form-label">Servicio</label>
                  <select name="servicio" id="servicio" class="form-control">
                    @foreach ($servicios as $serviciosItem)
                    <option value="{{$serviciosItem->id}}">{{$serviciosItem->nombre}}</option>
                    @endforeach
                  </select>
              </div>
              <div class="mb-3">
                <label for="descripcion" class="form-label">Descripcion</label>
                <input type="text" name="descripcion" id="descripcion" class="form-control" >
              </div>
              <div class="mb-3">
                  <label for="metodo_pago" class="form-label">Metodo de pago</label>
                  <select name="metodo_pago" id="metodo_pago" class="form-control">
                    @foreach ($metodos as $metodosItem)
                    <option value="{{$metodosItem->id}}">{{$metodosItem->nombre}}</option>
                    @endforeach
                  </select>
              </div>
              <div class="mb-3">
                  <label for="estado_pago" class="form-label">Estado de pago</label>
                  <select name="estado_pago" id="estado_pago" class="form-control">
                    @foreach ($estados as $estadosItem)
                    <option value="{{$estadosItem->id}}">{{$estadosItem->nombre}}</option>
                    @endforeach
                  </select>
              </div>
              <div class="mb-3">
                  <label for="monto" class="form-label">Monto</label>
                  <input type="text" inputmode="numeric" pattern="[0-9]+([\.,][0-9]+)?" name="monto" id="monto" placeholder="$ 0.0" class="form-control" >
              </div>
              <div class="mb-3">
                  <label for="adeudo" class="form-label">Adeudo</label>
                  <input type="text" inputmode="numeric" pattern="[0-9]+([\.,][0-9]+)?" name="adeudo" id="adeudo" placeholder="$ 0.0" class="form-control" >
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