@extends('layouts.plantilla')
@section('title','USUARIOS')
@section('contenido')
  <div id=contenido_tab>
    <div class="table-responsive">
      <table class="table" id="tabla">
        <thead>
          <tr>
            <th style="text-align: center" scope="col">#</th>
            <th style="text-align: center" scope="col">Nombre</th>
            <th style="text-align: center" scope="col">Cedula</th>
            <th style="text-align: center" scope="col">Usuario</th>
            <th style="text-align: center" scope="col">Email</th>
            <th style="text-align: center" scope="col">Opciones</th>
          </tr>
        </thead>
        <tbody>            
            @forelse ($user as $userItem)
              <td scope="row">{{ $userItem->id }}</td>
              <td>{{ $userItem->nombre }} {{ $userItem->apellido_p }} {{ $userItem->apellido_m }}</td>
              <td style="text-align: center">{{ $userItem->cedula }}</td>
              <td style="text-align: center">{{ $userItem->name }}</td>
              <td style="text-align: center">{{ $userItem->email }}</td>
              <td>
                <a href="{{ route('mostrar_usuario', $userItem) }}">
                  <button class="boton text-white bg-[#037171bb] hover:bg-[#037171]" type="submit">
                    <i class="icon fa-solid fa-user-pen"></i>
                  </button>
                </a>
              </td>
            </tr>
            @empty
            <tr>
              <td scope="row">?</td>
              <td>No hay datos que mostrar</td>
            </tr>
            @endforelse
            {{$user->links()}}
        </tbody>
      </table>
    </div>

  </div>
@endsection