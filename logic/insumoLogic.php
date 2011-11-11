<?php
require_once '../model/insumo.php';
abstract class insumoLogic {
    public static function getAll(){
        $insumo= new insumo();
        return $insumo->listar();
    }
     public static function buscarPorId($id){
        $todos=self::getAll();
        foreach ($todos as $p) {
            if($p->getInsumoId()==$id){
                return $p;
            }

        }
        return null;
    }
}
?>
