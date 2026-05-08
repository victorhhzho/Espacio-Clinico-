@extends('layouts.plantilla')
@section('title','PROVEEDORES')
@section('contenido')
  <div id=contenido_tab>
    <div class="table-responsive">
      <table class="table" id="tabla">
        <thead>
          <tr>
            <th scope="col">Id</th>
            <th scope="col">Nombre</th>
            <th scope="col">Direccion</th>
            <th scope="col">Telefono</th>
            <th style="text-align: center; width:15%"  scope="col" colspan="3">Opciones</th>
          </tr>
        </thead>
        <tbody>
                        
            @forelse ($proveedor as $proveedoresItem)
              <td scope="row">{{ $proveedoresItem->id }}</td>
              <td>{{ $proveedoresItem->nombre }}</td>
              <td>{{ $proveedoresItem->direccion }}</td>
              <td>{{ $proveedoresItem->telefono }}</td>
              <td>
                <button id="btn_con{{ $proveedoresItem->id }}" class="boton text-white bg-[#abad28] hover:bg-[#75761a]" data-stuff='["{{ $proveedoresItem->id }}","{{ $proveedoresItem->nombre }}","{{ $proveedoresItem->direccion }}","{{ $proveedoresItem->telefono }}","{{ $proveedoresItem->observaciones}}"]' onclick="consultar('#btn_con{{ $proveedoresItem->id }}','#consultar')">
                  <i class="icon fa-solid fa-circle-info"></i>
                </button> 
              </td>
              <td>
                <button id="btn_act{{ $proveedoresItem->id }}" class="boton text-white bg-[#3c74ed] hover:bg-[#2c4780]" data-stuff='["{{ $proveedoresItem->id }}","{{ $proveedoresItem->nombre }}","{{ $proveedoresItem->direccion }}","{{ $proveedoresItem->telefono }}","{{ $proveedoresItem->observaciones}}"]' onclick="actualizar('#btn_act{{ $proveedoresItem->id }}','#actualizar{{ $proveedoresItem->id }}','{{ $proveedoresItem->id}}')">
                  <i class="icon fa-solid fa-pen-to-square"></i>
                </button>
  
  
                <div class="modal fade" id="actualizar{{$proveedoresItem->id}}" tabindex="-1" aria-labelledby="actualizarLabel" aria-hidden="true">
                  <div class="modal-dialog">
                    <div class="modal-content">
                      <div class="modal-header" style="background-color:#009F93">
                        <h1 class="fs-5 text-white" id="actualizarLabel">Actualizar proveedor</h1>
                      </div>
                      <div class="modal-body">
                        <form action="{{ route('modificar_proveedor',$proveedoresItem) }}" method="POST">
                          @method('put')
                          @csrf
                          <div class="mb-3" style="display: none">
                            <label for="id" class="form-label" >Id</label>
                            <input type="text" name="id" id="id_act{{ $proveedoresItem->id }}" class="form-control">
                          </div>
                          <div class="mb-3">
                            <label for="nombre" class="form-label">Nombre</label>
                            <input type="text" name="nombre" id="nombre_act{{ $proveedoresItem->id }}" class="form-control" >
                          </div>
                          <div class="mb-3">
                            <label for="direccion" class="form-label">Direccion</label>
                            <textarea type="text" rows="2" style="resize: none" name="direccion" id="direccion_act{{ $proveedoresItem->id }}" class="form-control"></textarea>
                          </div>
                          <div class="mb-3">
                            <label for="telefono" class="form-label">Telefono</label>
                            <input type="tel" name="telefono" id="telefono_act{{ $proveedoresItem->id }}" class="form-control" >
                          </div>
                          <div class="mb-3">
                            <label for="observaciones" class="form-label">Observaciones</label>
                            <textarea type="text" rows="4" style="resize: none" name="observaciones" id="observaciones_act{{ $proveedoresItem->id }}" class="form-control"></textarea>
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
                <button class="boton text-white bg-[#8b2222] hover:bg-[#471818]" data-bs-toggle="modal" data-bs-target="#eliminar{{$proveedoresItem->id}}">
                  <i class="icon fa-solid fa-trash-can"></i>
                </button>
  
                <div class="modal fade" id="eliminar{{$proveedoresItem->id}}" tabindex="-1" aria-labelledby="eliminarLabel" aria-hidden="true">
                  <div class="modal-dialog">
                    <div class="modal-content">
                      <div class="modal-header" style="background-color:#009F93">
                        <h1 class="fs-5 text-white" id="eliminarLabel">Eliminar registro</h1>
                      </div>
                      <div class="modal-body">
                        <p>¿Usted desea eliminar el registro?</p><br>
  
                        <strong>Folio: {{$proveedoresItem->id}}</strong><br>
                        <strong>Proveedor: {{$proveedoresItem->nombre}}</strong><br>
                        <strong>Dirección: {{$proveedoresItem->direccion}}</strong><br>
                        <strong>Telefono: {{$proveedoresItem->telefono}}</strong><br><br><br>
  
                        <p>Nota: No puedes borrar un proveedor si tienes articulos del mismo en el inventario. Tienes que borrar los articulos primero.</p><br>
  
                      </div>
                      <div class="modal-footer">
                        <form action="{{route('eliminar_proveedor',$proveedoresItem->id)}}" method="POST">
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
              <td style="text-align: center" colspan="7">No hay proveedores en registrados</td>
            </tr>
            @endforelse
        </tbody>
      </table>
    </div>
  </div>

  <div id=contenido class="d-flex align-items-end flex-column mb-3">
    <button class="btn btn-primary text-white bg-[#037171bb] hover:bg-[#037171]" data-bs-toggle="modal" data-bs-target="#agregar">
      <i class="fa-solid fa-circle-plus fa-lg" ></i>
      Agregar proveedor
    </button>
  </div>    
