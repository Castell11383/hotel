<?php

namespace Model;

class Reservacion extends ActiveRecord {
    public static $tabla = 'reservacion';
    public static $columnasDB = ['reser_id', 'reser_cliente', 'reser_habitacion', 'reser_fecha_entrada', 'reser_fecha_salida', 'reser_situacion'];

    public static $idTabla = 'reser_id';

    public $reser_id;
    public $reser_cliente;
    public $reser_habitacion;
    public $reser_fecha_entrada;
    public $reser_fecha_salida;
    public $reser_situacion;

    public function __construct($args = []) {
        $this->reser_id = $args['reser_id'] ?? null;
        $this->reser_cliente = $args['reser_cliente'] ?? '';
        $this->reser_habitacion = $args['reser_habitacion'] ?? '';
        $this->reser_fecha_entrada = $args['reser_fecha_entrada'] ?? '';
        $this->reser_fecha_salida = $args['reser_fecha_salida'] ?? '';
        $this->reser_situacion = $args['reser_situacion'] ?? 1;  // Activa por defecto
    }

    // Método para crear la reservación en la base de datos
    public function crear() {
        $query = "INSERT INTO " . self::$tabla . " (reser_cliente, reser_habitacion, reser_fecha_entrada, reser_fecha_salida, reser_situacion) ";
        $query .= "VALUES (:cliente, :habitacion, :fecha_entrada, :fecha_salida, :situacion)";

        $stmt = self::$db->prepare($query);
        $stmt->bindParam(':cliente', $this->reser_cliente);
        $stmt->bindParam(':habitacion', $this->reser_habitacion);
        $stmt->bindParam(':fecha_entrada', $this->reser_fecha_entrada);
        $stmt->bindParam(':fecha_salida', $this->reser_fecha_salida);
        $stmt->bindParam(':situacion', $this->reser_situacion);

        return $stmt->execute();  // Ejecutar la consulta y devolver true o false
    }
    public static function obtenerReservacionconQuery()
    {
        $sql = "SELECT * FROM reservacion where reser_situacion = 1";
        return self::fetchArray($sql);
    }

    public static function buscar()
    {
        $sql = "SELECT reser_id, clie_nombres, clie_apellidos
        FROM reservacion 
        JOIN clientes  ON reser_cliente = clie_id
        WHERE reser_situacion = 1;";
        return self::fetchArray($sql);
    }

}
