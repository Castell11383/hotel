<?php 
require_once __DIR__ . '/../includes/app.php';


use MVC\Router;
use Controllers\AppController;
use Controllers\EmpleadoController;
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

// Comprueba y valida las rutas, que existan y les asigna las funciones del Controlador
$router->comprobarRutas();
