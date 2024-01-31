<?php
    class Plantilla {
        public function unirPagina($contenido) {
            require_once "views/header.php";
            require_once "views/$contenido".".php";
            require_once "views/footer.php";
        }
    }

?>