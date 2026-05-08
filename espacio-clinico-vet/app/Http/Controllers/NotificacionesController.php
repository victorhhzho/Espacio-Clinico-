<?php

namespace App\Http\Controllers;

use App\Http\Requests\NotificacionRequest;
use App\Models\EstadoNotificaciones;
use App\Models\Inventario;
use App\Models\Notificaciones;
use App\Models\TipoNotificaciones;
use Database\Seeders\TipoNotificacionesSeeder;
use Illuminate\Http\Request;
use PhpParser\Node\Stmt\Echo_;

class NotificacionesController extends Controller
{
    public function index(){

        $notificacion = Notificaciones::paginate();
        $tipo_notificacion = TipoNotificaciones::paginate();
        $estado_notificacion = EstadoNotificaciones::paginate();

        return view('dashboard.notificaciones.notificaciones',compact('notificacion'));
    }

    public function notificaciones_inventario(){

    }

    public function registrar_notificacion(NotificacionRequest $request){

        $notificacion = Notificaciones::create($request->validated());
        return redirect()->route('notificaciones');
    }

    public function eliminar_notificacion(Notificaciones $notificacion){
        $notificacion->delete();
        return redirect()->route('notificaciones');
    }
}