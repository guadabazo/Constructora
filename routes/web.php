<?php

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

Route::get('admin', function () {
    return view('layouts/admin');
});


Route::get('bod', function () {
    return view('layouts/bod');
});

Route::resource('/','LoginController');
Route::resource('login/user','LoginController');

Route::resource('login','FinzalizarController');

Route::resource('Gestionar/GestionarPersona','PersonaController');
Route::resource('Gestionar/GestionarProveedor','ProveedorController');
Route::resource('Gestionar/GestionarRol','RolController');
Route::resource('Gestionar/GestionarTrabajador','TrabajadorController');
Route::resource('Gestionar/GestionarEncargado','EncargadoController');
Route::resource('Gestionar/GestionarChofer','ChoferController');

Route::resource('AdmUsuario/AdministrarUsuario','UsuarioController');
Route::resource('AdmUsuario/AdministrarGrupo','GrupoController');
Route::resource('AdmUsuario/AdministrarBitacora','BitacoraController');

Route::resource('administrar/administrar_herramienta','HerramientaController');
Route::resource('administrar/administrar_material','MaterialController');
Route::resource('administrar/administrar_inventario','InventarioController');
Route::resource('administrar/administrar_produccion','ProduccionController');
Route::resource('administrar/registrar_deposito','DepositoController');
Route::resource('administrar/administrar_dotacion','DotacionController');
Route::resource('administrar/gestionar_proyecto','ProyectoController');


Route::get("Registrar/report/ingresomaterial", 'pdfcontroller@invoice');
Route::get('Registrar/report/ingresodotacion', 'pdfcontroller@dotacion');
Route::get('Registrar/report/ingresoherramienta', 'pdfcontroller@herramienta');



Route::resource('Registrar/IngresoMaterial','NotaIngresoMaterialController');
Route::resource('Registrar/IngresoHerramienta','NotaIngresoHerramientaController');
Route::resource('Registrar/IngresoDotacion','NotaIngresoDotacionController');
Route::resource('Registrar/RealizaProduccion','ProduccionRealizaProyectoController');
Route::resource('Registrar/NotaDevolucion','NotaDevolucionController');

Route::resource('RegistrarEgreso/EntregaDotacion','EntregaDotacionController');
Route::resource('RegistrarEgreso/PrestamoHerramienta','NotaPrestamoHerramientaController');
Route::resource('RegistrarEgreso/EntregaProduccion','EntregaProduccionProyectoController');
Route::resource('RegistrarEgreso/NotaSalidaCombustible','NotaSalidaCombustibleController');
Route::resource('RegistrarEgreso/NotaEntregaMaterial','NotaEntregaMaterialController');

/*
 *
Route::get('/home', 'HomeController@index')->name('home');
*/

Route::auth();