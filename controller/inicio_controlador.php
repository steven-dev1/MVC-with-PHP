<?php

    class inicio_controlador {
        public function __construct(){
            $this->obj = new Plantilla();
        }
        public function principal(){
            $this->obj->unirPagina("inicio/principal");
        }
        public function frmLogin(){
            $this->obj->unirPagina("inicio/frmLogin");
        }
        public function cerrarSesion(){}

    }

?>