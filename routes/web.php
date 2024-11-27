<?php

use Illuminate\Support\Facades\Route;
use Spatie\Permission\Models\Role;
use App\Http\Controllers\admin\DashboardController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\MedidaController;
use App\Http\Controllers\CajaController;
use App\Http\Controllers\ArticuloController;
use App\Http\Controllers\CompaniaController;
use App\Http\Controllers\ProveedorController;
use App\Http\Controllers\PaqueteController;
use App\Http\Controllers\VentaController;
use App\Http\Controllers\StockController;

Route::get('/', function () {
    return view('welcome');
});
Auth::routes();

Route::get('/home', [\App\Http\Controllers\HomeController::class, 'index'])->name('home');

Auth::routes();

Route::get('/home', [\App\Http\Controllers\HomeController::class, 'index'])->name('home');

//Route::resource('/products', App\Http\Controllers\ProductController::class);
Route::middleware(['role:admin'])->group(function () {
    Route::resource('/cajas', CajaController::class);
    Route::resource('/articulos', ArticuloController::class);
});
Route::middleware([''])->group(function () {
    Route::resource('/products', ProductController::class);
});
//Route::resource('/medidas', App\Http\Controllers\MedidaController::class);
Route::middleware(['admin'])->group(function () {
    Route::resource('/medidas', MedidaController::class);
});
Route::middleware(['admihn'])->group(function () {
    Route::resource('/cajas', CajaController::class);
});

Route::middleware(['admin'])->group(function () {
    Route::resource('/articulos', ArticuloController::class);
});
Route::resource('/companias', App\Http\Controllers\CompaniaController::class);



Route::resource('/paquetes', App\Http\Controllers\PaqueteController::class);
Route::resource('/proveedors', App\Http\Controllers\ProveedorController::class);
Route::resource('/registroventa', App\Http\Controllers\RegistroventaController::class);
Route::resource('/venta', App\Http\Controllers\VentaController::class);
Route::get('/ventas/{registroVenta}/seleccionar', [VentaController::class, 'seleccionarProductos'])->name('venta.seleccionarProductos');


Route::get('/ventas', [VentaController::class, 'index'])->name('ventas.index');
Route::get('/ventas/create', [VentaController::class, 'create'])->name('venta.create');
Route::post('/ventas', [VentaController::class, 'store'])->name('venta.store');

Route::get('/ventas/crear', [VentaController::class, 'crearRegistroVenta'])->name('ventas.crear');

// Ruta para seleccionar productos después de crear un registro de venta
Route::get('/ventas/{registroVenta}/seleccionar', [VentaController::class, 'seleccionarProductos'])->name('ventas.seleccionarProductos');

// Ruta para guardar las ventas seleccionadas en la base de datos
Route::post('/ventas/{registroVenta}/guardar', [VentaController::class, 'guardarVentas'])->name('ventas.guardar');

// Ruta para mostrar un resumen de las ventas realizadas
Route::get('/ventas/{registroVenta}/resumen', [VentaController::class, 'mostrarResumen'])->name('ventas.resumen');

// Rutas CRUD básicas para la tabla de ventas
Route::resource('ventas', VentaController::class)->except(['create']);
Route::get('/ventas/{registroVenta}/ticket', [VentaController::class, 'generarTicket'])->name('venta.ticket');
Route::resource('/stocks', App\Http\Controllers\StockController::class);
