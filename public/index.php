<?php 
require_once __DIR__ . '/../includes/app.php';


use MVC\Router;
use Controllers\AppController;
use Controllers\HabitacionController;
use Controllers\ReservacionController;

$router = new Router();
$router->setBaseURL('/' . $_ENV['APP_NAME']);

$router->get('/', [AppController::class,'index']);


//ruta habitacion
$router->get('/habitaciones', [HabitacionController::class, 'index']);



$router->get('/habitaciones/detalle', [HabitacionController::class, 'detalle']);
$router->post('/reservar', [HabitacionController::class, 'reservar']);
$router->post('/api/habitaciones/guardar', [HabitacionController::class, 'guardarApi']);


//reservaciones 
$router->post('/reservacion', [HabitacionController::class, 'reservacion']);
$router->get('/reservacion/detalle', [ReservacionController::class, 'index']);
$router->get('/API/reservaciones/buscar', [ReservacionController::class,'buscarApi']);
$router->post('/API/reservaciones/guardar', [ReservacionController::class,'guardarApi']);
$router->post('/API/reservaciones/modificar', [ReservacionController::class,'modificarApi']);
$router->post('/API/reservaciones/eliminar', [ReservacionController::class,'eliminarApi']);

// $router->post('/confirmar-reservacion', 'HabitacionController::confirmarReservacion');
// $router->post('/guardar-reservacion', 'HabitacionController::guardarReservacion');

// Comprueba y valida las rutas, que existan y les asigna las funciones del Controlador
$router->comprobarRutas();