@endsection
@section('modales_script')
  <script>
    
    function consultar(boton, modal){
      $(modal).modal('show');
      var vars = $(boton).data('stuff');
      $('#id_con').val(vars[0]);
      $('#nombre_con').val(vars[1]);
      $('#direccion_con').val(vars[2]);
      $('#telefono_con').val(vars[3]);
      $('#observaciones_con').val(vars[4]);
    }
    function actualizar(boton, modal, num){
      $(modal).modal('show');
      var vars = $(boton).data('stuff');
      $('#id_act'+num).val(vars[0]);
      $('#nombre_act'+num).val(vars[1]);
      $('#direccion_act'+num).val(vars[2]);
      $('#telefono_act'+num).val(vars[3]);
      $('#observaciones_act'+num).val(vars[4]);
    }
  </script>
@endsection
@section('modales')

<div class="modal fade" id="consultar" tabindex="-1" aria-labelledby="consultarLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header" style="background-color:#009F93">
        <h1 class="fs-5 text-white" id="consultarLabel">Consultar proveedor</h1>
      </div>
      <div class="modal-body">
        <div class="mb-3">
          <label for="id" class="form-label" >Id</label>
          <input type="text" name="id" id="id_con" class="form-control" readonly>
        </div>
        <div class="mb-3">
          <label for="nombre" class="form-label">Nombre</label>
          <input type="text" name="nombre" id="nombre_con" class="form-control" readonly>
        </div>
        <div class="mb-3">
          <label for="direccion" class="form-label">Direccion</label>
          <textarea type="text" rows="2" style="resize: none" name="direccion" id="direccion_con" class="form-control" readonly></textarea>
        </div>
        <div class="mb-3">
          <label for="telefono" class="form-label">Telefono</label>
          <input type="tel" name="telefono" id="telefono_con" class="form-control" readonly>
        </div>
        <div class="mb-3">
          <label for="observaciones" class="form-label">Observaciones</label>
          <textarea type="text" rows="4" style="resize: none" name="observaciones" id="observaciones_con" class="form-control"></textarea>
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
          <h1 class="fs-5 text-white" id="agregarLabel">Agregar proveedor</h1>
        </div>
        <div class="modal-body">
          <form action="{{ route('registrar_proveedor') }}" method="POST">
            @csrf
            <div class="mb-3" style="display: none">
              <label for="id" class="form-label" >Id</label>
              <input type="text" name="id" id="id" class="form-control" >
            </div>
            <div class="mb-3">
              <label for="nombre" class="form-label">Nombre</label>
              <input type="text" name="nombre" id="nombre" class="form-control" >
            </div>
            <div class="mb-3">
              <label for="direccion" class="form-label">Direccion</label>
              <textarea type="text" rows="2" style="resize: none" name="direccion" id="direccion" class="form-control" ></textarea>
            </div>
            <div class="mb-3">
              <label for="telefono" class="form-label">Telefono</label>
              <input type="tel" name="telefono" id="telefono" class="form-control" >
            </div>
            <div class="mb-3">
              <label for="observaciones" class="form-label">Observaciones</label>
              <textarea type="text" rows="4" style="resize: none" name="observaciones" id="observaciones" class="form-control"></textarea>
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