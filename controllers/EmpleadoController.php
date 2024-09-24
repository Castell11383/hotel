<?php

namespace Controllers;

use Exception;
use Model\Empleado;
use MVC\Router;
use Model\ActiveRecord;

class EmpleadoController
{
    public static function index(Router $router)
    {
        isAuth();
        hasPermission(['TIENDA_ADM',]);
        $router->render('empleados/index', []);
    }

    public static function guardarAPI()
    {
        $nombres = htmlspecialchars($_POST['emp_nombres']);
        $apellidos = htmlspecialchars($_POST['emp_apellidos']);
        $telefono = filter_var($_POST['emp_telefono'], FILTER_VALIDATE_INT);
        $cargo = htmlspecialchars($_POST['emp_cargo']); 
        $genero = htmlspecialchars($_POST['emp_genero']);

        try {
            $empleado = new Empleado($_POST);
            $resultado = $empleado->crear();
            http_response_code(200);
            echo json_encode([
                'codigo' => 1,
                'mensaje' => 'Empleado Guardado Correctamente'
            ]);
        } catch (Exception $error) {
            http_response_code(500);
            echo json_encode([
                'codigo' => 0,
                'mensaje' => 'Error al Guardar el Empleado',
                'detalle' => $error->getMessage()
            ]);
        }
    }

    public static function BuscarAPI()
    {
        try {
            $sql = "SELECT * FROM empleados where emp_situacion = 1";

            $empleados = Empleado::fetchArray($sql);
            http_response_code(200);
            echo json_encode($empleados);
        } catch (Exception $e) {
            http_response_code(500);
            echo json_encode([
                'codigo' => 0,
                'mensaje' => 'Error al buscar los empleados',
                'detalle' => $e->getMessage(),
            ]);
        }
    }

    public static function modificarAPI()
    {
        $_POST['emp_nombres'] = htmlspecialchars($_POST['emp_nombres']);
        $_POST['emp_apellidos'] = htmlspecialchars($_POST['emp_apellidos']);
        $_POST['emp_telefono'] = filter_var($_POST['emp_telefono'], FILTER_SANITIZE_NUMBER_INT);
        $_POST['emp_cargo'] = htmlspecialchars($_POST['emp_cargo']);
        $_POST['emp_genero'] = htmlspecialchars($_POST['emp_genero']);
        $id = filter_var($_POST['emp_id'], FILTER_SANITIZE_NUMBER_INT);
    
        try {
            $empleado = Empleado::find($id);
            $empleado->sincronizar($_POST);
            $empleado->actualizar();
            http_response_code(200);
            echo json_encode([
                'codigo' => 3,
                'mensaje' => 'Empleado modificado exitosamente',
            ]);
        } catch (Exception $e) {
            http_response_code(500);
            echo json_encode([
                'codigo' => 0,
                'mensaje' => 'Error al modificar Empleado',
                'detalle' => $e->getMessage(),
            ]);
        }
    }

    public static function eliminarAPI()
    {
        
        $id = filter_var($_POST['emp_id'], FILTER_SANITIZE_NUMBER_INT);
        try {
            
            $empleado = Empleado::find($id);
            $empleado->sincronizar([
                'emp_situacion' => 0
            ]);
            $empleado->actualizar();
            http_response_code(200);
            echo json_encode([
                'codigo' => 4,
                'mensaje' => 'Empleado eliminado exitosamente',
            ]);
        } catch (Exception $e) {
            http_response_code(500);
            echo json_encode([
                'codigo' => 0,
                'mensaje' => 'Error al Eliminar el Empleado',
                'detalle' => $e->getMessage(),
            ]);
        }
    }
    
}
