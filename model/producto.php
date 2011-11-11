<?php
require_once '../conexion/SQL.php';
require_once '../conexion/Persistence.php';
class producto{
    private $productoId;
    private $nombre;
    private $cantidad;
    private $insumoId;
    private $minimo;
    private $cantidadPedido;
    public function __construct($productoId="",$nombre="",$cantidad="",$insumoId="",$minimo="",$cantidadPedido=""){
        $this->productoId = $productoId;
        $this->nombre = $nombre;
        $this->cantidad = $cantidad;
        $this->insumoId = $insumoId;
        $this->minimo = $minimo;
        $this->cantidadPedido = $cantidadPedido;
    }
    public function getProductoId(){return $this->productoId;}
    public function getNombre(){return $this->nombre;}
    public function getCantidad(){return $this->cantidad;}
    public function getInsumoId(){return $this->insumoId;}
    public function getMinimo(){return $this->minimo;}
    public function getCantidadPedido(){return $this->cantidadPedido;}
    public function setCantidad($cantidad) {
        $this->cantidad = $cantidad;
    }
    public function listar(){
        $sql = new SQL();
        $sql->addTable('producto');
        $sql->addTipo('consultar');
        $todos= Persistence::consultar($sql, 1);
        $lista = array();
        foreach($todos as $p){
            $productoId=$p['productoId'];
            $nombre = $p['nombre'];
            $cantidad=$p['cantidad'];
            $insumoId=$p['insumoId'];
            $minimo=$p['minimo'];
            $cantidadPedido=$p['cantidadPedido'];
            $producto = new producto($productoId, $nombre, $cantidad, $insumoId, $minimo, $cantidadPedido);
            $lista[] = $producto;
        }
        return $lista;
    }
    public function actualizar(){
        $sql = new SQL();
        $sql->addTable("producto");
        $sql->addTipo('actualizar');
        $sql->addValues("cantidad = '$this->cantidad'");
        $sql->addWhere("productoId='$this->productoId'");
        Persistence::consultar($sql, 0);
    }
}
?>