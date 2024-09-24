<?php

namespace Controllers;

use Exception;
use Model\Factura;
use MVC\Router;

class FacturaController
{
    public static function index(Router $router)
    {
        $facturas = Factura::find(2);
        $router->render('factura/index', [
            'facturas' => $facturas
        ]);
    }


    public static function guardarAPI()
    {

        $_POST['deta_empleado'] = htmlspecialchars($_POST['deta_empleado']);
        $_POST['nombre_cliente'] = htmlspecialchars($_POST['nombre_cliente']);
        $_POST['precio_habitacion'] = filter_var($_POST['precio_habitacion'], FILTER_SANITIZE_NUMBER_INT);
        $id = filter_var($_POST['deta_id'], FILTER_SANITIZE_NUMBER_INT);


        try {
            $factura = new Factura($_POST);
            $resultado = $factura->crear();
            http_response_code(200);
            echo json_encode([
                'codigo' => 1,
                'mensaje' => 'Factura guardado exitosamente',
            ]);
        } catch (Exception $e) {
            http_response_code(500);
            echo json_encode([
                'codigo' => 0,
                'mensaje' => 'Error al guardar factura',
                'detalle' => $e->getMessage(),
            ]);
        }
    }

    public static function buscarAPI()
    {
        try {
            // ORM - ELOQUENT
            // $facturas = Factura::all();
            $facturas = Factura::obtenerFacturaconQuery();
            http_response_code(200);
            echo json_encode([
                'codigo' => 1,
                'mensaje' => 'Datos encontrados',
                'detalle' => '',
                'datos' => $facturas
            ]);
        } catch (Exception $e) {
            http_response_code(500);
            echo json_encode([
                'codigo' => 0,
                'mensaje' => 'Error al buscar facturas$facturas',
                'detalle' => $e->getMessage(),
            ]);
        }
    }






    public static function modificarAPI()
    {
        $_POST['nombre_empleado'] = htmlspecialchars($_POST['nombre_empleado']);
        $_POST['deta_reservacion'] = htmlspecialchars($_POST['deta_reservacion']);
        $_POST['deta_total'] = filter_var($_POST['deta_total'], FILTER_SANITIZE_NUMBER_INT);
        $id = filter_var($_POST['deta_id'], FILTER_SANITIZE_NUMBER_INT);
        try {

            $factura = Factura::find($id);
            $factura->sincronizar($_POST);
            $factura->actualizar();
            http_response_code(200);
            echo json_encode([
                'codigo' => 1,
                'mensaje' => 'Factura modificado exitosamente',
            ]);
        } catch (Exception $e) {
            http_response_code(500);
            echo json_encode([
                'codigo' => 0,
                'mensaje' => 'Error al modificar factura',
                'detalle' => $e->getMessage(),
            ]);
        }
    }
    public static function eliminarAPI()
    {

        $id = filter_var($_POST['deta_id'], FILTER_SANITIZE_NUMBER_INT);
        try {

            $factura = Factura::find($id);
            $factura->sincronizar([
                'deta_situacion' => 0
            ]);
            $factura->actualizar();
            http_response_code(200);
            echo json_encode([
                'codigo' => 4,
                'mensaje' => 'factura eliminado exitosamente',
            ]);
        } catch (Exception $e) {
            http_response_code(500);
            echo json_encode([
                'codigo' => 0,
                'mensaje' => 'Error al Eliminar el factura',
                'detalle' => $e->getMessage(),
            ]);
        }
    }

    public static function totalAPI()
    {
        if (!isset($_POST['reser_id'])) {
            http_response_code(400);
            echo json_encode([
                'codigo' => 0,
                'mensaje' => 'Falta el parámetro reser_id.'
            ]);
            return;
        }


        $id = intval($_POST['reser_id']);

        try {
            $sql = "SELECT DETA_ID, EMP_NOMBRES AS deta_empleado, CLIE_NOMBRES AS deta_reservacion, CLIE_NIT AS nit_cliente, HABI_TIPO AS tipo_habitacion, HABI_PRECIO AS deta_total, HABI_DESCRIPCION AS descripcion_habitacion FROM DETALLE_FACTURA JOIN EMPLEADOS  ON DETA_EMPLEADO = EMP_ID JOIN RESERVACION  ON DETA_RESERVACION = RESER_ID JOIN CLIENTES  ON RESER_CLIENTE = CLIE_ID JOIN HABITACION  ON RESER_HABITACION = HABI_ID WHERE DETA_SITUACION = 1 AND reser_id = $id; ";


            $resultados = Factura::fetchFirst($sql);

            if (empty($resultados)) {
                http_response_code(204);
                echo json_encode([
                    'codigo' => 1,
                    'mensaje' => 'No se encontraron registros para el ID proporcionado.'
                ]);
                return;
            }


            http_response_code(200);
            echo json_encode($resultados);
        } catch (Exception $e) {
            http_response_code(500);
            echo json_encode([
                'codigo' => 0,
                'mensaje' => 'Error al buscar el total.',
                'detalle' => $e->getMessage(),
            ]);
        }
    }
}
