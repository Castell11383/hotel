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

    // // Método para crear la reservación en la base de datos
    // public function crear() {
    //     $query = "INSERT INTO " . self::$tabla . " (reser_cliente, reser_habitacion, reser_fecha_entrada, reser_fecha_salida, reser_situacion) ";
    //     $query .= "VALUES (:cliente, :habitacion, :fecha_entrada, :fecha_salida, :situacion)";

    //     $stmt = self::$db->prepare($query);
    //     $stmt->bindParam(':cliente', $this->reser_cliente);
    //     $stmt->bindParam(':habitacion', $this->reser_habitacion);
    //     $stmt->bindParam(':fecha_entrada', $this->reser_fecha_entrada);
    //     $stmt->bindParam(':fecha_salida', $this->reser_fecha_salida);
    //     $stmt->bindParam(':situacion', $this->reser_situacion);

    //     return $stmt->execute();  // Ejecutar la consulta y devolver true o false
    // }



    
    public static function obtenerReservacionconQuery()
    {
        $sql = "SELECT r.reser_id, 
       c.clie_nombres, 
       c.clie_apellidos, 
       h.habi_id,
       h.habi_tipo, 
       r.reser_fecha_entrada, 
       r.reser_fecha_salida
FROM reservacion r
JOIN clientes c ON r.reser_cliente = c.clie_id
JOIN habitacion h ON r.reser_habitacion = h.habi_id
WHERE r.reser_situacion = 1;";
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

//esta funcion sirve para mostrar el historial de reservaciones
    public static function mostrarDetallesReservacion() {
        $sql = "SELECT 
                    c.CLIE_NOMBRES || ' ' || c.CLIE_APELLIDOS AS NOMBRE_CLIENTE, 
                    c.CLIE_TELEFONO AS TELEFONO,
                    c.CLIE_CORREO AS CORREO, 
                    r.RESER_FECHA_ENTRADA AS ENTRADA, 
                    r.RESER_FECHA_SALIDA AS SALIDA, 
                    h.HABI_TIPO || ' - ' || h.HABI_DESCRIPCION AS DETALLES_HABITACION,
                    h.HABI_PRECIO AS TOTAL
                FROM 
                    clientes c
                INNER JOIN 
                    reservacion r ON c.CLIE_ID = r.RESER_CLIENTE
                INNER JOIN 
                    habitacion h ON r.RESER_HABITACION = h.HABI_ID
                WHERE 
                    r.RESER_SITUACION = 1";
        return self::fetchArray($sql);
    }


    //funciones para obtener las habitaciones ocupadas
    public static function obtenerHabitacionesOcupadas() {
        $sql = "SELECT reser_habitacion FROM reservacion WHERE reser_situacion = 1";
        return self::fetchArray($sql); // Ajusta el método `fetchArray` según tu implementación de la base de datos
    }


    //funcion para que en la tabla de reservaciones aparezca texo no id 
    // public function obtenerReservacionesConDetalles() {
    //     // La consulta SQL para obtener los nombres de clientes y el tipo de habitación
    //     $query = "
    //         SELECT r.reser_id, 
    //                c.clie_nombres, c.clie_apellidos, 
    //                h.habi_tipo, 
    //                r.reser_fecha_entrada, 
    //                r.reser_fecha_salida
    //         FROM reservaciones r
    //         JOIN clientes c ON r.reser_cliente = c.clie_id
    //         JOIN habitaciones h ON r.reser_habitacion = h.habi_id
    //         AND reservacion where reser_situacion = 1
    //     ";

    // }
}


