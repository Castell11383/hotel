<?php

namespace Controllers;

use MVC\Router;

class InicioController {
    public static function index(Router $router){
        isAuth();
        hasPermission(['TIENDA_ADM','TIENDA_EMP','TIENDA_USE']);
        
        $router->render('inicio/index',[],'layouts/menu');
    }

}