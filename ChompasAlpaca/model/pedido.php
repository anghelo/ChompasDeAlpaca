<?php
require_once '../conexion/SQL.php';
require_once '../conexion/Persistence.php';
class pedido{
    private $pedidoId;
    private $fecha;
    private $cantidad;
    private $productoId;
    private $estado;
    public function __construct($pedidoId="",$fecha="",$cantidad="",$productoId="",$estado=""){
        $this->pedidoId = $pedidoId;
        $this->fecha = $fecha;
        $this->cantidad = $cantidad;
        $this->productoId = $productoId;
        $this->estado = $estado;
    }
    public function getPedidoId(){return $this->pedidoId;}
    public function getFecha(){return $this->fecha;}
    public function getCantidad(){return $this->cantidad;}
    public function getProductoId(){return $this->productoId;}
    public function getEstado(){return $this->estado;}
    public function setEstado($estado) {
        $this->estado = $estado;
    }

    public function listar(){
        $sql = new SQL();
        $sql->addTable('pedido');
        $sql->addTipo('consultar');
        $todos= Persistence::consultar($sql, 1);
        $lista = array();
        foreach($todos as $p){
            $pedidoId=$p['pedidoId'];
            $fecha = $p['fecha'];
            $cantidad=$p['cantidad'];
            $productoId=$p['productoId'];
            $estado=$p['estado'];
            $pedido = new pedido($pedidoId, $fecha, $cantidad, $productoId, $estado);
            $lista[] = $pedido;
        }
        return $lista;
    }
    public function insertar(){
        $sql = new SQL();
        $sql->addTable("pedido(pedidoId,fecha,cantidad,productoId,estado)");
        $sql->addTipo('insertar');
        $sql->addValues($this->pedidoId);
        $sql->addValues($this->fecha);
        $sql->addValues($this->cantidad);
        $sql->addValues($this->productoId);
        $sql->addValues($this->estado);
        return Persistence::ejecutarSentencia($sql,0);
    }
     public function actualizar(){
        $sql = new SQL();
        $sql->addTable("pedido");
        $sql->addTipo('actualizar');
        $sql->addValues("estado = '$this->estado'");
        $sql->addWhere("pedidoId='$this->pedidoId'");
        Persistence::consultar($sql, 0);
    }

}
?>