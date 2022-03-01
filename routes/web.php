<?php

use App\Exports\PersonalExport;
use App\Http\Controllers\Administracion\PersonalController;
use App\Http\Controllers\Administracion\ResidenteController;
use App\Http\Controllers\Busqueda\BusquedaPController;
use App\Http\Controllers\Busqueda\BusquedaRController;
use App\Http\Controllers\Busqueda\VisitantesController;
use App\Http\Controllers\ConfiguracionController;
use App\Http\Controllers\Incidencias\NotificacionController;
use App\Http\Controllers\Incidencias\ReporteController;
use App\Http\Controllers\OperacionController;
use App\Http\Controllers\UsersController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

// RUTAS ADMINISTRACION ----------------------------------------------------------------

// abrir ventana crear personal
Route::get('/administracion/personal', [PersonalController::class, 'index'])->name('personal');
// craer personal
Route::post('/administracion/personal/craer', [PersonalController::class, 'createP'])->name('createP');
// editar personal
Route::get('/administracion/personal/editar', [PersonalController::class, 'listP'])->name('listP');
Route::get('/administracion/personal/editar/{id}', [PersonalController::class, 'editarP'])->name('editarP');
Route::put('/administracion/personal/update/{id}', [PersonalController::class, 'updateP'])->name('updateP');

// craer servicio
Route::post('/administracion/personal/servicio', [PersonalController::class, 'crearSP'])->name('crearSP');
// eliminar servicio
Route::delete('/administracion/personal/servicio/eliminar/{id}', [PersonalController::class, 'eliminarSP'])->name('eliminarSP');

// abrir ventana crear residente
Route::get('/administracion/residentes', [ResidenteController::class, 'index'])->name('residente');
// craer residente
Route::post('/administracion/residentes/craer', [ResidenteController::class, 'createR'])->name('createR');
// craer tipo
Route::post('/administracion/residentes/servicio', [ResidenteController::class, 'crearTR'])->name('crearTR');
// eliminar tipo
Route::delete('/administracion/residentes/servicio/eliminar/{id}', [ResidenteController::class, 'eliminarTR'])->name('eliminarTR');
// editar personal
Route::get('/administracion/residentes/editar', [ResidenteController::class, 'listR'])->name('listR');
Route::get('/administracion/residentes/editar/{id}', [ResidenteController::class, 'editarR'])->name('editarR');
Route::put('/administracion/residentes/update/{id}', [ResidenteController::class, 'updateR'])->name('updateRA');

// RUTAS BUSQUEDA ----------------------------------------------------------------

// abrir ventana busqueda personal
Route::get('/busqueda/personal', [BusquedaPController::class, 'index'])->name('personalB');
// editar personal
Route::put('/busqueda/personal/editar/{id}', [BusquedaPController::class, 'update'])->name('update.personalB');
// eliminar personalB
Route::delete('/busqueda/personal/eliminar/{id}', [BusquedaPController::class, 'deleteP'])->name('deleteP');

// abrir ventana busqueda residentes
Route::get('/busqueda/residentes', [BusquedaRController::class, 'indexR'])->name('indexR');
// editar residentes
Route::put('/busqueda/residentes/editar/{id}', [BusquedaRController::class, 'updateR'])->name('updateR');
// eliminar residentes
Route::delete('/busqueda/residentes/eliminar/{id}', [BusquedaRController::class, 'deleteR'])->name('deleteR');

// abrir ventana residentes
// abrir ventana busqueda residentes
Route::get('/busqueda/visitantes', [VisitantesController::class, 'indexV'])->name('indexV');
// eliminar residentes
Route::delete('/busqueda/visitantes/eliminar/{id}', [VisitantesController::class, 'deleteR'])->name('deleteV');


// RUTAS CONFIGURACION ----------------------------------------------------------------
// ventana dispositivos
Route::get('/configuracion/dispositivos', [ConfiguracionController::class, 'indexD'])->name('dispositivos');
// editar camaras
Route::put('/configuracion/dispositivos/camaras{id}', [ConfiguracionController::class, 'update'])->middleware(['auth'])->name('modificar-cam');

