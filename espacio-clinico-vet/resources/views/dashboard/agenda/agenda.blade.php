@extends('layouts.plantilla')
@section('calendar_script')
  <script src='https://cdn.jsdelivr.net/npm/fullcalendar@6.1.8/index.global.min.js'></script>
  <script>
    document.addEventListener('DOMContentLoaded', function() {
      var calendarEl = document.getElementById('calendar');
      var calendar = new FullCalendar.Calendar(calendarEl, {
        initialView: 'dayGridMonth',
        locale:"es",
        navLinks: true,
        titleFormat:{
          weekday: 'short',
          month: '2-digit',
          year: '2-digit',
          day: '2-digit',
        },
        headerToolbar:{
          start: '', // will normally be on the left. if RTL, will be on the right
          center: 'title',
          end:''
        },
        footerToolbar:{
          start: 'today,list prev,next', // will normally be on the left. if RTL, will be on the right
          center: '',
          end:'dayGridMonth'
        },
        buttonText:{
          today: 'Hoy',
          list: 'Listar act',
          dayGridMonth: 'Calendario'
        },
        dayMaxEventRows: true, // for all non-TimeGrid views
        views: {
          timeGrid: {
            dayMaxEventRows: 12 // adjust to 6 only for timeGridWeek/timeGridDay
          }
        },
        /*dateClick:function(info){
          $('#agregar').modal('show');
          $('#date').val(info.dateStr);
        },*/
        events: @json($events)           
        });
      calendar.render();
    });
  </script>
@endsection

@section('title','AGENDA DE CITAS')

@section('contenido')
  <div id=contenido>
    <button class="btn btn-primary text-white bg-[#037171bb] hover:bg-[#037171]" data-bs-toggle="modal" data-bs-target="#agregar">
      <i class="fa-regular fa-calendar-plus fa-lg" ></i>
      Agregar evento
    </button>
  </div>
  <div id='calendar'></div>


  <div id=contenido_tab_calendar>
    <div class="table-responsive">
      <table class="table" id="tabla">
        <thead>
          <tr>
            <th style="width:20%"scope="col">Evento</th>
            <th style="width:20%"scope="col">Inicio</th>
            <th style="width:20%" scope="col">Final</th>
            <th style="text-align: center; scope="col">Paciente</th>
            <th style="text-align: center; width:10%"  scope="col" colspan="3">Opciones</th>
          </tr>
        </thead>
        <tbody>     
            @forelse ($eventos as $eventsItem)
              <td>{{ $eventsItem->event }}</td>
              <td>{{ $eventsItem->start_date }}</td>
              <td>{{ $eventsItem->end_date }}</td>
              <td style="text-align: center">{{ $eventsItem->paciente_n->nombre }}</td>
              <td>
                <button id="btn_act{{ $eventsItem->id }}" class="boton text-white bg-[#3c74ed] hover:bg-[#2c4780]" data-stuff='["{{ $eventsItem->id }}","{{ $eventsItem->event }}","{{ $eventsItem->start_date }}","{{ $eventsItem->end_date }}","{{ $eventsItem->paciente}}"]' onclick="actualizar('#btn_act{{ $eventsItem->id }}','#actualizar{{ $eventsItem->id }}','{{ $eventsItem->id}}')">
                  <i class="icon fa-solid fa-pen-to-square"></i>
                </button>
  
  
                <div class="modal fade" id="actualizar{{$eventsItem->id}}" tabindex="-1" aria-labelledby="actualizarLabel" aria-hidden="true">
                  <div class="modal-dialog">
                    <div class="modal-content">
                      <div class="modal-header" style="background-color:#009F93">
                        <h1 class="fs-5 text-white" id="actualizarLabel">Actualizar evento</h1>
                      </div>
                      <div class="modal-body">
                        <form action="{{ route('modificar_evento',$eventsItem) }}" method="POST">
                          @method('put')
                          @csrf
                          <div class="mb-3">
                            <label for="event" class="form-label">Asunto</label>
                            <input type="text" name="event" id="event_act{{$eventsItem->id}}" class="form-control" >
                          </div>
                          <div class="mb-1">
                            <label for="start_date" class="form-label">Inicio del evento</label>
                            <input type="datetime-local" name="start_date" id="start_date_act{{$eventsItem->id}}" required="" class="form-control">
                            <label for="end_date" class="form-label">Final del evento</label>
                            <input type="datetime-local" name="end_date" id="end_date_act{{$eventsItem->id}}" required="" class="form-control">
                          </div>
                          <div class="mb-3">
                            <label for="paciente" class="form-label">Paciente</label>
                            <select name="paciente" id="paciente_act{{$eventsItem->id}}" class="form-control">
                              @foreach ($pacientes as $pacientesItem)
                              <option value="{{$pacientesItem->id}}">({{$pacientesItem->id}}) - {{$pacientesItem->nombre}}</option>
                              @endforeach
                            </select>
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
                <button class="boton text-white bg-[#8b2222] hover:bg-[#471818]" data-bs-toggle="modal" data-bs-target="#eliminar{{$eventsItem->id}}">
                  <i class="icon fa-solid fa-trash-can"></i>
                </button>
  
                <div class="modal fade" id="eliminar{{$eventsItem->id}}" tabindex="-1" aria-labelledby="eliminarLabel" aria-hidden="true">
                  <div class="modal-dialog">
                    <div class="modal-content">
                      <div class="modal-header" style="background-color:#009F93">
                        <h1 class="fs-5 text-white" id="eliminarLabel">Eliminar registro</h1>
                      </div>
                      <div class="modal-body">
                        <p>¿Usted desea eliminar el registro?</p><br>
  
                        <strong>Id: {{$eventsItem->id}}</strong><br>
                        <strong>Proveedor: {{$eventsItem->event}}</strong><br>
                        <strong>Inicio del evento: {{$eventsItem->start_date}}</strong><br>
                        <strong>Final del evento: {{$eventsItem->end_date}}</strong><br>
                        <strong>Paciente: {{$eventsItem->paciente_n->nombre}}</strong><br><br><br>
  
                      </div>
                      <div class="modal-footer">
                        <form action="{{route('eliminar_evento',$eventsItem->id)}}" method="POST">
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
              <td style="text-align: center" colspan="7">No hay eventos en registrados</td>
            </tr>
            @endforelse
        </tbody>
      </table>
    </div>

  </div> 
