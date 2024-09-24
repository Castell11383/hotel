<?php

namespace Controllers;

use Exception;
use Model\Reservacion;
use Model\Cliente;
use Model\Habitacion;
use Mpdf\Mpdf;
use MVC\Router;

class ReservacionController
{

    // Muestra habitaciones y reservaciones en una sola vista
    public static function index(Router $router)
    {
        isAuth();
        hasPermission(['TIENDA_ADM', 'TIENDA_EMP', 'TIENDA_EMP']);
        $cliente = $_GET['id'];

        $habitaciones = Habitacion::all();
        // $sql = "SELECT * from ........."
        // $habitacion = Cliente::fetchArray($sql);

         // Obtener las habitaciones ocupadas
         $habitacionesOcupadas = Reservacion::obtenerHabitacionesOcupadas();

        $reservaciones = Reservacion::all();

        $router->render('reservaciones/detalle', [
            'cliente' => $cliente,
            'habitaciones' => $habitaciones,
            'reservaciones' => $reservaciones,
            'habitacionesOcupadas' => $habitacionesOcupadas
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
    public static function buscarAPi()
    {
        try {
            // ORM - ELOQUENT
            // $Reservaciones = Cliente::all();
            
            $Reservaciones = Reservacion::obtenerReservacionconQuery();
            http_response_code(200);
            echo json_encode([
                'codigo' => 1,
                'mensaje' => 'Datos encontrados',
                'detalle' => '',
                'datos' => $Reservaciones
            ]);
        } catch (Exception $e) {
            http_response_code(500);
            echo json_encode([
                'codigo' => 0,
                'mensaje' => 'Error al buscar Reservaciones',
                'detalle' => $e->getMessage(),
            ]);
        }
    }



    //funcion modificar
    public static function modificarAPi()
    {
        // Sanitizar y validar las entradas
        $_POST['clie_id'] = filter_var($_POST['clie_id'], FILTER_SANITIZE_NUMBER_INT); // Usar clie_id en lugar de clie_nombres y clie_apellidos
        $_POST['habi_id'] = htmlspecialchars($_POST['habi_id'], FILTER_SANITIZE_NUMBER_INT);
        $_POST['reser_fecha_entrada'] = date('Y-m-d H:i', strtotime($_POST['reser_fecha_entrada']));
        $_POST['reser_fecha_salida'] = date('Y-m-d H:i', strtotime($_POST['reser_fecha_salida']));
        $id = filter_var($_POST['reser_id'], FILTER_SANITIZE_NUMBER_INT);
    
        // Validación simple para asegurarse de que no hay campos vacíos
        if (empty($id) || empty($_POST['clie_id']) || empty($_POST['habi_id']) || empty($_POST['reser_fecha_entrada']) || empty($_POST['reser_fecha_salida'])) {
            http_response_code(400);
            echo json_encode([
                'codigo' => 0,
                'mensaje' => 'Datos incompletos. Por favor, llena todos los campos.'
            ]);
            return;
        }
    
        try {
            // Buscar la reservación por ID
            $reservacion = Reservacion::find($id);
    
            if (!$reservacion) {
                http_response_code(404);
                echo json_encode([
                    'codigo' => 0,
                    'mensaje' => 'Reservación no encontrada.'
                ]);
                return;
            }
    
            // Sincronizar los nuevos datos
            $reservacion->sincronizar($_POST);
    
            // Actualizar la reservación en la base de datos
            $resultado = $reservacion->actualizar();
    
            if ($resultado) {
                http_response_code(200);
                echo json_encode([
                    'codigo' => 1,
                    'mensaje' => 'Reservación modificada exitosamente',
                ]);
            } else {
                throw new Exception('Error al actualizar la reservación.');
            }
        } catch (Exception $e) {
            http_response_code(500);
            echo json_encode([
                'codigo' => 0,
                'mensaje' => 'Error al modificar Reservación',
                'detalle' => $e->getMessage(),
            ]);
        }
    }


    public static function eliminarAPi()
    {
        
        $id = filter_var($_POST['reser_id'], FILTER_SANITIZE_NUMBER_INT);
        try {
            
            $reservacion = Reservacion::find($id);
            $reservacion->sincronizar([
                'reser_situacion' => 0
            ]);
            $reservacion->actualizar();
            http_response_code(200);
            echo json_encode([
                'codigo' => 4,
                'mensaje' => 'Reservacion eliminada exitosamente',
            ]);
        } catch (Exception $e) {
            http_response_code(500);
            echo json_encode([
                'codigo' => 0,
                'mensaje' => 'Error al Eliminar la reservacion',
                'detalle' => $e->getMessage(),
            ]);
        }
    }


    //imprimir historial pdf
    public static function imprimirPdf() {
        // Obtener los datos necesarios, como las reservaciones y habitaciones
        $reservaciones = Reservacion::mostrarDetallesReservacion();
        $habitaciones = Habitacion::all();
        

        // Cargar el contenido HTML que deseas convertir a PDF
        ob_start();
        include_once __DIR__ . '/../views/reservaciones/pdf.php'; // Tu archivo de vista
        $html = ob_get_clean();

        // Crear una instancia de mPDF
        $mpdf = new \Mpdf\Mpdf([
            'orientation' => 'L' // 'L' es para landscape (horizontal)
        ]);

        // Escribir el contenido HTML en el PDF
        $mpdf->WriteHTML($html);

        // Generar y descargar el PDF
        $mpdf->Output('reservaciones.pdf', 'I');  // 'D' es para descargar. Puedes cambiar a 'I' para visualizarlo en el navegador.
    }
}



