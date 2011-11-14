<?php
require_once '../logic/UsuarioLogic.php';
session_start();
abstract class SeguridadView {
 public static function ejecutar() {
        $opcion = null;
        $mensaje = null;
        $usuarioNombre = "";
        $contrasenha = "";
        if (isset($_POST['usuario'])) {
            $usuarioNombre = $_POST['usuario'];
        }
        if (isset($_POST['contrasenha'])) {
            $contrasenha = $_POST['contrasenha'];
        }
        if (isset($_REQUEST['opcion'])) {
            $opcion = $_REQUEST['opcion'];
        }

        if ($opcion != null) {
            switch ($opcion) {
                case 'ingresar':
                    if ($contrasenha != "" & $usuarioNombre != "") {
                        $usuario = UsuarioLogic::validadUsuario($usuarioNombre, $contrasenha);
                        if ($usuario != null) {
                            $_SESSION['usuario'] = $usuario->getUsuarioId();
                            header("location:ChompasView.php");
                        }
                        else {
                        $mensaje = "El usuario y/o contraseña son incorrectos";
                        self::_mostrarIniciarSesion($mensaje);
                        }
                    } else {
                        $mensaje = "Debe Ingresar el usuario y contraseña";
                        self::_mostrarIniciarSesion($mensaje);
                    }
                    break;

                case 'cerrarSesion':
                    session_destroy();
                    self::_mostrarIniciarSesion(null);
                    break;

            }
        } else {
            self::_mostrarIniciarSesion(null);
        }
    }
     public static function _mostrarIniciarSesion($mensaje) {
        require_once 'seguridad_inicioSesion.html';
    }

}
SeguridadView::ejecutar();
?>
