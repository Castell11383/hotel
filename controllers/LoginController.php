<?php

namespace Controllers;

use Exception;
use Model\Permiso;
use Model\Usuario;
use MVC\Router;
//hasPermission

class LoginController
{
    public static function login(Router $router)
    {
       // isNotAuth();
        $router->render('/auth/login', [], 'layouts/layout');
    }

    public static function logout()
    {
        isAuth();
        $_SESSION = [];
        session_destroy();
        header('Location: /hotel/');
    }

    public static function loginAPI()
    {
        getHeadersApi();
        $_POST['usu_nit'] = filter_var($_POST['usu_nit'], FILTER_SANITIZE_NUMBER_INT);
        $_POST['usu_password'] = htmlspecialchars($_POST['usu_password']);
        try {
            $usuario = new Usuario($_POST);
            
            if ($usuario->validarUsuarioExistente()) {
                $usuarioBD = $usuario->usuarioExistente();
                // echo json_encode($usuarioBD);
                // return;
                //VALIDA QUE LA CONTRASEÑA ESTE CORRECTA
                if (password_verify($_POST['usu_password'], $usuarioBD['usu_password'])) {
                    session_start();
                    $_SESSION['user'] = $usuarioBD;
                    
                    $permisos = Permiso::fetchArray("SELECT * FROM permiso inner join rol on permiso_rol = rol_id where rol_situacion = 1 AND permiso_usuario = " . $usuarioBD['usu_id']);
                    foreach ($permisos as $permiso) {
                        $_SESSION[$permiso['rol_nombre_ct']] = 1;
                        
                        
                    }
                    
                    // echo json_encode($_SESSION);
                    // return;
                    http_response_code(200);
                    echo json_encode([
                        'codigo' => 1,
                        'mensaje' => 'Bienvenido al sistema, ' . $usuarioBD['usu_nombre'],
                    ]);
                    
                    exit;
                } else {
                    http_response_code(404);
                    echo json_encode([
                        'codigo' => 0,
                        'mensaje' => 'La constraseña no coincide',
                        'detalle' => 'Verifique la contraseña ingresada',
                    ]);
                    exit;
                }
            } else {
                http_response_code(404);
                echo json_encode([
                    'codigo' => 0,
                    'mensaje' => 'El usuario no existe',
                    'detalle' => 'No existe un usuario registrado con el catalogo proporcionado',
                ]);
                exit;
            }
        } catch (Exception $e) {
            http_response_code(500);
            echo json_encode([
                'codigo' => 0,
                'mensaje' => 'Error al generar usuario',
                'detalle' => $e->getMessage(),
            ]);
            exit;
        }
        
    }


    public static function menu(Router $router)
    {
        isAuth();
         hasPermission(['TIENDA_ADMIN', 'TIENDA_USER']);
        $router->render('pages/menu', [], 'layouts/menu');
    }
}