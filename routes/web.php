<?php

use Illuminate\Support\Facades\Route;

//Libreria de controladores
use App\Http\Controllers\UsuarioController;
use App\Http\Controllers\ProveedoresController;
use App\Http\Controllers\ProductoController;
use App\Http\Controllers\FacturaController;
use App\Http\Controllers\CompraController;
use App\Http\Controllers\DevolucionesController;
use App\Http\Controllers\DetallefacturaController;
use App\Http\Controllers\DetallecompraController;
use App\Http\Controllers\DetalledevolucionController;
use App\Http\Controllers\BackupController;
use App\Http\Controllers\DatabaseRestoreController;
use Illuminate\Contracts\Cache\Store;

Route::resource('/Usuario',UsuarioController::class);
Route::resource('/Productos',ProductoController::class);
Route::resource('/Proveedores',ProveedoresController::class);
Route::resource('/Factura',FacturaController::class);
Route::post('crear-factura', [FacturaController::class, 'store'])->name('crear_factura');
Route::get('/buscarFactura', [DevolucionesController::class, 'buscarFactura']);
Route::post('/anularFactura1', [DevolucionesController::class, 'anularFactura1'])->name('anularFactura1');
Route::resource('/Compra',CompraController::class);
Route::post('crear-compra', [CompraController::class, 'store'])->name('crear_compra');
Route::resource('/Devoluciones',DevolucionesController::class);
Route::resource('/Detallefactura',DetallefacturaController::class);
Route::resource('/Detallecompra',DetallecompraController::class);
Route::resource('/Detalledevolucion',DetalledevolucionController::class);
Route::resource('/Mantenimiento', BackupController::class);
//ruta de respaldo
Route::post('/backup/database', [BackupController::class, 'realizarBackup'])->name('backup.database');
//ruta de restablecer
Route::post('/restore/database', [DatabaseRestoreController::class, 'restore'])->name('restore.database');
Route::get('/', function () {
    return view('home');
});
Route::get('/', function (){
    return view('auth.login');
});
Auth::routes();
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/Prueba', function()
{
return view('Prueba.index');
});

//Libreria de controladores de los Reportes
use App\Http\Controllers\ReportControllerCompraDetalle;
use App\Http\Controllers\ReportControllerDevoluciondetalle;
use App\Http\Controllers\ReportControllerFacturacionDetalle;
use App\Http\Controllers\ReportControllerStockProxAgotar;
use App\Http\Controllers\ReporControllertproductos;
use App\Http\Controllers\ReportControllerModeloproveedores;
use App\Http\Controllers\ReportControllerUsuarioMaximasVentas;
use App\Http\Controllers\ReportControllerstock;
use App\Http\Controllers\ReportControllerProductosmasdevueltos;

//Ruta acerca de
Route::get('/acercade', function () {
    return view('Acerca de.acercade');
});

//reportStoctk
Route::get('/Stock', 
[App\Http\Controllers\ReportControllerstock::class, 'indexStock'])
->name('Stock');

//Ruta facturaciondetalle
Route::get('/facturaciondetalle',
[App\Http\Controllers\ReportControllerFacturacionDetalle::class, 'indexfacturaciondetalle'])
->name('facturaciondetalle');

//Ruta productosmascomprados
Route::get('/productosmascomprados',
[App\Http\Controllers\ReportControllerProductomascomprados::class, 'indexproductomascomprados'])
->name('productosmascomprados');

//Ruta productosmasvendidos
Route::get('/productosmasvendidos',
[App\Http\Controllers\ReportControllerProductosmasvendidos::class, 'indexproductomasvendidos'])
->name('productosmasvendidos');

//Ruta productomasdevuelto
Route::get('/productomasdevuelto',
[App\Http\Controllers\ReportControllerProductosmasdevueltos::class, 'indexproductomasdevueltos'])
->name('productomasdevuelto');

//Ruta usuarioconmasventas
Route::get('/usuarioconmasventas',
[App\Http\Controllers\ReportControllerUsuarioMaximasVentas::class, 'indexusuarioconmasventas'])
->name('usuarioconmasventas');

//Ruta compracondetalles
Route::get('/compracondetalles',[App\Http\Controllers\ReportControllerCompraDetalle::class, 'indexCompracondetalles'])
->name('compracondetalles');

//reportdevolucioncondetalles
Route::get('/reportedevolucioncondetalles', 
[App\Http\Controllers\ReportControllerDevoluciondetalle::class, 'indexdevolucioncondetalles'])
->name('reportedevolucioncondetalles');

//reportstockproxagotarse
Route::get('/reportstockproxagotarse', 
[App\Http\Controllers\ReportControllerStockProxAgotar::class, 'indexreportstockproxagotarse'])
->name('reportstockproxagotarse');

//reportProveedores
Route::get('/reportproveedores', 
[App\Http\Controllers\ReportControllerModeloproveedores::class, 'indexreportproveedores'])
->name('reportproveedores');

//nuevo perfil pdf

//reporteproductosmascomprados
Route::get('/ReportePdfProductosMasComprados', 
[App\Http\Controllers\ReportControllerProductomascomprados::class, 'stockProductoMasCompradosPDF'])
->name('ReportePdfProductosMasComprados');
//reporteproductosmasvendidos
Route::get('/ReportePdfProductosMasVendidos', 
[App\Http\Controllers\ReportControllerProductosmasvendidos::class, 'stockProductoMasvendidosPDF'])
->name('ReportePdfProductosMasVendidos');
//reporteproductosmasdevueltos
Route::get('/ReportePdfProductosMasDevueltos', 
[App\Http\Controllers\ReportControllerProductosmasdevueltos::class, 'stockProductoMasdevueltosPDF'])
->name('ReportePdfProductosMasDevueltos');
//reporteusuarioconmasventas
Route::get('/ReportePdfusuarioconmasventas', 
[App\Http\Controllers\ReportControllerUsuarioMaximasVentas::class, 'stockusuarioconmasventasPDF'])
->name('ReportePdfusuarioconmasventas');
//reportStoctk
Route::get('/ReporteStock',
[App\Http\Controllers\ReportControllerstock::class, 'stockPDF'])
->name('ReporteStock');
//reportcompracondetalles
Route::get('/ReporteCompracondetalles',
[App\Http\Controllers\ReportControllerCompraDetalle::class, 'compracondetallesPdf'])
->name('ReporteCompracondetalles');
//reportdevolucioncondetalles
Route::get('/reportdevolucioncondetalles',
[App\Http\Controllers\ReportControllerDevoluciondetalle::class, 'devolucioncondetallePdf'])
->name('reportdevolucioncondetalles');
//reportfacturaciondetalle
Route::get('/reportfacturaciondetalle',
[App\Http\Controllers\ReportControllerFacturacionDetalle::class, 'facturaciondetallepdf'])
->name('reportfacturaciondetalle');
//reportstockproxagotarse
Route::get('/reportstockproxagotar',
[App\Http\Controllers\ReportControllerStockProxAgotar::class, 'stockproxagotarpdf'])
->name('reportstockproxagotar');
//reportproveedor
Route::get('/reportproveedor',
[App\Http\Controllers\ReportControllerModeloproveedores::class, 'stockproveedorpdf'])
->name('reportproveedor');

