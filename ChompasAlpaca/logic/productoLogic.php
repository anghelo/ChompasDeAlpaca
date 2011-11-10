<?php
require_once '../model/producto.php';
require_once 'pedidoLogic.php';
abstract class productoLogic {
   public static function getAll(){
        $producto= new producto();
        return $producto->listar();
    }
     public static function buscarPorId($id){
        $todos=self::getAll();
        foreach ($todos as $p) {
            if($p->getProductoId()==$id){
                return $p;
            }

        }
        return null;
    }
    public static function modificar($id,$cantidad){
        $producto= self::buscarPorId($id);
        $producto->setCantidad($producto->getCantidad()+ $cantidad);
        $producto->actualizar();
        if($producto->getCantidad()<$producto->getMinimo()){
            pedidoLogic::insertar(date('Y-m-d'), $producto->getCantidadPedido(), $producto->getProductoId());
        }
    }
}
?>
