@extends('layouts.plantilla')
@section('title','REGISTRAR USUARIO')
@section('contenido')
  <div class="formulario">
    <div class="items-center justify-center px-6 py-8 mx-auto">
        <div class="w-full bg-[#009F93] rounded-lg shadow md:mt-0 sm:max-w-md xl:p-4">
            <div class="p-6 space-y-4 md:space-y-6 sm:p-8">
                <h1 class="text-2xl font-bold leading-tight text-center tracking-tight text-white md:text-2x">
                    Formulario de registro
                </h1>
                <form class="space-y-4 md:space-y-6" action="{{ route('register') }}" method="POST">
                    @csrf

                    <hr class="my-6 text-gray-600" style="border-width:4px;">  
                    
                    <h1 class="text-xl font-bold leading-tight text-center tracking-tight text-white md:text-2x">
                        Información personal
                    </h1>

                    <div>
                        {!! $errors->first('nombre','<small style="color: rgba(255, 0, 0, 0.313)">:message</small>') !!}
                        <label for="nombre" class="block mb-2 text-base font-medium text-white">Nombre: </label>
                        <input type="text" name="nombre" id="nombre" placeholder="nombre" required="" class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-[#009F93] focus:border-[#009F93] block w-full p-2.5">
                    </div>
                    <div>
                        {!! $errors->first('apellido_p','<small style="color: rgba(255, 0, 0, 0.313)">:message</small>') !!}
                        <label for="apellido_p" class="block mb-2 text-base font-medium text-white">Apellido Parterno: </label>
                        <input type="text" name="apellido_p" id="apellido_p" placeholder="apellido paterno" required="" class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-[#009F93] focus:border-[#009F93] block w-full p-2.5">
                    </div>
                    <div>
                        {!! $errors->first('apellido_m','<small style="color: rgba(255, 0, 0, 0.313)">:message</small>') !!}
                        <label for="apellido_m" class="block mb-2 text-base font-medium text-white">Apellido Materno: </label>
                        <input type="text" name="apellido_m" id="apellido_m" placeholder="apellido materno" required="" class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg block w-full p-2.5">
                    </div>
                    <div>
                        {!! $errors->first('cedula','<small style="color: rgba(255, 0, 0, 0.313)">:message</small>') !!}
                        <label for="cedula" class="block mb-2 text-base font-medium text-white">Cedula</label>
                        <input type="text" name="cedula" id="cedula" placeholder="123456789"  required="" class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg block w-full p-2.5">
                    </div>


                    <hr class="my-6 text-gray-600" style="border-width:4px;">  
                    
                    <h1 class="text-xl font-bold leading-tight text-center tracking-tight text-white md:text-2x">
                        Información de usuario
                    </h1>

                    <div>
                        {!! $errors->first('name','<small style="color: rgba(255, 0, 0, 0.313)">:message</small>') !!}
                        <label for="name" class="block mb-2 text-base font-medium text-white">Usuario: </label>
                        <input type="text" name="name" id="name" placeholder="usuario" required=""  required="" class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg block w-full p-2.5">
                    </div>
                    <div>
                        {!! $errors->first('email','<small style="color: rgba(255, 0, 0, 0.562)">:message</small>') !!}
                        <label for="email" class="block mb-2 text-base font-medium text-white">Correo eletronico: </label>
                        <input type="email" name="email" id="email" placeholder="nombre@ejemplo.com" required="" class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg block w-full p-2.5">
                    </div>
                    <div>
                        {!! $errors->first('password','<small style="color: rgba(255, 0, 0, 0.562)">:message</small>') !!}
                        <label for="password" class="block mb-2 text-base font-medium text-white">Contraseña: </label>
                        <input type="password" name="password" id="password" placeholder="••••••••" required="" class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg block w-full p-2.5">
                    </div>
                    <button type="submit" class="w-full text-white bg-[#037171bb] hover:bg-[#037171] focus:outline-none font-medium rounded-lg text-lg px-5 py-2.5 text-cente">Registrarse</button>
                </form>
            </div>
        </div>
    </div>
  </div>
@endsection