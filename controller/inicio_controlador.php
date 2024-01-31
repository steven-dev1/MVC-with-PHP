<?php

    class inicio_controlador {
        public function __construct(){}
        public function principal(){
            require_once "views/header.php";
            require_once "views/inicio/principal.php";
            require_once "views/footer.php";
        }
        public function frmLogin(){
            require_once "views/header.php";
            require_once "views/inicio/frmLogin.php";
            require_once "views/footer.php";
        }
        public function cerrarSesion(){}

    }

?>