// ventana relevadores
Route::get('/configuracion/relevadores', [ConfiguracionController::class, 'indexR'])->name('relevadores');
// editar arduino
Route::post('/updateArduino', [ConfiguracionController::class, 'updateArduino'])->name('updateArduino');
// paneles
Route::put('/addpanel/{id}', [ConfiguracionController::class, 'addpanel'])->name('addpanel');
Route::put('/deletepanel/{id}', [ConfiguracionController::class, 'deletepanel'])->name('deletepanel');

// usuarios
Route::get('/configuracion/usuarios', [UsersController::class, 'index'])->name('usuarios');
Route::put('/usuarios/editar/update/rol/{partner}', [App\Http\Controllers\UsersController::class, 'updateRol'])->name('role.update');
Route::post('/configuracion/usuarios/craer', [UsersController::class, 'crear'])->name('usuariosC');
// Route::put('/configuracion/usuarios/editar/{id}', [UsersController::class, 'editar'])->name('usuariosD');

Route::delete('/configuracion/usuarios/eliminar/{id}', [UsersController::class, 'eliminar'])->name('usuariosE');

// general
Route::get('/configuracion/general', [ConfiguracionController::class, 'indexGeneral'])->name('indexGeneral');
Route::put('/usuarios/editar/correo/{partner}', [ConfiguracionController::class, 'editarcorreo'])->name('editarcorreo');
Route::put('/usuarios/editar/fraccionamiento/{partner}', [ConfiguracionController::class, 'editarfracc'])->name('editarfracc');


// RUTAS OPERACION ----------------------------------------------------------------
// vista principal
Route::get('/operacion/crear/{id}', [OperacionController::class, 'index'])->middleware(['auth'])->name('index-visitante');
Route::get('/operacion/residentes', [OperacionController::class, 'indexR'])->middleware(['auth'])->name('index-residente');
Route::get('/operacion/cerrar', [OperacionController::class, 'indexC'])->middleware(['auth'])->name('cerrar-visitante');
Route::get('/operacion/buscar_visitantes', [OperacionController::class, 'indexV'])->middleware(['auth'])->name('index-operacionR');
// crear visitante
Route::post('/operacion/Nueva_Visita', [OperacionController::class, 'createV'])->middleware(['auth'])->name('crear-visitante');
// cambair estatus de visita
Route::put('/operacion/Actualizar_estatus/{id}', [OperacionController::class, 'estatus'])->middleware(['auth'])->name('estatusV');
// reportes
Route::get('/operacion/reportes', [ReporteController::class, 'index'])->middleware(['auth'])->name('index-reportes');
Route::post('/operacion/reportes/crear', [ReporteController::class, 'crear'])->middleware(['auth'])->name('crear-reportes');
Route::delete('/operacion/reportes/eliminar/{id}', [ReporteController::class, 'eliminar'])->middleware(['auth'])->name('eliminar-reportes');
Route::put('/operacion/reportes/editar/{id}', [ReporteController::class, 'edit'])->middleware(['auth'])->name('edit-reportes');

// notificaciones
Route::get('/operacion/notificacion', [NotificacionController::class, 'index'])->middleware(['auth'])->name('index-notificacion');
Route::get('/operacion/notificacion/{id}', [NotificacionController::class, 'index2'])->middleware(['auth'])->name('index-notificacion2');
Route::post('/operacion/notificacion/crear', [NotificacionController::class, 'crear'])->middleware(['auth'])->name('crear-notificacion');
Route::delete('/operacion/notificacion/eliminar/{id}', [NotificacionController::class, 'eliminar'])->middleware(['auth'])->name('eliminar-notificacion');

Route::PUT('Busqueda/residentes/payment/{id}', [BusquedaController::class, 'payment'])->name('payment');
Route::get('/info', [ConfiguracionController::class, 'info'])->name('compinfo');

Route::get('/open/{id}', [OperacionController::class, 'openGate'])->middleware(['auth'])->name('open');

Route::get('/close', [OperacionController::class, 'closeGate'])->middleware(['auth']);

Route::post('/operacion', [OperacionController::class, 'store'])->middleware(['auth']);

// eportar
Route::get('personal/export/', [BusquedaPController::class, 'export'])->name('exportP');
Route::get('residentes/export/', [BusquedaRController::class, 'export'])->name('exportR');
Route::get('visitantes/export/', [VisitantesController::class, 'export'])->name('exportV');