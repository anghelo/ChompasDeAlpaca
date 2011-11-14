<?php
require_once '../model/usuario.php';
abstract class UsuarioLogic {
    public static function getAll(){
        $u=new usuario();
        return $u->listar();
    }
    public static function validadUsuario($usuario,$contra){
        $todos= self::getAll();
        foreach ($todos as $u){
            if($u->getUsuario()==$usuario & $u->getContrasena()==$contra){
                return $u;
                break;
            }
        }
        return null;
    }
}
?>
