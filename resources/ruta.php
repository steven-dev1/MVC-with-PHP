<?php
class ruta  {
    public static function cargarContenido($controlador, $accion) {
        if(file_exists("controller/$controlador"."_controlador.php")) {
            require_once "controller/$controlador"."_controlador.php";
            $contrl = $controlador."_controlador";
            $obj = new $contrl();
            if (method_exists($obj, $accion)) {
                $obj->$accion();
            } else {
                echo "el método no existe";
            }
        } else {
            echo "<br>Ese controlador no existe";
        }
    }
}
?>