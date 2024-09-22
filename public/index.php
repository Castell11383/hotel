<?php 
require_once __DIR__ . '/../includes/app.php';


use MVC\Router;
use Controllers\AppController;
use Controllers\ClienteController;
use Model\Cliente;

$router = new Router();
$router->setBaseURL('/' . $_ENV['APP_NAME']);

$router->get('/', [AppController::class,'index']);

//Cliente
$router->get('/cliente', [ClienteController::class,'index']);
$router->post('/API/cliente/guardar', [ClienteController::class,'guardarAPI']);
$router->post('/API/cliente/modificar', [ClienteController::class,'modificarAPI']);
$router->get('/API/cliente/buscar', [ClienteController::class,'buscarAPI']);
$router->post('/API/cliente/eliminar', [ClienteController::class,'eliminarAPI']);




// Comprueba y valida las rutas, que existan y les asigna las funciones del Controlador
$router->comprobarRutas();
