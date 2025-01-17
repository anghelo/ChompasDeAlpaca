<?php
require_once '../model/pedido.php';
require_once 'productoLogic.php';
require_once 'productoLogic.php';
abstract class pedidoLogic {
     public static function getAll(){
        $pedido= new pedido();
        return $pedido->listar();
    }
     public static function buscarPorId($id){
        $todos=self::getAll();
        foreach ($todos as $p) {
            if($p->getPedidoId()==$id){
                return $p;
            }

        }
        return null;
    }
    public static function getPedidosPendientes(){
        $todos=self::getAll();
        $encontrados=array();
        foreach ($todos as $p) {
            if($p->getEstado()==0){                
                $producto=  productoLogic::buscarPorId($p->getProductoId());
                $encontrados[]= array($p,$producto);
            }

        }
        return $encontrados;
    }
     public static function getPedidosRealizados(){
        $todos=self::getAll();
        $encontrados=array();
        foreach ($todos as $p) {
            if($p->getEstado()==1){
                $producto=  productoLogic::buscarPorId($p->getProductoId());
                $encontrados[]= array($p,$producto);
            }

        }
        return $encontrados;
    }
    public static function insertar( $fecha, $cantidad, $productoId){
        $pedido= new pedido('null', $fecha, $cantidad, $productoId, 0);
        return $pedido->insertar();
    }
    public static function modificar($id){
        $pedido= self::buscarPorId($id);
        $pedido->setEstado(1);
        $pedido->actualizar();
        $producto=productoLogic::buscarPorId($pedido->getPedidoId());
        productoLogic::modificar($pedido->getProductoId(), $pedido->getCantidad());
    }
}
?>
