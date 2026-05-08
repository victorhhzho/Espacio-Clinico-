@extends('layouts.plantilla')
@section('title','INVENTARIO')
@section('contenido')
  <div id=contenido_tab>
    <div class="table-responsive">
      <table class="table" id="tabla">
        <thead>
          <tr>
            <th scope="col">Folio</th>
            <th scope="col">Articulo</th>
            <th scope="col">Tipo</th>
            <th style="text-align: center; width:5% " scope="col">Unidades</th>
            <th style="text-align: center; width:15% "  scope="col" colspan="3">Opciones</th>
          </tr>
        </thead>
        <tbody>
                        
            @forelse ($inventario as $inventarioItem)
              <td scope="row">{{ $inventarioItem->id }}</td>
              <td>{{ $inventarioItem->articulo }}</td>
              <td>{{ $inventarioItem->tipo_inv->nombre }}</td>
              <td style="text-align: center">{{ $inventarioItem->unidades }}</td>
              <td>
                <div id="btn_con{{ $inventarioItem->id }}" class="boton text-white bg-[#abad28] hover:bg-[#75761a]" data-stuff='["{{ $inventarioItem->id }}","{{ $inventarioItem->articulo }}","{{ $inventarioItem->proveedor_inv->nombre }}","{{ $inventarioItem->tipo_inv->nombre }}","{{ $inventarioItem->descripcion }}","{{ $inventarioItem->unidades }}","{{ $inventarioItem->unidades_min }}","{{ $inventarioItem->precio_vet }}","{{ $inventarioItem->precio_pub }}"]' onclick="consultar('#btn_con{{ $inventarioItem->id }}','#consultar')">
                  <i class="icon fa-solid fa-circle-info"></i>
                </div> 
              </td>
              <td>
                <div id="btn_act{{ $inventarioItem->id }}" class="boton text-white bg-[#3c74ed] hover:bg-[#2c4780]" data-stuff='["{{ $inventarioItem->id }}","{{ $inventarioItem->articulo }}","{{ $inventarioItem->proveedor }}","{{ $inventarioItem->tipo}}","{{ $inventarioItem->descripcion }}","{{ $inventarioItem->unidades }}","{{ $inventarioItem->unidades_min }}","{{ $inventarioItem->precio_vet }}","{{ $inventarioItem->precio_pub }}"]' onclick="actualizar('#btn_act{{ $inventarioItem->id }}','#actualizar{{ $inventarioItem->id }}','{{ $inventarioItem->id}}')">
                  <i class="icon fa-solid fa-pen-to-square"></i>
                </div>
  
                <div class="modal fade" id="actualizar{{$inventarioItem->id}}" tabindex="-1" aria-labelledby="actualizarLabel" aria-hidden="true">
                  <div class="modal-dialog">
                    <div class="modal-content">
                      <div class="modal-header" style="background-color:#009F93">
                        <h1 class="fs-5 text-white" id="actualizarLabel">Actualizar articulo</h1>
                      </div>
                      <div class="modal-body">
                        <form action="{{ route('modificar_inventario',$inventarioItem) }}" method="POST">
                          @method('put')
                          @csrf
                          <div class="mb-3" style="display: none">
                            <label for="id" class="form-label" >Id</label>
                            <input type="text" name="id" id="id_act{{ $inventarioItem->id }}" class="form-control" >
                          </div>
                          <div class="mb-3">
                            <label for="articulo" class="form-label">Nombre</label>
                            <input type="text" name="articulo" id="articulo_act{{ $inventarioItem->id }}" class="form-control" >
                          </div>
                          <div class="mb-3">
                            <label for="proveedor" class="form-label">Proveedor</label>
                            <select name="proveedor" id="proveedor_act{{ $inventarioItem->id }}" class="form-control">
                              @foreach ($proveedor as $proveedorItem)
                              <option value="{{$proveedorItem->id}}">{{$proveedorItem->nombre}}</option>
                              @endforeach
                            </select>
                          </div>
                          <div class="mb-3">
                            <label for="tipo" class="form-label">Tipo</label>
                            <select name="tipo" id="tipo_act{{ $inventarioItem->id }}" class="form-control">
                              @foreach ($tipoarticulo as $tipoarticuloItem)
                              <option value="{{$tipoarticuloItem->id}}">{{$tipoarticuloItem->nombre}}</option>
                              @endforeach
                            </select>
                          </div>
                          <div class="mb-3">
                            <label for="descripcion" class="form-label">Descripción</label>
                            <textarea type="text" rows="4" style="resize: none" id="descripcion_act{{ $inventarioItem->id }}" class="form-control"></textarea>
                          </div>
                          <div class="mb-3">
                            <label for="unidades" class="form-label">Unidades disponibles</label>
                            <input type="number" min="0" name="unidades" id="unidades_act{{ $inventarioItem->id }}" class="form-control" >
                          </div>
                          <div class="mb-3">
                            <label for="unidades_min" class="form-label">Unidades minimas</label>
                            <input type="number" min="0" name="unidades_min" id="unidades_min_act{{ $inventarioItem->id }}" class="form-control" >
                          </div>
                          <div class="mb-3">
                            <label for="precio_vet" class="form-label">Precio proveedor</label>
                            <input type="text" inputmode="numeric" pattern="[0-9]+([\.,][0-9]+)?" name="precio_vet" id="precio_vet_act{{ $inventarioItem->id }}" class="form-control" >
                          </div>
                          <div class="mb-3">
                            <label for="precio_pub" class="form-label">Precio comercial</label>
                            <input type="text" inputmode="numeric" pattern="[0-9]+([\.,][0-9]+)?" name="precio_pub" id="precio_pub_act{{ $inventarioItem->id }}" class="form-control">
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
                  <button class="boton text-white bg-[#8b2222] hover:bg-[#471818]" data-bs-toggle="modal" data-bs-target="#eliminar{{$inventarioItem->id}}">
                    <i class="icon fa-solid fa-trash-can"></i>
                  </button>
  
                <div class="modal fade" id="eliminar{{$inventarioItem->id}}" tabindex="-1" aria-labelledby="eliminarLabel" aria-hidden="true">
                  <div class="modal-dialog">
                    <div class="modal-content">
                      <div class="modal-header" style="background-color:#009F93">
                        <h1 class="fs-5 text-white" id="eliminarLabel">Eliminar registro</h1>
                      </div>
                      <div class="modal-body">
                        <p>¿Usted desea eliminar el registro?</p><br>
  
                        <strong>Folio: {{$inventarioItem->id}}</strong><br>
                        <strong>Articulo: {{$inventarioItem->articulo}}</strong><br>
                        <strong>Unidades: {{$inventarioItem->unidades}}</strong><br>
                        <strong>Proveedor: {{$inventarioItem->proveedor}}</strong><br>
                      </div>
                      <div class="modal-footer">
                        <form action="{{route('eliminar_inventario',$inventarioItem->id)}}" method="POST">
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
              <td style="text-align: center" colspan="7">No hay articulos en el inventario</td>
            </tr>
            @endforelse
        </tbody>
      </table>
    </div>
  </div>

  <div id=contenido class="d-flex align-items-end flex-column mb-3">
    <button class="btn btn-primary text-white bg-[#037171bb] hover:bg-[#037171]" data-bs-toggle="modal" data-bs-target="#agregar">
      <i class="fa-solid fa-circle-plus fa-lg" ></i>
      Agregar articulo
    </button>
  </div>    
