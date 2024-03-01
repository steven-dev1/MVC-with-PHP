<?php

class uspro_modelo{
    public static function registrar($info)
    {
        $i = new connection();
        $con = $i->getConexion();
        $sql = "INSERT INTO t_us_pro (USPRO_UID,USPRO_USU_ID,USPRO_PRO_ID, USPRO_FCH_INS) VALUES (?,?,?,?)";
        $st = $con -> prepare($sql);
        $uid = uniqid();
        $date = date('Y-m-d');
        $v = array(
            $uid,
            $info['usuario'],
            $info['programa'],
            $date
        );
        return $st-> execute($v);
    }
    // public static function actualizar($info) {
    //     // var_dump($info);
    //     $i = new connection();
    //     $con = $i->getConexion();
    //     $sql = "UPDATE t_programa SET PRO_CODIGO=?, PRO_NOMBRE=? WHERE PRO_UID=?";
    //     $st = $con->prepare($sql);
    //     $v = array(
    //         $info["codigo"], 
    //         $info["programa"], 
    //         $info["uid"]
    //     );
    //     return $st->execute($v);
    // }
    public static function eliminar($UID){
        $i = new connection();
        $con = $i -> getConexion();
        $sql = "DELETE FROM t_us_pro WHERE USPRO_UID = ?";
        $st = $con -> prepare($sql);
        $v = array($UID);
        return  $st -> execute($v);
    }

    public static function listar() {
        $i = new connection();
        $con = $i -> getConexion();
        $sql = "SELECT *
        FROM t_us_pro
        JOIN t_usuario ON USU_ID = USPRO_USU_ID
        JOIN t_programa ON PRO_ID = USPRO_PRO_ID;";
        $st = $con -> prepare($sql);
        $st -> execute();
        // var_dump($st->fetchAll(PDO::FETCH_ASSOC));
        return $st -> fetchAll();
    }

    public static function listarProgramas() {
        $i = new connection();
        $con = $i -> getConexion();
        $sql = "SELECT PRO_NOMBRE, PRO_ID
        FROM t_programa;";
        $st = $con -> prepare($sql);
        $st -> execute();
        return $st -> fetchAll();
    }
    public static function listarUsuarios() {
        $i = new connection();
        $con = $i -> getConexion();
        $sql = "SELECT USU_NOMBRES, USU_APELLIDOS, USU_ID
        FROM t_usuario WHERE USU_ROL != 1;";
        $st = $con -> prepare($sql);
        $st -> execute();
        return $st -> fetchAll();
    }

    public static function buscarinscripcion($usuario, $programa){
        $i = new connection();
        $con = $i->getConexion();
        $sql = "SELECT USPRO_USU_ID, USPRO_PRO_ID FROM t_us_pro WHERE USPRO_USU_ID = ? AND USPRO_PRO_ID = ?";
        $st = $con->prepare($sql);
        $v = array($usuario, $programa);
        $st->execute($v);
        return $st->fetch();
    }

    public static function actualizar($info) {
        // var_dump($info);
        $i = new connection();
        $con = $i->getConexion();
        $sql = "UPDATE t_us_pro SET USPRO_USU_ID=?, USPRO_PRO_ID=? WHERE USPRO_UID=?";
        $st = $con->prepare($sql);
        $v = array(
            $info["usuario"], 
            $info["programa"], 
            $info["uid"]
        );
        return $st->execute($v);
    }
    public static function buscarXUid($uid){
        $i = new connection();
        $con = $i->getConexion();
        $sql = "SELECT *
        FROM t_us_pro
        JOIN t_usuario ON USU_ID = USPRO_USU_ID
        JOIN t_programa ON PRO_ID = USPRO_PRO_ID WHERE USPRO_UID = ?";
        $st = $con->prepare($sql);
        $v = array($uid);
        $st->execute($v);
        return $st->fetch();
    }

}