<?php

namespace Controllers;

use Model\Habitacion;
use MVC\Router;

class HabitacionController {

    // Mostrar las habitaciones disponibles
    public static function index(Router $router) {
        isAuth();
        hasPermission(['TIENDA_ADM', 'TIENDA_EMP', 'TIENDA_EMP']);
        $habitaciones = Habitacion::all(); // Traer todas las habitaciones activas
        $router->render('habitaciones/index', [
            'habitaciones' => $habitaciones
        ]);
    }

    // Mostrar los detalles de una habitación específica
    public static function detalle(Router $router) {
        $id = $_GET['id'] ?? null;
        if (!$id) {
            header('Location: /habitaciones');
            exit;
        }
    
        $habitacion = Habitacion::find($id);
        if (!$habitacion) {
            header('Location: /habitaciones');
            exit;
        }
    
        $router->render('habitaciones/detalle', [
            'habitacion' => $habitacion
        ]);
    }
}
