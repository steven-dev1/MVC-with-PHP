<?php 
    class usuario_modelo {
        public static function registrar($info) {
            $i = new connection();
            $con = $i->getConexion();
            $sql = "INSERT INTO t_usuario(USU_UID, USU_NOMBRES, USU_APELLIDOS, USU_EMAIL, USU_PASSWORD, USU_TELEFONO, USU_FCH_NAC) VALUES (?,?,?,?,?,?,?)";
            $uid = uniqid();
            $st = $con->prepare($sql);
            $v = array(
                $uid,
                $info["names"], $info["last_names"], $info["email"], $info["password"], $info["telefono"], $info["fecha"]
            );

            return $st->execute($v);
        }


        public static function listar(){
            $i = new connection();
            $con = $i->getConexion();
            $sql = "SELECT * FROM t_usuario";
            $st = $con->prepare($sql);
            $st->execute();
            return $st->fetchAll();
        }
    }
?>