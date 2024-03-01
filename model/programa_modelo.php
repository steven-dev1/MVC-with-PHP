<?php

class programa_modelo{
    public static function registrar($info)
    {
        $i = new connection();
        $con = $i->getConexion();
        $sql = "INSERT INTO t_programa(PRO_UID,PRO_NOMBRE,PRO_CODIGO) VALUES (?,?,?)";
        $st = $con -> prepare($sql);
        $uid = uniqid();
        $v = array(
            $uid,
            $info['programa'],
            $info['codigo'],
        );
        return $st-> execute($v);
    }
    public static function actualizar($info) {
        // var_dump($info);
        $i = new connection();
        $con = $i->getConexion();
        $sql = "UPDATE t_programa SET PRO_CODIGO=?, PRO_NOMBRE=? WHERE PRO_UID=?";
        $st = $con->prepare($sql);
        $v = array(
            $info["codigo"], 
            $info["programa"], 
            $info["uid"]
        );
        return $st->execute($v);
    }
    public static function eliminar($UID){
        $i = new connection();
        $con = $i -> getConexion();
        $sql = "DELETE FROM t_programa WHERE PRO_UID = ?";
        $st = $con -> prepare($sql);
        $v = array($UID);
        return  $st -> execute($v);
    }

    public static function listar()
    {
        $i = new connection();
        $con = $i -> getConexion();
        $sql = "SELECT * FROM t_programa";
        $st = $con -> prepare($sql);
        $st -> execute();
        return $st -> fetchAll();

    }
    public static function buscarcodigo($codigo){
        $i = new connection();
        $con = $i->getConexion();
        $sql = "SELECT PRO_CODIGO FROM t_programa WHERE PRO_CODIGO = ?";
        $st = $con->prepare($sql);
        $v = array($codigo);
        $st->execute($v);
        return $st->fetch();
    }
    public static function buscarXUid($uid){
        $i = new connection();
        $con = $i->getConexion();
        $sql = "SELECT * FROM t_programa WHERE PRO_UID = ?";
        $st = $con->prepare($sql);
        $v = array($uid);
        $st->execute($v);
        return $st->fetch();
    }

}