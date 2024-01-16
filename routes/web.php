<?php

use App\Http\Controllers\ApiController;
use Illuminate\Support\Facades\Auth;
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
    return redirect('/home');
});

Auth::routes();

Route::group(['middleware' => ['auth']], function () {
    Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
    Route::get('/menu', [App\Http\Controllers\MenuController::class, 'showMenu']);

    Route::get('/getCities/{province}', [ApiController::class, 'getCities']);
    Route::get('/getServicios/{linea_servicios}', [ApiController::class, 'getServicios']);
    
    // Ruta Menus
    Route::get('/menus', [App\Http\Controllers\MenuController::class, 'index']);
    Route::get('/menu/create', [App\Http\Controllers\MenuController::class, 'create']);
    Route::post('/menu', [App\Http\Controllers\MenuController::class, 'store'])->name('menu.store');
    Route::get('/menu/{menu}/edit', [App\Http\Controllers\MenuController::class, 'edit']);
    Route::get('/menu/{menu}/show', [App\Http\Controllers\MenuController::class, 'show']);
    Route::put('/menu/{menu}', [App\Http\Controllers\MenuController::class, 'update']);
    Route::delete('/menu/{menu}', [App\Http\Controllers\MenuController::class, 'destroy']);

    Route::get('/menu_role/{menu}/edit', [App\Http\Controllers\MenuController::class, 'roleMenuEdit']);
    Route::put('/menu_role/{menu}', [App\Http\Controllers\MenuController::class, 'roleMenu']);

    // Rutas paises
    Route::get('/paises', [App\Http\Controllers\PaisController::class, 'index']);
    Route::get('/pais/create', [App\Http\Controllers\PaisController::class, 'create']);
    Route::get('/pais/{pais}/edit', [App\Http\Controllers\PaisController::class, 'edit']);
    Route::post('/pais', [App\Http\Controllers\PaisController::class, 'store']);
    Route::put('/pais/{pais}', [App\Http\Controllers\PaisController::class, 'update']);
    Route::delete('/pais/{pais}', [App\Http\Controllers\PaisController::class, 'destroy']);

    // Ruta Genero
    Route::get('/generos', [App\Http\Controllers\GeneroController::class, 'index']);
    Route::get('/genero/create', [App\Http\Controllers\GeneroController::class, 'create']);
    Route::get('/genero/{genero}/edit', [App\Http\Controllers\GeneroController::class, 'edit']);
    Route::post('/genero', [App\Http\Controllers\GeneroController::class, 'store']);
    Route::put('/genero/{genero}', [App\Http\Controllers\GeneroController::class, 'update']);
    Route::delete('/genero/{genero}', [App\Http\Controllers\GeneroController::class, 'destroy']);

    // Ruta Etnia
    Route::get('/etnias', [App\Http\Controllers\EtniaController::class, 'index']);
    Route::get('/etnia/create', [App\Http\Controllers\EtniaController::class, 'create']);
    Route::get('/etnia/{etnia}/edit', [App\Http\Controllers\EtniaController::class, 'edit']);
    Route::post('/etnia', [App\Http\Controllers\EtniaController::class, 'store']);
    Route::put('/etnia/{etnia}', [App\Http\Controllers\EtniaController::class, 'update']);
    Route::delete('/etnia/{etnia}', [App\Http\Controllers\EtniaController::class, 'destroy']);

    // Ruta Usuarios
    Route::get('/usuarios', [App\Http\Controllers\UserController::class, 'index']);
    Route::get('/usuario/create', [App\Http\Controllers\UserController::class, 'create']);
    Route::get('/usuario/{usuario}/edit', [App\Http\Controllers\UserController::class, 'edit']);
    Route::post('/usuario', [App\Http\Controllers\UserController::class, 'store']);
    Route::put('/usuario/{usuario}', [App\Http\Controllers\UserController::class, 'update']);
    Route::delete('/usuario/{usuario}', [App\Http\Controllers\UserController::class, 'destroy']);
    //restear Contraseña
    Route::get('/usuario/{usuario}/reset', [App\Http\Controllers\UserController::class, 'reset']);
    Route::put('/changePassword/{usuario}', [App\Http\Controllers\UserController::class, 'ChangeReset']);


    // Ruta Roles
    Route::get('/roles', [App\Http\Controllers\RoleController::class, 'index']);
    Route::get('/role/create', [App\Http\Controllers\RoleController::class, 'create']);
    Route::get('/role/{role}/edit', [App\Http\Controllers\RoleController::class, 'edit']);
    Route::post('/role', [App\Http\Controllers\RoleController::class, 'store']);
    Route::put('/role/{role}', [App\Http\Controllers\RoleController::class, 'update']);
    Route::delete('/role/{role}', [App\Http\Controllers\RoleController::class, 'destroy']);


    // Ruta Permisos
    Route::get('/permisos', [App\Http\Controllers\PermisoController::class, 'index']);
    Route::get('/permiso/create', [App\Http\Controllers\PermisoController::class, 'create']);
    Route::get('/permiso/{permiso}/edit', [App\Http\Controllers\PermisoController::class, 'edit']);
    Route::post('/permiso', [App\Http\Controllers\PermisoController::class, 'store']);
    Route::put('/permiso/{permiso}', [App\Http\Controllers\PermisoController::class, 'update']);
    Route::delete('/permiso/{permiso}', [App\Http\Controllers\PermisoController::class, 'destroy']);

    // Ruta Modulos
    Route::get('/modulos', [App\Http\Controllers\ModuloController::class, 'index']);
    Route::get('/modulo/create', [App\Http\Controllers\ModuloController::class, 'create']);
    Route::get('/modulo/{permiso}/edit', [App\Http\Controllers\ModuloController::class, 'edit']);
    Route::post('/modulo', [App\Http\Controllers\ModuloController::class, 'store']);
    Route::put('/modulo/{modulo}', [App\Http\Controllers\ModuloController::class, 'update']);
    Route::delete('/modulo/{modulo}', [App\Http\Controllers\ModuloController::class, 'destroy']);

    // Ruta Role_User
    Route::get('/roleUser/{roleUser}/edit', [App\Http\Controllers\RoleUserController::class, 'edit']);
    Route::put('/roleUser/{roleUser}', [App\Http\Controllers\RoleUserController::class, 'update']);

    //Ruta Modulo_permiso
    // Ruta Role_User
    Route::get('/moduloPermiso/{moduloPermiso}/edit', [App\Http\Controllers\ModuloPermisoController::class, 'edit']);
    Route::put('/moduloPermiso/{moduloPermiso}', [App\Http\Controllers\ModuloPermisoController::class, 'update']);

    // Ruta Role_Modulo
    Route::get('/roleModulo/{roleModulo}/edit', [App\Http\Controllers\RoleModuleController::class, 'edit']);
    Route::post('/roleModulo/{roleModulo}', [App\Http\Controllers\RoleModuleController::class, 'store']);


    // Ruta Cliente
    Route::post('/search', [App\Http\Controllers\ClientesController::class, 'search']);
    Route::get('/clientes', [App\Http\Controllers\ClientesController::class, 'index']);
    Route::get('/clientes/create', [App\Http\Controllers\ClientesController::class, 'create']);
    Route::get('/clientes/{clientes}/edit', [App\Http\Controllers\ClientesController::class, 'edit']);
    Route::get('/clientes/{clientes}/show', [App\Http\Controllers\ClientesController::class, 'show']);
    Route::post('/clientes', [App\Http\Controllers\ClientesController::class, 'store']);
    Route::put('/clientes/{clientes}', [App\Http\Controllers\ClientesController::class, 'update'])->name('clientes.update');
    Route::delete('/clientes/{clientes}', [App\Http\Controllers\ClientesController::class, 'destroy']);


    // Ruta Asesorias
    Route::post('/search/asesorias', [App\Http\Controllers\AsesoriaController::class, 'search']);
    Route::get('/asesorias', [App\Http\Controllers\AsesoriaController::class, 'index']);
    Route::get('/asesorias/{cliente}/create', [App\Http\Controllers\AsesoriaController::class, 'create']);
    Route::get('/asesorias/{asesorias}/edit', [App\Http\Controllers\AsesoriaController::class, 'edit']);
    Route::get('/asesorias/{asesorias}/show', [App\Http\Controllers\AsesoriaController::class, 'show']);
    Route::post('/asesorias', [App\Http\Controllers\AsesoriaController::class, 'store'])->name('asesoria.store');
    Route::put('/asesorias/{asesorias}', [App\Http\Controllers\AsesoriaController::class, 'update']);
    Route::delete('/asesorias/{asesorias}', [App\Http\Controllers\AsesoriaController::class, 'destroy']);

    // Ruta Patrocinios
    Route::post('/search/patrocinios', [App\Http\Controllers\PatrocinioController::class, 'search']);
    Route::get('/patrocinios', [App\Http\Controllers\PatrocinioController::class, 'index']);
    Route::get('/patrocinios/{patrocinios}/create', [App\Http\Controllers\PatrocinioController::class, 'create']);
    Route::get('/patrocinios/{patrocinios}/edit', [App\Http\Controllers\PatrocinioController::class, 'edit']);
    Route::get('/patrocinios/{patrocinios}/show', [App\Http\Controllers\PatrocinioController::class, 'show']);
    Route::post('/patrocinios', [App\Http\Controllers\PatrocinioController::class, 'store']);
    Route::put('/patrocinios/{patrocinios}', [App\Http\Controllers\PatrocinioController::class, 'update']);
    Route::delete('/patrocinios/{patrocinios}', [App\Http\Controllers\PatrocinioController::class, 'destroy']);
});
