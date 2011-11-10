<?php
require_once '../model/producto.php';
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
        $pedido= self::buscarPorId($id);
        $pedido->setCantidad($cantidad);
        $pedido->actualizar();
        //falta verificar con el minimo
    }
}
?>
