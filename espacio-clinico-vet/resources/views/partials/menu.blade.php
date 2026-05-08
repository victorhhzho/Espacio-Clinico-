<div class="position: relative">
    <span class="absolute text-white text-4xl top-5 left-4 cursor-pointer" onclick="Openbar()">
      <i class="bi bi-filter-left px-2 bg-[#03312E] rounded-md"></i>
    </span>

    <div class="sidebar fixed top-0 bottom-0 lg:left-0 left-[-300px] duration-1000
      p-2 w-[300px] overflow-y-auto text-center shadow h-screen" style="background-color: #03312E">
      
      <div class="text-gray-100 text-xl">

        <div class="p-2.5 mt-1 flex items-center rounded-md ">
          <i class="fa-solid fa-shield-dog fa-2xl"></i>
          <h1 class="text-[15px]  ml-3 text-xl text-gray-200 font-bold">Espacio Clinico</h1>
          <i class="bi bi-x ml-20 cursor-pointer lg:hidden" onclick="Openbar()"></i>
        </div>
 
        <hr class="my-4 text-gray-600">
        
        <div class="p-2.5 mt-2 flex items-center rounded-md px-4 duration-300 cursor-pointer  hover:bg-[#037171]">
          <i class="fa-solid fa-user-doctor fa-xl" style="color: #60BFF3"></i>
          <span class="text-[14px] text-left ml-4 text-gray-200" data-bs-toggle="modal" data-bs-target="#exampleModal">
            <p>Médico:</p>
            <p style="color: #6fffe9">{{Auth::user()->nombre }} {{ Auth::user()->apellido_p}} {{ Auth::user()->apellido_m}}</p>
          </span>
        </div>

        <div class="p-2.5 mt-2 flex items-center rounded-md px-4">
          <i class="fa-solid fa-id-card fa-xl" style="color: #60BFF3"></i>
          <span class="text-[14px] text-left ml-4 text-gray-200">
            <p>Cedula profesional:</p>
            <p style="color: #6fffe9">{{Auth::user()->cedula }}</p>
          </span>
        </div>

        <hr class="my-2 text-gray-600">

        <div>

          <div class="p-2.5 mt-2 flex items-center rounded-md px-4 duration-300 cursor-pointer  hover:bg-[#037171]">
            <i class="fa-solid fa-house fa-lg" style="color: #02c3bd"></i>
            <span class="text-[15px] ml-4 text-gray-200">
              <a href="{{ route('inicio') }}">Inicio</a>
            </span>
            
          </div>

          <div class="p-2.5 mt-2 flex items-center rounded-md px-4 duration-300 cursor-pointer  hover:bg-[#037171]">
            <i class="fa-solid fa-bell fa-lg" style="color: #02c3bd;"></i>
            <span class="text-[15px] ml-4 text-gray-200">
              <a href="{{ route('notificaciones') }}">Notificaciones</a>
            </span>
          </div>

          <hr class="my-4 text-gray-600">

          <div class="p-2.5 mt-2 flex items-center rounded-md px-4 duration-300 cursor-pointer  hover:bg-[#037171]">
            <i class="fa-solid fa-dog fa-lg" style="color: #02c3bd;"></i>
            <div class="flex justify-between w-full items-center" onclick="dropDown('#paciente_sm','#paciente_b')">
              <span class="text-[15px] ml-4 text-gray-200">Pacientes</span>
              <span class="text-sm rotate-180" id="paciente_b">
                <i class="fa-solid fa-circle-chevron-down"></i>
              </span>
            </div>
          </div>
          <div class=" leading-7 text-left text-sm font-thin mt-2 w-4/5 mx-auto" id="paciente_sm">
            <h1 class="cursor-pointer p-2 hover:bg-[#009F93] rounded-md mt-1"><a href="{{ route('consultar_paciente') }}">Consultar paciente</a></h1>
            <h1 class="cursor-pointer p-2 hover:bg-[#009F93] rounded-md mt-1"><a href="{{ route('perfil_clinico') }}">Consultas</a></h1>
          </div>

          <div class="p-2.5 mt-2 flex items-center rounded-md px-4 duration-300 cursor-pointer  hover:bg-[#037171]">
            <i class="fa-solid fa-calendar-days fa-lg" style="color: #02c3bd;"></i>
            <span class="text-[15px] ml-4 text-gray-200">
              <a href="{{ route('agenda') }}">Agenda de citas</a>
            </span>
          </div>

          <div class="p-2.5 mt-2 flex items-center rounded-md px-4 duration-300 cursor-pointer  hover:bg-[#037171]">
            <i class="fa-solid fa-cash-register fa-lg" style="color: #02c3bd;"></i>
            <div class="flex justify-between w-full items-center" onclick="dropDown('#ventas_sm','#ventas_b')">
              <span class="text-[15px] ml-4 text-gray-200">Registro de ventas</span>
              <span class="text-sm rotate-180" id="ventas_b">
                <i class="fa-solid fa-circle-chevron-down"></i>
              </span>
            </div>
          </div>
          <div class=" leading-7 text-left text-sm font-thin mt-2 w-4/5 mx-auto" id="ventas_sm">
            <h1 class="cursor-pointer p-2 hover:bg-[#009F93] rounded-md mt-1"><a href="{{ route('consultar_venta') }}">Consultar ventas</a></h1>
          </div>

          <div class="p-2.5 mt-2 flex items-center rounded-md px-4 duration-300 cursor-pointer  hover:bg-[#037171]">
            <i class="fa-solid fa-boxes-packing fa-lg" style="color: #02c3bd;"></i>
            <div class="flex justify-between w-full items-center" onclick="dropDown('#inv_sm','#inv_b')">
              <span class="text-[15px] ml-4 text-gray-200">Control de inventario</span>
              <span class="text-sm rotate-180" id="inv_b">
                <i class="fa-solid fa-circle-chevron-down"></i>
              </span>
            </div>
          </div>

          <div class=" leading-7 text-left text-sm font-thin mt-2 w-4/5 mx-auto" id="inv_sm">
            <h1 class="cursor-pointer p-2 hover:bg-[#009F93] rounded-md mt-1"><a href="{{ route('consultar_inventario') }}">Consultar inventario</a></h1>
            <h1 class="cursor-pointer p-2 hover:bg-[#009F93] rounded-md mt-1"><a href="{{ route('consultar_proveedor') }}">Consultar proveedores</a></h1>
          </div>
          
          <hr class="my-4 text-gray-600">

          <div class="p-2.5 mt-2 flex items-center rounded-md px-4 duration-300 cursor-pointer  hover:bg-[#037171]">
            <i class="fa-solid fa-screwdriver-wrench fa-lg" style="color: #02c3bd;"></i>
            <div class="flex justify-between w-full items-center" onclick="dropDown('#admin_sm','#admin_b')">
              <span class="text-[15px] ml-4 text-gray-200">Administrador</span>
              <span class="text-sm rotate-180" id="admin_b">
                <i class="fa-solid fa-circle-chevron-down"></i>
              </span>
            </div>
          </div>
          <div class=" leading-7 text-left text-sm font-thin mt-2 w-4/5 mx-auto" id="admin_sm">
            <h1 class="cursor-pointer p-2 hover:bg-[#009F93] rounded-md mt-1"><a href="{{ route('register') }}">Agregar usuario</a></h1>
            <h1 class="cursor-pointer p-2 hover:bg-[#009F93] rounded-md mt-1"><a href="{{ route('consultar_usuarios') }}">Consultar usuarios</a></h1>
          </div>

          <hr class="my-4 text-gray-600">

          <div class="p-2.5 mt-3 flex items-center rounded-md px-4 duration-300 cursor-pointer  hover:bg-[#037171]">
              <i class="fa-solid fa-right-from-bracket fa-lg" style="color: #02c3bd;"></i>
              <span class="text-[15px] ml-4 text-gray-200" data-bs-toggle="modal" data-bs-target="#CSModal">Cerrar Sesión</span>
          </div>
          <div id="menu_extension">
            <hr class="my-4 text-gray-600">
            <div class="p-2.5 mt-2 px-4">
            </div>
            <hr class="my-4 text-gray-600">
          </div>
        </div>
      </div>
    </div>
  </div>
  <script src="{{ asset('assets/js/menu.js') }}"></script>
   