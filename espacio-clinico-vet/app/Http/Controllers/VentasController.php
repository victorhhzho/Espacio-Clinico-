<?php

namespace App\Http\Controllers;

use App\Http\Requests\VentaRequest;
use App\Models\EstadoPago;
use App\Models\MetodoPago;
use App\Models\Paciente;
use App\Models\Servicio;
use App\Models\Venta;
use Illuminate\Http\Request;

class VentasController extends Controller
{
    public function index_consultar_venta(){
        $ventas = Venta::paginate();
        $pacientes = Paciente::paginate();
        $servicios = Servicio::paginate();
        $metodos = MetodoPago::paginate();
        $estados = EstadoPago::paginate();
        return view('dashboard.ventas.consultar_venta',compact('ventas','pacientes','servicios','metodos','estados'));
    }
    public function registrar_venta(VentaRequest $request){
        $venta = Venta::create($request->validated());
        return redirect()->route('consultar_venta');
    }

    public function eliminar_venta(Venta $venta){
        $venta->delete();
        return redirect()->route('consultar_venta');
    }
    
    public function modificar_venta(VentaRequest $request , Venta $venta){
        $venta->fecha = $request->fecha;
        $venta->paciente = $request->paciente;
        $venta->servicio = $request->servicio;
        $venta->descripcion = $request->descripcion;
        $venta->metodo_pago = $request->metodo_pago;
        $venta->estado_pago = $request->estado_pago;
        $venta->monto = $request->monto;
        $venta->adeudo = $request->adeudo;
        $venta->save();
        return redirect()->route('consultar_venta');
    }
}
