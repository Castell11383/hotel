<?php

namespace Model;

class Habitacion extends ActiveRecord {
    public static $tabla = 'habitacion';
    public static $columnasDB = ['habi_id', 'habi_tipo', 'habi_imagen', 'habi_precio', 'habi_descripcion', 'habi_situacion'];
    public static $idTabla = 'habi_id';

    public $habi_id;
    public $habi_tipo;
    public $habi_imagen;
    public $habi_precio;
    public $habi_descripcion;
    public $habi_situacion;

    public function __construct($args = [])
    {
        $this->habi_id = $args['habi_id'] ?? null;
        $this->habi_tipo = $args['habi_tipo'] ?? '';
        $this->habi_imagen = $args['habi_imagen'] ?? '';
        $this->habi_precio = $args['habi_precio'] ?? '';
        $this->habi_descripcion = $args['habi_descripcion'] ?? '';
        $this->habi_situacion = $args['habi_situacion'] ?? 1;
    }

    // Obtener todas las habitaciones
    public static function all() {
        $query = "SELECT * FROM " . static::$tabla . " WHERE habi_situacion = 1";
        return self::fetchArray($query);
    }

    public static function buscar()
    {
        $sql = "SELECT * FROM habitacion where habi_situacion = 1";
        return self::fetchArray($sql);
    }

    // // Encontrar una habitación por su ID
//       public static function find($id) {
//            $query = "SELECT * FROM " . static::$tabla . " WHERE habi_id = $id AND habi_situacion = 1";
//            return self::fetchArray($query)[0] ?? null;
//        }
}
