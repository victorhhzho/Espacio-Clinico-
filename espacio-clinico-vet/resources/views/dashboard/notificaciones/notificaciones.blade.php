@extends('layouts.plantilla')
@section('title','NOTIFICACIONES')
@section('contenido')
  <div id=contenido_tab>
    <div class="table-responsive">
      <table class="table" id="tabla">
        <thead>
          <tr>
            <th scope="col">#</th>
            <th scope="col">Notificación</th>
            <th scope="col">Tipo</th>
            <th scope="col">Relevancia</th>
            <th style="text-align: center; width:15% "  scope="col" colspan="2">Opciones</th>
          </tr>
        </thead>
        <tbody>
                        
            @forelse ($notificacion as $notificacionItem)
              <td scope="row"> </td>
              <td>{{ $notificacionItem->mensaje }}</td>
              <td>{{ $notificacionItem->tipo_n->nombre }}</td>
              <td>{{ $notificacionItem->estado_n->nombre }}</td>
              <td>
                <form action="{{route('eliminar_notificacion',$notificacionItem->id)}}" method="POST">
                  @method('delete')
                  @csrf
                  <button class="boton text-white bg-[#8b2222] hover:bg-[#471818]" style="margin-left: auto; margin-right:auto; display: block;" type="submit">
                    <i class="icon fa-solid fa-trash-can"></i>
                  </button>
                </form>
              </td>
            </tr>
            @empty
            <tr>
              <td style="text-align: center" colspan="5">No hay notificaciones</td>
            </tr>
            @endforelse
        </tbody>
      </table>
    </div>

  </div>
@endsection
@section('modales')
  <div class="modal fade" id="agregar" tabindex="-1" aria-labelledby="agregarLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header" style="background-color:#009F93">
          <h1 class="fs-5 text-white" id="agregarLabel">Agregar notificacion</h1>
        </div>
        <div class="modal-body">
          <form action="{{ route('registrar_notificacion') }}" method="POST">
            @csrf
            <div class="mb-3">
              <label for="asunto" class="form-label">Asunto</label>
              <input type="text" name="asunto" id="asunto" placeholder="Descripción" class="form-control" >
            </div>
            <div class="mb-3">
              <label for="tipo" class="form-label">Tipo</label>
              <input type="text" name="tipo" id="tipo" placeholder="inventario, Paciente, Contable" class="form-control" >
            </div>
            <div class="mb-3">
              <label for="estado" class="form-label">Estado</label>
              <input type="text" name="estado" id="estado" placeholder="Urgente, Relevante, Considerar" class="form-control" >
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
