<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\CalendarController;
use App\Http\Controllers\ConsultasController;
use App\Http\Controllers\CuentasController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\InventarioController;
use App\Http\Controllers\NotificacionesController;
use App\Http\Controllers\PacientesController;
use App\Http\Controllers\PCAdminController;
use App\Http\Controllers\VentasController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('auth.login');
});

Route::group(['middleware' => 'guest'], function(){
    Route::get('/login',[AuthController::class, 'login'])->name('login');
    Route::post('/login',[AuthController::class, 'loginPost'])->name('login');
});

Route::group(['middleware' => 'auth'], function(){

    Route::get('/inicio',[HomeController::class, 'index'])->name('inicio');

    Route::get('/notificaciones',[NotificacionesController::class, 'index'])->name('notificaciones');
    Route::post('/notificaciones',[NotificacionesController::class, 'registrar_notificacion'])->name('registrar_notificacion');
    Route::delete('/notificaciones/{notificacion}',[NotificacionesController::class, 'eliminar_notificacion'])->name('eliminar_notificacion');

    Route::get('/consultar_paciente',[PacientesController::class, 'index_consultar_paciente'])->name('consultar_paciente');
    Route::post('/consultar_paciente',[PacientesController::class, 'registrar_paciente'])->name('registrar_paciente');
    Route::put('/consultar_paciente/{paciente}',[PacientesController::class, 'modificar_paciente'])->name('modificar_paciente');
    Route::delete('/consultar_paciente/{paciente}',[PacientesController::class, 'eliminar_paciente'])->name('eliminar_paciente');

    Route::get('/agenda',[CalendarController::class, 'index'])->name('agenda');
    Route::post('/agenda',[CalendarController::class, 'registrar_evento'])->name('registrar_evento');
    Route::put('/agenda/{event}',[CalendarController::class, 'modificar_evento'])->name('modificar_evento');
    Route::delete('/agenda/{event}',[CalendarController::class, 'eliminar_evento'])->name('eliminar_evento');

    Route::get('/consultar_venta',[VentasController::class, 'index_consultar_venta'])->name('consultar_venta');
    Route::post('/consultar_venta',[VentasController::class, 'registrar_venta'])->name('registrar_venta');
    Route::put('/consultar_venta/{venta}',[VentasController::class, 'modificar_venta'])->name('modificar_venta');
    Route::delete('/consultar_venta/{venta}',[VentasController::class, 'eliminar_venta'])->name('eliminar_venta');
    
    Route::get('/consultar_inventario',[InventarioController::class, 'index_consultar_inventario'])->name('consultar_inventario');
    Route::post('/consultar_inventario',[InventarioController::class, 'registrar_inventario'])->name('registrar_inventario');
    Route::put('/consultar_inventario/{inventario}',[InventarioController::class, 'modificar_inventario'])->name('modificar_inventario');
    Route::delete('/consultar_inventario/{inventario}',[InventarioController::class, 'eliminar_inventario'])->name('eliminar_inventario');

    Route::get('/consultar_proveedor',[InventarioController::class, 'index_consultar_proveedor'])->name('consultar_proveedor');
    Route::post('/consultar_proveedor',[InventarioController::class, 'registrar_proveedor'])->name('registrar_proveedor');
    Route::put('/consultar_proveedor/{proveedor}',[InventarioController::class, 'modificar_proveedor'])->name('modificar_proveedor');
    Route::delete('/consultar_proveedor/{proveedor}',[InventarioController::class, 'eliminar_proveedor'])->name('eliminar_proveedor');

    Route::get('/consultar_usuarios',[PCAdminController::class, 'index_consultar_usuarios'])->name('consultar_usuarios');
    Route::get('/consultar_usuarios/{id}',[PCAdminController::class, 'mostrar_usuario'])->name('mostrar_usuario');
    Route::put('/consultar_usuarios/{user}',[PCAdminController::class, 'modificar_usuario'])->name('modificar_usuario');
    Route::delete('/consultar_usuarios/{user}',[PCAdminController::class, 'eliminar_usuario'])->name('eliminar_usuario');

    Route::get('/registrar_usuario',[AuthController::class, 'register'])->name('register');
    Route::post('/registrar_usuario',[AuthController::class, 'registerPost'])->name('register');
    
    Route::delete('/logout', [AuthController::class, 'logout'])->name('logout');

    Route::get('/consultas',[ConsultasController::class, 'perfil_clinico'])->name('perfil_clinico');
    Route::post('/consultas',[ConsultasController::class, 'registrar_consulta'])->name('registrar_consulta');
    Route::put('/consultas/{consulta}',[ConsultasController::class, 'modificar_consulta'])->name('modificar_consulta');
    Route::delete('/consultas/{consulta}',[ConsultasController::class, 'eliminar_consulta'])->name('eliminar_consulta');

});




