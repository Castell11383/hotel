<?php 
require_once __DIR__ . '/../includes/app.php';


use MVC\Router;
use Controllers\AppController;
use Controllers\HabitacionController;
use Controllers\ReservacionController;
use Controllers\EmpleadoController;
use Controllers\ClienteController;
use Controllers\FacturaController;
use Model\Cliente;
use Model\Empleado;

$router = new Router();
$router->setBaseURL('/' . $_ENV['APP_NAME']);

$router->get('/', [AppController::class,'index']);

// EMPLEADOS
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

//ruta habitacion
$router->get('/habitaciones', [HabitacionController::class, 'index']);

$router->get('/habitaciones/detalle', [HabitacionController::class, 'detalle']);
$router->post('/reservar', [HabitacionController::class, 'reservar']);
$router->post('/api/habitaciones/guardar', [HabitacionController::class, 'guardarApi']);

//reservaciones 
$router->post('/reservacion', [HabitacionController::class, 'reservacion']);
$router->get('/reservacion/detalle', [ReservacionController::class, 'index']);
$router->post('/reservacion/eliminar', [HabitacionController::class, 'eliminarReservacion']);
$router->post('/reservacion/modificar', [HabitacionController::class, 'modificarReservacion']);


//Factura
$router->get('/factura', [FacturaController::class,'index']);
$router->post('/API/factura/guardar', [FacturaController::class,'guardarAPI']);
$router->post('/API/factura/modificar', [FacturaController::class,'modificarAPI']);
$router->get('/API/factura/buscar', [FacturaController::class,'buscarAPI']);
$router->post('/API/factura/eliminar', [FacturaController::class,'eliminarAPI']);

// Comprueba y valida las rutas, que existan y les asigna las funciones del Controlador
$router->comprobarRutas();
