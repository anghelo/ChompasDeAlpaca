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
                
                $producto=  productoLogic::buscarPorId($p->getPedidoId());
                $insumo=  insumoLogic::buscarPorId($producto->getInsumoId());
                $encontrados[]= array($p,$insumo->getNombre(),$producto->getNombre());
            }

        }
        return $encontrados;
    }
    public static function insertar( $fecha, $cantidad, $insumoId){
        $pedido= new pedido(null, $fecha, $cantidad, $insumoId, 0);
        return $pedido->insertar();
    }
    public static function modificar($id){
        $pedido= self::buscarPorId($id);
        $pedido->setEstado(1);
        $pedido->actualizar();
    }
}
?>
