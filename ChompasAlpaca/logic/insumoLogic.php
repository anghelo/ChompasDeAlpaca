<?php
require_once '../model/insumo.php';
abstract class insumoLogic {
    public static function getAll(){
        $insumo= new insumo();
        return $insumo->listar();
    }
}
?>
