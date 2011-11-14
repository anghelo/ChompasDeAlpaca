<?php
require_once '../conexion/SQL.php';
require_once '../conexion/Persistence.php';
class usuario {
    private $usuarioId;
    private $usuario;
    private $contrasena;
    function __construct($id="", $usuario="", $contrasena="") {
        $this->usuarioId = $id;
        $this->usuario = $usuario;
        $this->contrasena = $contrasena;
    }
    public function getUsuarioId() {
        return $this->usuarioId;
    }

    public function getUsuario() {
        return $this->usuario;
    }

    public function getContrasena() {
        return $this->contrasena;
    }
   public function listar(){
        $sql = new SQL();
        $sql->addTable('usuario');
        $sql->addTipo('consultar');
        $todos= Persistence::consultar($sql, 1);
        $lista = array();
        foreach($todos as $p){
            $id=$p['usuarioId'];
            $usuario = $p['usuario'];
            $contrasena=$p['contrasena'];
            $nusuario = new usuario($id, $usuario, $contrasena);
            $lista[] = $nusuario;
        }
        return $lista;
    }



}
?>
