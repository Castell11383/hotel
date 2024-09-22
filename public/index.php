<?php 
require_once __DIR__ . '/../includes/app.php';


use MVC\Router;
use Controllers\AppController;
use Controllers\EmpleadoController;
use Model\Empleado;
use Controllers\ClienteController;
use Model\Cliente;


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

// Comprueba y valida las rutas, que existan y les asigna las funciones del Controlador
$router->comprobarRutas();