@endsection
@section('modales_script')
  <script>
    
    function consultar(boton, modal){
      $(modal).modal('show');
      var vars = $(boton).data('stuff');
      $('#id_con').val(vars[0]);
      $('#articulo_con').val(vars[1]);
      $('#proveedor_con').val(vars[2]);
      $('#tipo_con').val(vars[3]);
      $('#descripcion_con').val(vars[4]);
      $('#unidades_con').val(vars[5]);
      $('#unidades_min_con').val(vars[6]);
      $('#precio_vet_con').val(vars[7]);
      $('#precio_pub_con').val(vars[8]);
    }
    function actualizar(boton, modal, num){
      $(modal).modal('show');

      var vars = $(boton).data('stuff');
      $('#id_act'+num).val(vars[0]);
      $('#articulo_act'+num).val(vars[1]);
      $('#proveedor_act'+num).val(vars[2]);
      $('#tipo_act'+num).val(vars[3]);
      $('#descripcion_act'+num).val(vars[4]);
      $('#unidades_act'+num).val(vars[5]);
      $('#unidades_min_act'+num).val(vars[6]);
      $('#precio_vet_act'+num).val(vars[7]);
      $('#precio_pub_act'+num).val(vars[8]);
    }
  </script>
@endsection
@section('modales')

