<?php
class CarritoLogic {
    private $_colProductos = array();
    public function __construct() {
        if(isset ($_SESSION['carrito'])){
        $this->_colProductos = unserialize($_SESSION['carrito']);
        
        }
    }
    public function addProducto($producto,$cant){
        $cantidad=0;
        if(isset( $this->_colProductos[$producto->getProductoId()][1])){
            $cantidad= $this->_colProductos[$producto->getProductoId()][1];
        }
        if($cantidad+$cant<$producto->getCantidad()){
            $this->_colProductos[$producto->getProductoId()]= array($producto,$cantidad+$cant);

        }
             $_SESSION['carrito']  =serialize($this->_colProductos);
    }

    public function deleteProducto($id){
        $cantidad= $this->_colProductos[$id][1];
        unset($this->_colProductos[$id]);
        $_SESSION['carrito']  = serialize($this->_colProductos);

    }
    public function getProductos(){
        return $this->_colProductos ;

    }
}

