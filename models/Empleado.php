<?php
namespace Model;

class Empleado extends ActiveRecord
{
    protected static $tabla = 'empleados';
    protected static $idTabla = 'emp_id';

    protected static $columnasDB = ['emp_nombres', 'emp_apellidos', 'emp_telefono', 'emp_cargo', 'emp_genero', 'emp_situacion'];

    public $emp_id;
    public $emp_nombres;
    public $emp_apellidos;
    public $emp_telefono;
    public $emp_cargo;
    public $emp_genero;
    public $emp_situacion;

    public function __construct($args = [])
    {
        $this->emp_id = $args['emp_id'] ?? null;
        $this->emp_nombres = $args['emp_nombres'] ?? '';
        $this->emp_apellidos = $args['emp_apellidos'] ?? '';
        $this->emp_telefono = $args['emp_telefono'] ?? 0;
        $this->emp_cargo = $args['emp_cargo'] ?? '';
        $this->emp_genero = $args['emp_genero'] ?? '';
        $this->emp_situacion = $args['emp_situacion'] ?? 1;
    }


}