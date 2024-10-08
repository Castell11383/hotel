<?php 
require_once __DIR__ . '/../includes/app.php';

use MVC\Router;
use Controllers\AppController;
use Controllers\ReservacionController;
use Controllers\EmpleadoController;
use Controllers\ClienteController;
use Controllers\DetalleController;
use Controllers\HabitacionController;
use Controllers\InicioController;
use Controllers\FacturaController;
use Controllers\LoginController;
use Controllers\ReporteController;
use Controllers\MapaController;
use Controllers\RegistroController;

$router = new Router();
$router->setBaseURL('/' . $_ENV['APP_NAME']);

//INICIO
$router->get('/inicio', [InicioController::class,'index']);
$router->get('/', [LoginController::class,'login']);
$router->post('/API/login', [LoginController::class,'loginAPI']);
$router->get('/logout', [LoginController::class,'logout']);

//EMPLEADOS
$router->get('/empleados', [EmpleadoController::class, 'index']);
$router->post('/API/empleado/guardar', [EmpleadoController::class, 'guardarAPI']);
$router->get('/API/empleado/buscar', [EmpleadoController::class, 'buscarAPI']);
$router->post('/API/empleado/modificar', [EmpleadoController::class, 'modificarAPI']);
$router->post('/API/empleado/eliminar', [EmpleadoController::class, 'eliminarAPI']);

//cliente
$router->get('/cliente', [ClienteController::class,'index']);
$router->post('/API/cliente/guardar', [ClienteController::class,'guardarAPI']);
$router->post('/API/cliente/modificar', [ClienteController::class,'modificarAPI']);
$router->get('/API/cliente/buscar', [ClienteController::class,'buscarAPI']);
$router->post('/API/cliente/eliminar', [ClienteController::class,'eliminarAPI']);


//habitacion
$router->get('/habitaciones', [HabitacionController::class, 'index']);
$router->get('/habitaciones/detalle', [HabitacionController::class, 'detalle']);
$router->post('/reservar', [HabitacionController::class, 'reservar']);
$router->post('/api/habitaciones/guardar', [HabitacionController::class, 'guardarApi']);

//reservaciones 
$router->post('/reservacion', [ReservacionController::class, 'reservacion']);
$router->get('/reservaciones/detalle', [ReservacionController::class, 'index']);
$router->get('/API/reservaciones/buscar', [ReservacionController::class,'buscarApi']);
$router->post('/API/reservaciones/guardar', [ReservacionController::class,'guardarApi']);
$router->post('/API/reservaciones/modificar', [ReservacionController::class,'modificarApi']);
$router->post('/API/reservaciones/eliminar', [ReservacionController::class,'eliminarApi']);

//Factura
$router->get('/factura', [FacturaController::class,'index']);
$router->post('/API/factura/guardar', [FacturaController::class,'guardarAPI']);
$router->post('/API/factura/modificar', [FacturaController::class,'modificarAPI']);
$router->get('/API/factura/buscar', [FacturaController::class,'buscarAPI']);
$router->post('/API/factura/eliminar', [FacturaController::class,'eliminarAPI']);
$router->post('/API/factura/obtenertotal', [FacturaController::class,'totalAPI']);

//PDF
$router->post('/API/generarPDF', [ReporteController::class, 'pdf']);

//MAPA
$router->get('/inicio', [MapaController::class, 'index']);

//DETALLE
$router->get('/detalle', [DetalleController::class, 'index']);
$router->get('/API/detalle/index', [DetalleController::class, 'detalleReservacionAPI']);

//REGISTRO CLIENTES
$router->get('/registro', [RegistroController::class,'index']);
$router->post('/API/registro/guardar', [RegistroController::class,'guardarAPI']);


//IMPRIMIR PDF HISTORIAL
$router->get('/reservaciones/imprimir-pdf', [ReservacionController::class, 'imprimirPdf']);



// Comprueba y valida las rutas, que existan y les asigna las funciones del Controlador
$router->comprobarRutas();
