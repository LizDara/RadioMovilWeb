<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ServicioController;
use App\Http\Controllers\ParadaController;
use App\Http\Controllers\TarifaController;
use App\Http\Controllers\PromocionController;
use App\Http\Controllers\PermisoController;
use App\Http\Controllers\FaltaController;
use App\Http\Controllers\MovilController;
use App\Http\Controllers\ViajeController;
use App\Http\Controllers\UsuarioController;
use App\Http\Controllers\LoginController;

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

Route::get('/prueba-grafico', function (){
    return view('pruebagrafico');
});

Route::get('/', function () {
    return view('v2.login');
});

Route::get('/registro', function () {
    return view('v2.registro');
});

//-----------------------------INICIO ADMIN----------------------------------------
// Prod
Route::get('/admin', [ViajeController::class, 'listarViajeSinMovil']);

// Prod
Route::get('/servicio-admin', [ServicioController::class, 'index']);

// Prod
Route::get('/promocion-admin', [PromocionController::class, 'index']);

// Prod
Route::get('/parada-admin', [ParadaController::class, 'index']);

// Prod
Route::get('/movil-admin', [MovilController::class, 'index']);

// Prod
Route::get('/falta-admin', [FaltaController::class, 'index']);

// Prod
Route::get('/permiso-admin', [PermisoController::class, 'listarPermiso']);

// Prod
Route::put('/permiso-admin/{id}', [PermisoController::class, 'modificarEstado']);

// Prod
Route::get('/viaje-admin/{id}', [ViajeController::class, 'index']);

//-----------------------------FIN ADMIN----------------------------------------

Route::get('/perfil', [UsuarioController::class, 'show']);

Route::put('/perfil', [UsuarioController::class, 'update']);

// Prod
Route::get('/chofer', [MovilController::class, 'choferIndex']);

// Prod
Route::put('/editar-kilometro/{id}', [ViajeController::class, 'modificarKilometroMonto']);

// Prod
Route::get('/permiso-chofer', [PermisoController::class, 'listarPermisoChofer']);

// Prod
Route::post('/permiso', [PermisoController::class, 'store']);

// Prod
Route::get('/falta-chofer', [FaltaController::class, 'listarFaltaChofer']);

// Prod
Route::get('/tarifa-chofer', [TarifaController::class, 'listarTarifa']);

// Prod
Route::get('/promocion-chofer', [PromocionController::class, 'listarPromocionServicio']);

// Prod
Route::get('/parada-chofer', [ParadaController::class, 'listarParada']);

//------------------------------FIN CHOFER-------------------------------------------

//-----------------------------INICIO CLIENTE----------------------------------------
Route::get('/menu-cliente', function () {
    return view('v2.cliente.menu-cliente');
});

Route::get('/tarifa-cliente', function () {
    return view('v2.cliente.tarifa');
});

Route::get('/promocion-cliente', function () {
    return view('v2.cliente.promocion');
});

Route::get('/holamundo', function () {
    return view('v2.login');
});

Route::get('/holamundo3', function () {
    return view('v2.menu-cliente');
});

Route::get('/nuevo-permiso', function () {
    return view('v2.nuevo-permiso');
});

Route::get('/nueva-falta', function () {
    return view('v2.nueva-falta');
});

Route::get('/nuevo-servicio', function () {
    return view('v2.nuevo-servicio');
});

Route::get('/nueva-tarifa', function () {
    return view('v2.nueva-tarifa');
});

Route::get('/nueva-promocion', function () {
    return view('v2.nueva-promocion');
});

Route::get('/nueva-parada', function () {
    return view('v2.nueva-parada');
});

Route::get('/nuevo-movil', function () {
    return view('v2.nuevo-movil');
});

// v1

Route::get('/detailservice', function () {
    return view('servicedetail');
});

Route::get('/nuevoviaje', function () {
    return view('v2.nuevo-viaje');
});

Route::get('/nuevalicencia', function () {
    return view('request-license');
});

Route::get('/nuevafalta', function () {
    return view('new-fault');
});

Route::get('/nuevoservicio', function () {
    return view('new-service');
});

Route::get('/nuevatarifa', function () {
    return view('new-rate');
});

Route::get('/cliente', [ServicioController::class, 'clienteIndex']);

Route::post('/login', [LoginController::class, 'login']);
Route::get('/cliente/detalle/{id}', [ServicioController::class, 'listarDetalleServicio']);
Route::get('/admin/notificacion', [ViajeController::class, 'listarViajeSinMovil']);
Route::put('/admin/movil/{id}', [ViajeController::class, 'modificarMovil']);

Route::resource('/usuario', UsuarioController::class);
Route::resource('/servicio', ServicioController::class);
Route::resource('/parada', ParadaController::class);
Route::resource('/tarifa', TarifaController::class);
Route::resource('/promocion', PromocionController::class);
// Route::resource('/permiso', PermisoController::class);
Route::resource('/falta', FaltaController::class);
Route::resource('/movil', MovilController::class);
Route::resource('/viaje', ViajeController::class);
