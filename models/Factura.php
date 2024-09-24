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
        $sql = "  SELECT 
    DETA_ID,
    EMP_NOMBRES AS deta_empleado,
    CLIE_NOMBRES AS deta_reservacion,
    CLIE_NIT AS nit_cliente,
    HABI_TIPO AS tipo_habitacion,
    HABI_PRECIO AS deta_total,
    HABI_DESCRIPCION AS descripcion_habitacion
FROM 
    DETALLE_FACTURA 
JOIN 
    EMPLEADOS  ON DETA_EMPLEADO = EMP_ID
JOIN 
    RESERVACION  ON DETA_RESERVACION = RESER_ID
JOIN 
    CLIENTES  ON RESER_CLIENTE = CLIE_ID
JOIN 
    HABITACION  ON RESER_HABITACION = HABI_ID
WHERE 
    DETA_SITUACION = 1;";
        return self::fetchArray($sql);
    }

    
}
