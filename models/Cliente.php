<?php

namespace Model;

class Cliente extends ActiveRecord
{
    protected static $tabla = 'clientes';
    protected static $idTabla = 'clie_id';
    protected static $columnasDB = ['clie_nombres', 'clie_apellidos', 'clie_genero', 'clie_correo', 'clie_direccion', 'clie_telefono', 'clie_pais', 'clie_nit', 'clie_password', 'clie_situacion'];

    public $clie_id;
    public $clie_nombres;
    public $clie_apellidos;
    public $clie_genero;
    public $clie_correo;
    public $clie_direccion;
    public $clie_telefono;
    public $clie_pais;
    public $clie_nit;
    public $clie_password;
    public $clie_situacion;



    public function __construct($args = [])
    {
        $this->clie_id = $args['clie_id'] ?? null;
        $this->clie_nombres = $args['clie_nombres'] ?? '';
        $this->clie_apellidos = $args['clie_apellidos'] ?? '';
        $this->clie_genero = $args['clie_genero'] ?? '';
        $this->clie_correo = $args['clie_correo'] ?? '';
        $this->clie_direccion = $args['clie_direccion'] ?? '';
        $this->clie_telefono = $args['clie_telefono'] ?? '';
        $this->clie_pais = $args['clie_pais'] ?? '';
        $this->clie_nit = $args['clie_nit'] ?? '';
        $this->clie_password = $args['clie_password'] ?? '';
        $this->clie_situacion = $args['clie_situacion'] ?? 1;
    }

    public static function obtenerClienteconQuery()
    {
        $sql = "SELECT * FROM clientes where clie_situacion = 1";
        return self::fetchArray($sql);
    }

    
    public static function buscar()
    {
        $sql = "SELECT * FROM clientes where clie_situacion = 1";
        return self::fetchArray($sql);
    }


    
}
