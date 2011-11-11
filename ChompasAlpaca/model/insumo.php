<?php
require_once '../conexion/SQL.php';
require_once '../conexion/Persistence.php';
class insumo{
    private $insumoId;
    private $nombre;
    public function __construct($insumoId="",$nombre=""){
        $this->insumoId = $insumoId;
        $this->nombre = $nombre;
    }
    public function getInsumoId(){return $this->insumoId;}
    public function getNombre(){return $this->nombre;}
    public function listar(){
        $sql = new SQL();
        $sql->addTable('insumo');
        $sql->addTipo('consultar');
        $todos= Persistence::consultar($sql, 1);
        $lista = array();
        foreach($todos as $insumo){
            $insumoId=$insumo['insumoId'];
            $nombre = $insumo['nombre'];
            $ninsumo = new insumo($insumoId, $nombre);
            $lista[] = $ninsumo;
        }
        return $lista;
    }
}
?>