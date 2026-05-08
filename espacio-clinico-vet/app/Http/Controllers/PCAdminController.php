<?php

namespace App\Http\Controllers;

use App\Http\Requests\ModUserRequest;
use App\Http\Requests\UserRequest;
use DB;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB as FacadesDB;

class PCAdminController extends Controller
{
    public function index_panel_control_admin(){
        return view('dashboard.administrador.panel_administrador');
    }
    public function index_consultar_usuarios(){
        
        $user = User::paginate();
        return view('dashboard.administrador.consultar_usuarios',compact('user'));
    }

    public function mostrar_usuario($id){    
        
        $user = User::find($id);

        return view('dashboard.administrador.perfil_usuario', compact('user'));
    }

    public function modificar_usuario(ModUserRequest $request ,User $user){    
        if($user->id == 1){
            return redirect()->route('consultar_usuarios');
        }  
        else{
            $user->nombre = $request->nombre;
            $user->apellido_p = $request->apellido_p;
            $user->apellido_m = $request->apellido_m;
            $user->cedula = $request->cedula;
    
            $user->name = $request->name;
            $user->email = $request->email;
    
            $user->update();
            return redirect()->route('consultar_usuarios');
        }

    }

    public function eliminar_usuario(User $user){
        if($user->id == 1){
            return redirect()->route('consultar_usuarios');
        }    
        else{
            $user->delete();
            return redirect()->route('consultar_usuarios');
        }
    }
}
        

            