@endsection
@section('modales_script')
  <script>
    function actualizar(boton, modal, num){
      $(modal).modal('show');
      var vars = $(boton).data('stuff');
      $('#id_act'+num).val(vars[0]);
      $('#event_act'+num).val(vars[1]);
      $('#start_date_act'+num).val(vars[2]);
      $('#end_date_act'+num).val(vars[3]);
      $('#paciente_act'+num).val(vars[4]);
    }
  </script>
@endsection
@section('modales')
  <div class="modal fade" id="agregar" tabindex="-1" aria-labelledby="agregarLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header" style="background-color:#009F93">
          <h1 class="fs-5 text-white" id="agregarLabel">Agregar evento</h1>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <form action="{{ route('registrar_evento') }}" method="POST">
            @csrf
            <div class="mb-3">
              <label for="event" class="form-label">Asunto</label>
              <input type="text" name="event" id="event" class="form-control" >
            </div>
            <div class="mb-1">
              <label for="start_date" class="form-label">Inicio del evento</label>
              <input type="datetime-local" name="start_date" id="start_date" required="" class="form-control">
              <label for="end_date" class="form-label">Final del evento</label>
              <input type="datetime-local" name="end_date" id="end_date" required="" class="form-control">
            </div>
            <div class="mb-3">
              <label for="paciente" class="form-label">Paciente</label>
              <select name="paciente" id="paciente" class="form-control">
                @foreach ($pacientes as $pacientesItem)
                <option value="{{$pacientesItem->id}}">({{$pacientesItem->id}}) - {{$pacientesItem->nombre}}</option>
                @endforeach
              </select>
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