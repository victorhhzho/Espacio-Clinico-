@extends('layouts.plantilla')
@section('title','PANEL DE CONTROL')
@section('contenido')
<div class="titulo_pag_tran text-center align-middle font-bold">
  NOTIFICACIONES
</div>
<div id=contenido_tab_calendar class="d-flex align-items-end flex-column mb-3">
  <table class="table" id="tabla">
    <thead>
      <tr>
        <th scope="col">#</th>
        <th scope="col">Notificación</th>
        <th scope="col">Tipo</th>
        <th scope="col">Relevancia</th>
      </tr>
    </thead>
    <tbody>
                    
        @forelse ($notificaciones as $notificacionItem)
          <td scope="row"> </td>
          <td>{{ $notificacionItem->mensaje }}</td>
          <td>{{ $notificacionItem->tipo_n->nombre }}</td>
          <td>{{ $notificacionItem->estado_n->nombre }}</td>
        </tr>
        @empty
        <tr>
          <td style="text-align: center" colspan="4">No hay notificaciones</td>
        </tr>
        @endforelse
    </tbody>
  </table>
</div>
<div class="titulo_pag_tran text-center align-middle font-bold">
  CITAS PENDIENTES
</div>
<div id=contenido_tab_calendar class="d-flex align-items-end flex-column mb-3">
  <table class="table" id="tabla">
    <thead>
      <tr>
        <th scope="col">Evento</th>
        <th scope="col">Inicio</th>
        <th scope="col">Final</th>
        <th scope="col">Paciente</th>
      </tr>
    </thead>
    <tbody>
                    
        @forelse ($events as $eventsItem)
          <td>{{ $eventsItem->event }}</td>
          <td>{{ $eventsItem->start_date }}</td>
          <td>{{ $eventsItem->end_date }}</td>
          <td>{{ $eventsItem->paciente_n->nombre }}</td>
        </tr>
        @empty
        <tr>
          <td style="text-align: center" colspan="4">No hay notificaciones</td>
        </tr>
        @endforelse
    </tbody>
  </table>
</div>  
@endsection
