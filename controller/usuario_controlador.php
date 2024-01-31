<?php
    class usuario_controlador {
        public function __construct() {
            $this->obj = new Plantilla();
        }

        public function principal(){
            $this->obj->unirPagina("usuario/principal");
        }

    }

?>