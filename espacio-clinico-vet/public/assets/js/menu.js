function dropDown(submenu,boton) {
    document.querySelector(submenu).classList.toggle('hidden')
    document.querySelector(boton).classList.toggle('rotate-0')
  }
  dropDown('#paciente_sm','#paciente_b')
  dropDown('#ventas_sm','#ventas_b')
  dropDown('#inv_sm','#inv_b')
  dropDown('#admin_sm','#admin_b')
  
  function Openbar() {
    document.querySelector('.sidebar').classList.toggle('left-[-300px]')
    document.querySelector('.contenido').classList.toggle('fixed')
  }