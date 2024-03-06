<?php
    require_once "model/uspro_modelo.php";
    class uspro_controlador {
        public function __construct() {
            $this->obj = new Plantilla();
        }
        public function principal(){
            if(!$_SESSION['USU_UID']){
                header('Location: ?controlador=inicio&accion=frmLogin');
            }
            $this->obj->inscripciones = uspro_modelo::listar();
            $this->obj->unirPagina("uspro/principal");
        }
        public function inscribir(){
            if(!$_SESSION['USU_UID']){
                header('Location: ?controlador=inicio&accion=frmLogin');
            }
            $this->obj->listaProgramas = uspro_modelo::listarProgramas();
            $this->obj->listaUsuarios = uspro_modelo::listarUsuarios();
            $this->obj->unirPagina("uspro/inscribir");
        }

        public function frmEditar(){
            if(!$_SESSION['USU_UID']){
                header('Location: ?controlador=inicio&accion=frmLogin');
            }
            $uid = $_GET['uid'];
            $this->obj->listaProgramas = uspro_modelo::listarProgramas();
            $this->obj->listaUsuarios = uspro_modelo::listarUsuarios();
            $this->obj->user = uspro_modelo::buscarXUid($uid);
            $this->obj->unirPagina("uspro/editar");
        }

        public function reporte(){
            if(!$_SESSION['USU_UID']){
                header('Location: ?controlador=inicio&accion=frmLogin');
            }
            $allUsPros = uspro_modelo::listar();
            require_once "views/uspro/reporte.php";
        }


        public function registrar(){
            if(isset($_POST["usuario"]) && isset($_POST["programa"])){
                extract($_POST);
                if(trim($usuario) == "" || trim($programa) == ""){
                    echo json_encode(array("estado"=> 2, "mensaje"=>"Todos los campos son obligatorios"));
                } else {
                    $datos['usuario'] = $usuario;
                    $datos['programa'] = $programa;
                    $res = uspro_modelo::buscarinscripcion($usuario, $programa);
                    if(is_array($res)){
                        echo json_encode(array("estado"=> 2,"mensaje"=>"El usuario ya está inscrito en ese programa", "icono"=>"error"));
                    } else {
                        $res = uspro_modelo::registrar($datos);
                        if($res){
                            echo json_encode(array('estado'=> 1, "mensaje"=> "Registro exitoso", "icono"=> "success"));
                        }else{
                            echo json_encode(array('estado'=> 2, "mensaje"=> "Error al registrar", "icono"=> "error"));
                        }
                    }
                }
            }else{
                echo json_encode(array("estado"=>3, "mensaje"=>"Faltan parametros", "icono"=>"Error"));
            }
        }

        public function eliminar(){
            if(isset($_GET['uid'])){
                $uid = $_GET['uid'];
                $r = uspro_modelo::eliminar($uid);
                if($r){
                    echo json_encode(array('estado'=> 1, "mensaje"=> "Se eliminó exitosamente", "icono"=> "success"));
                }else{
                    echo json_encode(array('estado'=> 2, "mensaje"=> "Error al eliminar", "icono"=> "error"));
                }
            }
        }

        public function editar() {
            if(isset($_POST["usuario"]) && isset($_POST["programa"]) && isset($_POST['uid'])){
                extract($_POST);
                if(trim($usuario) == "" || trim($programa) == ""){
                    echo json_encode(array("estado"=> 2, "mensaje"=>"Todos los campos son obligatorios"));
                } else {
                    $datos['usuario'] = $usuario;
                    $datos['programa'] = $programa;
                    $datos['uid'] = $uid;
                    $res = uspro_modelo::actualizar($datos);
                    if($res>0){
                        echo json_encode(array("estado"=> 1,"mensaje"=>"Se editó correctamente", "icono"=>"success"));
                    } else {
                        echo json_encode(array("estado"=> 2,"mensaje"=>"¡Error! no se pudo editar", "icono"=>"error"));
                    }
                }
            }else{
                echo json_encode(array("estado"=> 3, "mensaje"=>"Faltan parametros", "icono"=>"error"));
            }
        }
        

    }

?>