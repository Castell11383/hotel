<?php

namespace Controllers;

use Model\Reservacion;
use MVC\Router;

class DetalleController {


    public static function index(Router $router)
    {
        $detalles = Reservacion::mostrarDetallesReservacion();

        //var_dump($detalles); // Depuración para verificar qué datos se están obteniendo
        //  exit(); // Detén la ejecución para verificar el contenido

        // $detalles = Reservacion::find(2);
        $router->render('detalle/index', [
            'reservaciones' => $detalles
        ]);
    }
   
}



