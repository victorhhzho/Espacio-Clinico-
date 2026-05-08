<?php

namespace App\Http\Controllers;

use App\Http\Requests\UserRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function register(){
        return view('auth.register');
    }

    public function registerPost(UserRequest $request){
    //public function registerPost(Request $request){

        $user = User::create($request->validated());
/*      $user = new User();
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = Hash::make($request->password);
        
        $user->nombre = $request->nombre;
        $user->apellido_p = $request->apellido_p;
        $user->apellido_m = $request->apellido_m;
        $user->cedula = $request->cedula;
        
        $user->save();
*/
        return redirect()->route('consultar_usuarios');
    }

    public function login(){
        return view('auth.login');
    }

    public function loginPost(Request $request){
        $credentials = [
            'email' => $request->email,
            'password' => $request->password,
        ];

        if(Auth::attempt($credentials)){
            return redirect('/inicio')->with('success','Inicio sesion correctamente.');
        }
        return back()->with('error','Las credenciales no son correctas. Verifique sus datos e intentelo de nuevo.');
    }

    public function logout()
    {
        Auth::logout();
        return redirect()->route('login');
    }
}