<div class="modal fade" id="consultar" tabindex="-1" aria-labelledby="consultarLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header" style="background-color:#009F93">
        <h1 class="fs-5 text-white" id="consultarLabel">Consultar articulo</h1>
      </div>
      <div class="modal-body">
        <div class="mb-3">
          <label class="form-label">Id</label>
          <input type="text" id="id_con" class="form-control" readonly>
        </div>
        <div class="mb-3">
          <label class="form-label">Articulo</label>
          <input type="text" id="articulo_con" class="form-control" readonly>
        </div>
        <div class="mb-3">
          <label class="form-label">Proveedor</label>
          <input type="text" id="proveedor_con" class="form-control" readonly>
        </div>
        <div class="mb-3">
          <label class="form-label">Tipo</label>
          <input type="text" id="tipo_con" class="form-control" readonly>
        </div>
        <div class="mb-3">
          <label class="form-label">Descripción</label>
          <textarea type="text" rows="4" style="resize: none" id="descripcion_con" class="form-control" readonly></textarea>
        </div>
        <div class="mb-3">
          <label class="form-label">Unidades disponibles</label>
          <input type="text" id="unidades_con" class="form-control" readonly>
        </div>
        <div class="mb-3">
          <label class="form-label">Unidades minimas</label>
          <input type="text" id="unidades_min_con" class="form-control" readonly>
        </div>
        <div class="mb-3">
          <label class="form-label">Precio de proveedor</label>
          <input type="text" id="precio_vet_con" class="form-control" readonly>
        </div>
        <div class="mb-3">
          <label class="form-label">Precio comercial</label>
          <input type="text" id="precio_pub_con" class="form-control" readonly>
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
          <h1 class="fs-5 text-white" id="agregarLabel">Agregar articulo</h1>
        </div>
        <div class="modal-body">
          <form action="{{ route('registrar_inventario') }}" method="POST">
            @csrf
            <div class="mb-3">
              <label for="articulo" class="form-label">Nombre</label>
              <input type="text" name="articulo" id="articulo" placeholder="Nombre del articulo" class="form-control" >
            </div>
            <div class="mb-3">
              <label for="proveedor" class="form-label">Proveedor</label>
              <select name="proveedor" id="proveedor" class="form-control">
                @foreach ($proveedor as $proveedorItem)
                <option value="{{$proveedorItem->id}}">{{$proveedorItem->nombre}}</option>
                @endforeach
              </select>
            </div>
            <div class="mb-3">
              <label for="tipo" class="form-label">Tipo</label>
              <select name="tipo" id="tipo" class="form-control">
                @foreach ($tipoarticulo as $tipoarticuloItem)
                <option value="{{$tipoarticuloItem->id}}">{{$tipoarticuloItem->nombre}}</option>
                @endforeach
              </select>
            </div>
            <div class="mb-3">
              <label for="descripcion" class="form-label">Descripción</label>
              <textarea name="descripcion" rows="4" style="resize: none" id="descripcion" placeholder="Descripcion del articulo" class="form-control"></textarea>
            </div>
            <div class="mb-3">
              <label for="unidades" class="form-label">Unidades disponibles</label>
              <input type="number" min="0" name="unidades" id="unidades" placeholder="0" class="form-control" >
            </div>
            <div class="mb-3">
              <label for="unidades_min" class="form-label">Unidades minimas</label>
              <input type="number" min="0" name="unidades_min" id="unidades_min" placeholder="0" class="form-control" >
            </div>
            <div class="mb-3">
              <label for="precio_vet" class="form-label">Precio proveedor</label>
              <input type="text" inputmode="numeric" pattern="[0-9]+([\.,][0-9]+)?" name="precio_vet" id="precio_vet" placeholder="$ 0.0" class="form-control" >
            </div>
            <div class="mb-3">
              <label for="precio_pub" class="form-label">Precio comercial</label>
              <input type="text" inputmode="numeric" pattern="[0-9]+([\.,][0-9]+)?" name="precio_pub" id="precio_pub" placeholder="$ 0.0" class="form-control" >
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