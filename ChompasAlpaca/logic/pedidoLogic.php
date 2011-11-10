<?php
require_once '../model/pedido.php';
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
