<?php
namespace Model;

class Usuario extends ActiveRecord
{
    protected static $tabla = 'usuario';
    protected static $idTabla = 'usu_id';

    protected static $columnasDB = ['usu_nombre', 'usu_nit','usu_password','usu_situacion'];

    public $usu_id;
    public $usu_nombre;
    public $usu_nit;
    public $usu_password;
    public $usu_situacion;

    public function __construct($args = [])
    {
        $this->usu_id = $args['usu_id'] ?? null;
        $this->usu_nombre = $args['usu_nombre'] ?? '';
        $this->usu_nit = $args['usu_nit'] ?? 0;
        $this->usu_password = $args['usu_password'] ?? '';
        $this->usu_situacion = $args['usu_situacion'] ?? 1;
    }

    public function validarUsuarioExistente() : bool
    {
        $sql = "SELECT * FROM usuario where usu_nit = $this->usu_nit";
        $resultado = static::fetchArray($sql);
        return $resultado ? true : false;
    }
    public function usuarioExistente(): array
    {
        $sql = "SELECT usu_id,usu_nombre, usu_password, usu_nit, rol_nombre_ct, rol_nombre from permiso inner join usuario on permiso_usuario = usu_id inner join rol on rol_id = permiso_rol inner join aplicacion on rol_app = app_id where permiso_situacion = 1 AND rol_situacion = 1 AND usu_nit = $this->usu_nit";
        $resultado = static::fetchFirst($sql);
        return $resultado;
    }

}