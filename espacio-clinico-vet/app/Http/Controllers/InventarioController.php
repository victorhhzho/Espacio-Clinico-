<?php

namespace App\Http\Controllers;

use App\Http\Requests\InventarioRequest;
use App\Http\Requests\ProveedorRequest;
use App\Models\Inventario;
use App\Models\Notificaciones;
use App\Models\Proveedor;
use App\Models\TipoArticulo;
use Illuminate\Http\Request;

class InventarioController extends Controller
{
    public function index_consultar_inventario(){
        $inventario = Inventario::paginate();
        $proveedor = Proveedor::paginate();
        $tipoarticulo = TipoArticulo::paginate();

        return view('dashboard.inventario.inventario',compact('inventario','proveedor','tipoarticulo'));
    }

    public function registrar_inventario(InventarioRequest $request){
        $inventario = Inventario::create($request->validated());
        return redirect()->route('consultar_inventario');
    }

    public function eliminar_inventario(Inventario $inventario){
        $inventario->delete();
        return redirect()->route('consultar_inventario');
    }

    public function modificar_inventario(InventarioRequest $request ,Inventario $inventario){    
        $inventario->articulo = $request->articulo;
        $inventario->proveedor = $request->proveedor;
        $inventario->tipo = $request->tipo;
        $inventario->descripcion = $request->descripcion;
        $inventario->unidades = $request->unidades;
        $inventario->unidades_min = $request->unidades_min;
        $inventario->precio_vet = $request->precio_vet;
        $inventario->precio_pub = $request->precio_pub;
        $inventario->save();

        $inventariover = Inventario::paginate();
            if($inventario->unidades < $inventario->unidades_min){  
            $obj = json_decode($inventario);
            date_default_timezone_set('America/Mexico_City');
            $fecha = date("Y-m-d");
                $notificacion = [
                    'mensaje' => 'Hace falta '.$obj->articulo,
                    'tipo' => '4',
                    'estado' => '1',
                    'fecha_aviso' => $fecha,
                ];
                    Notificaciones::create($notificacion);
            }
        return redirect()->route('consultar_inventario');
    }



    public function index_consultar_proveedor(){
        $proveedor = Proveedor::paginate();
        return view('dashboard.inventario.proveedor',compact('proveedor'));
    }

    public function registrar_proveedor(ProveedorRequest $request){
        $proveedor = Proveedor::create($request->validated());
        return redirect()->route('consultar_proveedor');
    }

    public function eliminar_proveedor(Proveedor $proveedor){
        $inventario = Inventario::paginate();
        foreach ($inventario as $inventarios) {
            if($inventarios->proveedor == $proveedor->id){
                return redirect()->route('consultar_proveedor');
            }
        }
        $proveedor->delete();
        return redirect()->route('consultar_proveedor');
    }
    
    public function modificar_proveedor(ProveedorRequest $request , Proveedor $proveedor){
        $proveedor->nombre = $request->nombre;
        $proveedor->direccion = $request->direccion;
        $proveedor->telefono = $request->telefono;
        $proveedor->observaciones = $request->observaciones;
        $proveedor->save();
        return redirect()->route('consultar_proveedor');
    }
}
