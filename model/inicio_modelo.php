<?php 
    class inicio_modelo {
        public static function validar($usuario, $password) {
            $i = new connection();
            $con = $i->getConexion();
            $sql = "SELECT USU_ROL, USU_NOMBRES, USU_APELLIDOS, USU_UID FROM t_usuario WHERE USU_EMAIL = ? AND USU_PASSWORD = ?";
            $resultado = $con->prepare($sql);
            $v = array($usuario, sha1($password));
            $resultado->execute($v);
            return $resultado->fetch();
        }
    }

?>
