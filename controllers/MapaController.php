<?php

namespace Controllers;

use MVC\Router;

class MapaController {

    public static function index(Router $router){
        isAuth();
        hasPermission(['TIENDA_ADM', 'TIENDA_EMP']);
        $router -> render ('inicio/index', []);
    }

}