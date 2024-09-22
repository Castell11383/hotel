<?php

namespace Model;

class Factura extends ActiveRecord
{
    protected static $tabla = 'detalle_factura';
    protected static $idTabla = 'deta_id';
    protected static $columnasDB = ['deta_empleado', 'deta_reservacion', 'deta_total', 'deta_situacion'];

    public $deta_id;
    public $deta_empleado;
    public $deta_reservacion;
    public $deta_total;
    public $deta_situacion;



    public function __construct($args = [])
    {
        $this->deta_id = $args['deta_id'] ?? null;
        $this->deta_empleado = $args['deta_empleado'] ?? '';
        $this->deta_reservacion = $args['deta_reservacion'] ?? '';
        $this->deta_total = $args['deta_total'] ?? '';
        $this->deta_situacion = $args['deta_situacion'] ?? 1;
    }

    public static function obtenerFacturaconQuery()
    {
        $sql = "SELECT * FROM detalle_factura where deta_situacion = 1";
        return self::fetchArray($sql);
    }

    
}
