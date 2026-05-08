<?php

namespace App\Http\Controllers;

use App\Http\Requests\EventRequest;
use App\Models\Event;
use App\Models\Paciente;
use Illuminate\Http\Request;

class CalendarController extends Controller
{
    public function index(){
        
        $all_events = Event::all();
        $events = [];
        foreach($all_events as $event){
            $events[] = [
                'title' => $event->event,
                'start' => $event->start_date,
                'end' => $event->end_date,
            ];
        }
        $pacientes = Paciente::paginate();
        $eventos = Event::paginate();
        return view('dashboard.agenda.agenda', compact('eventos','events','pacientes'));
    }

    public function registrar_evento(EventRequest $request){
        $event = Event::create($request->validated());
        return redirect()->route('agenda');
    }

    public function eliminar_evento(Event $event){
        $event->delete();
        return redirect()->route('agenda');
    }
    
    public function modificar_evento(EventRequest $request, Event $event){
        $event->event = $request->event;
        $event->start_date = $request->start_date;
        $event->end_date = $request->end_date;
        $event->paciente = $request->paciente;
        $event->save();
        return redirect()->route('agenda');
    }

}

