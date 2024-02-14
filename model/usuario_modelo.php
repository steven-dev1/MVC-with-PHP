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
                $info["names"], 
                $info["last_names"], 
                $info["email"], 
                sha1($info["password"]), 
                $info["telefono"], 
                $info["fecha"]
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

        public static function eliminar($UID){
            $i = new connection();
            $con = $i -> getConexion();
            $sql = "DELETE FROM t_usuario WHERE USU_UID = ?";

            $st = $con -> prepare($sql);
            $v = array($UID);

            return  $st -> execute($v);
        
        }

        public static function buscarXemail($email){
            $i = new connection();
            $con = $i->getConexion();
            $sql = "SELECT USU_EMAIL FROM t_usuario WHERE USU_EMAIL = ?";
            $st = $con->prepare($sql);
            $v = array($email);
            $st->execute($v);
            return $st->fetch();
        }

        public static function buscarXUid($uid){
            $i = new connection();
            $con = $i->getConexion();
            $sql = "SELECT * FROM t_usuario WHERE USU_UID = ?";
            $st = $con->prepare($sql);
            $v = array($uid);
            $st->execute($v);
            return $st->fetch();
        }

        public static function actualizar($info) {
            $i = new connection();
            $con = $i->getConexion();
            $sql = "UPDATE t_usuario SET USU_NOMBRES=?, USU_APELLIDOS=?, USU_EMAIL=?, USU_TELEFONO=? USU_FCH_NAC=? WHERE USU_UID=?";
            $st = $con->prepare($sql);
            $v = array(
                $info["names"], 
                $info["last_names"], 
                $info["email"], 
                $info["telefono"], 
                $info["fecha"],
                $info["uid"]
            );

            return $st->execute($v);
        }
    }
?>