<?php
require_once '../logic/productoLogic.php';
require_once '../logic/insumoLogic.php';
require_once '../logic/pedidoLogic.php';
require_once '../logic/CarritoLogic.php';
session_start();
abstract class ChompasView {

public static function ejecutar(){
    $productos=productoLogic::getAll();
    $pendientes=  pedidoLogic::getPedidosPendientes();
    $opcion=null;
    if(isset($_GET['opcion'])){
    $opcion=$_GET['opcion'];}
     if($opcion == null){
         self::_mostrarInicio($productos,$pendientes);
        }else{
            switch ($opcion){
                case 'comprar':
                    $id=$_POST['producto'];
                    $micarrito = new CarritoLogic();
                    $producto=productoLogic::buscarPorId($id);
                    $cantidad=$_POST['cantidad'];
                    $micarrito->addProducto($producto,$cantidad);
                    $lista= $micarrito->getProductos();
                    self::_mostrarCarrito($lista);
                    break;
               case 'eliminar':
                    $id=$_GET['id'];
                    $micarrito = new CarritoLogic();
                    $micarrito->deleteProducto($id);
                    $lista= $micarrito->getProductos();
                    self::_mostrarCarrito($lista);
                    break;
                case 'procesar':
                    $micarrito = new CarritoLogic();
                    $todos=$micarrito->getProductos();
                    foreach($todos as $p){
                        productoLogic::modificar($p[0]->getProductoId(),- $p[1]);
                    }
                    self::_mostrarInicio($productos,$pendientes);
                    break;
                case 'cerrar':
                    session_destroy();
                    header("location:../index.php");
                    break;

            }
        }
    
}
public static function _mostrarInicio($lista,$pendientes){
    require_once 'Inicio.html';
}
public static function _mostrarCarrito($lista){
    require_once 'carrito.html';
}
}
ChompasView::ejecutar();
?>
