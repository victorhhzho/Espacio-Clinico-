
<script src="{{ asset('assets/js/modal.js') }}"></script> 
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header" style="background-color:#009F93">
        <h1 class="fs-5 text-white" id="exampleModalLabel">Información del médico</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <p>Médico:</p>
        <p style="color: #037171bb">{{Auth::user()->nombre }} {{ Auth::user()->apellido_p}} {{ Auth::user()->apellido_m}}</p>
        <p>Cedula profesional:</p>
        <p style="color: #037171bb">{{Auth::user()->cedula }}</p>
        <p>Correo:</p>
        <p style="color: #037171bb">{{Auth::user()->email}}</p>
      </div>
      <div class="modal-footer">
        <button class="btn btn-primary text-white bg-[#037171bb] hover:bg-[#037171]" type="button" data-bs-dismiss="modal">Cerrar</button>
      </div>
    </div>
  </div>
</div>

<div class="modal fade" id="CSModal" tabindex="-1" aria-labelledby="CSModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header" style="background-color:#009F93">
        <h1 class="fs-5 text-white" id="CSModalLabel">Cerrar la sesión</h1>
      </div>
      <div class="modal-body">
        <p>Usted desea cerrar está sesión</p>
      </div>
      <div class="modal-footer">
        <form action="{{ route('logout') }}" method="POST" class="d-flex" role="search">
          @csrf
          @method('DELETE')
          <button class="btn btn-primary text-white bg-[#037171bb] hover:bg-[#037171]" type="submit">Aceptar</button>
        </form>
        <button class="btn btn-secondary text-white bg-[#656565bb] hover:bg-[#353535bb]" type="button" data-bs-dismiss="modal">Cancelar</button>
      </div>
    </div>
  </div>
</div>