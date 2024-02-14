<?php

class programa_modelo{

    public static function registrar($info)
    {
        $i = new connection();
        $con = $i -> getConnection();
        $sql = "INSERT INTO t_programa(PRO_UID,PRO_NOMBRE,PRO_CODIGO) VALUES (?,?,?)";
        $st = $con -> prepare($sql);
        $uid = uniqid();
        $v = array(
            $uid,
            $info["NomPro"],
            $info["CodPro"],
        );
        return $st-> execute($v);
    }

    public static function actualizar()
    {
        
    }

    public static function eliminar()
    {
        
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

}