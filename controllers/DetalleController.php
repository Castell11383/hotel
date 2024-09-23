<?php

namespace Controllers;

use Exception;
use Model\Reservacion;
use Model\Habitacion;
use MVC\Router;

class DetalleController
{
    public static function index(Router $router)
    {
        $detalles = Reservacion::mostrarDetallesReservacion();
        $router->render('detalle/index', [
            'reservaciones' => $detalles
        ]);
    }

    public static function detalleReservacionAPI()
    {
        try {

            $sql = 'SELECT HABI_TIPO AS tipo_habitacion, COUNT(RESER_ID) AS cantidad_reservas FROM RESERVACION INNER JOIN HABITACION ON RESERVACION.RESER_HABITACION = HABITACION.HABI_ID WHERE RESERVACION.RESER_SITUACION = 1 GROUP BY HABI_TIPO ORDER BY cantidad_reservas DESC';

            $datos = Reservacion::fetchArray($sql);

            echo json_encode($datos);
        } catch (Exception $e) {
            echo json_encode([
                'detalle' => $e->getMessage(),
                'mensaje' => 'Ocurrió un error',
                'codigo' => 0
            ]);
        }
    }
}
