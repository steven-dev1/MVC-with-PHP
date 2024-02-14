<?php
    class Plantilla {
        public function unirPagina($contenido, $paginaCompleta=true) {
            if($paginaCompleta){
                require_once "views/header.php";
                require_once "views/$contenido".".php";
                require_once "views/footer.php";
            } else {
                require_once "views/$contenido".".php";
            }
            
        }
    }

?>