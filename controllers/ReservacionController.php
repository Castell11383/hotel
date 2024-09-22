<?php

namespace Controllers;

use Exception;
use Model\Reservacion;
use Model\Cliente;
use Model\Habitacion;
use MVC\Router;

class ReservacionController
{

    // Muestra habitaciones y reservaciones en una sola vista
    public static function index(Router $router)
    {

        $cliente = $_GET['id'];

        $habitaciones = Habitacion::all();
        // $sql = "SELECT * from ........."
        // $habitacion = Cliente::fetchArray($sql);
        $reservaciones = Reservacion::all();

        $router->render('reservaciones/detalle', [
            'cliente' => $cliente,
            'habitaciones' => $habitaciones,
            'reservaciones' => $reservaciones
        ]);
    }

    // Guardar la reservación usando AJAX
    public static function guardarApi()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            try {
                // Obtener los datos del formulario
                
                $cliente_id = $_POST['clie_id'];
                $habitacion_id = $_POST['habi_id'];
                $fecha_entrada = date('Y-m-d H:i', strtotime($_POST['reser_fecha_entrada']));
                $fecha_salida = date('Y-m-d H:i', strtotime($_POST['reser_fecha_salida']));
                
                
                
                // Crear nueva reservación
                $reservacion = new Reservacion([
                    'reser_cliente' => $cliente_id,
                    'reser_habitacion' => $habitacion_id,
                    'reser_fecha_entrada' => $fecha_entrada,
                    'reser_fecha_salida' => $fecha_salida,
                    'reser_situacion' => 1 // Activa por defecto
                ]);

                $resultado = $reservacion->crear();

                if ($resultado) {
                    // Enviar respuesta con las nuevas reservaciones
                    $reservaciones = Reservacion::all();
                    echo json_encode([
                        'reservaciones' => $reservaciones,
                        'mensaje' => 'Reservación guardada correctamente'
                    ]);
                } else {
                    echo json_encode(['mensaje' => 'Error al guardar la reservación']);
                }
            } catch (Exception $e) {
                echo json_encode(['mensaje' => 'Error: ' . $e->getMessage()]);
            }
        }
    }
}
