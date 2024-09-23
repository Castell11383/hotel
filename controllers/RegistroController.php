<?php

namespace Controllers;

use Exception;
use Model\Cliente;
use MVC\Router;

class RegistroController
{
    public static function index(Router $router)
    {
        $clientes = Cliente::find(2);
        $router->render('registro/index', [
            'clientes' => $clientes
        ]);
    }
   

    public static function guardarAPI()
    {
        $_POST['clie_nombres'] = htmlspecialchars($_POST['clie_nombres']);
        $_POST['clie_apellidos'] = htmlspecialchars($_POST['clie_apellidos']);
        $_POST['clie_genero'] = htmlspecialchars($_POST['clie_genero']);
        $_POST['clie_correo'] = htmlspecialchars($_POST['clie_correo']);
        $_POST['clie_direccion'] = htmlspecialchars($_POST['clie_direccion']);
        $_POST['clie_telefono'] = filter_var($_POST['clie_telefono'], FILTER_SANITIZE_NUMBER_INT);
        $_POST['clie_pais'] = htmlspecialchars($_POST['clie_pais']);
        $_POST['clie_nit'] = filter_var($_POST['clie_nit'], FILTER_SANITIZE_NUMBER_INT);
        $_POST['clie_password'] = htmlspecialchars($_POST['clie_password']);
        
        
        try {
            $cliente = new Cliente($_POST);
            $resultado = $cliente->crear();
            http_response_code(200);
            echo json_encode([
                'codigo' => 1,
                'mensaje' => 'Cliente guardado exitosamente',
            ]);
        } catch (Exception $e) {
            http_response_code(500);
            echo json_encode([
                'codigo' => 0,
                'mensaje' => 'Error al guardar cliente',
                'detalle' => $e->getMessage(),
            ]);
        }
    }

    
    

   
    

}
