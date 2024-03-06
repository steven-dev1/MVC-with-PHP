<?php
    require_once "model/programa_modelo.php";
    class programa_controlador {
        public function __construct() {
            $this->obj = new Plantilla();
        }

        public function principal(){
            if(!$_SESSION['USU_UID']){
                header('Location: ?controlador=inicio&accion=frmLogin');
            }
            $this->obj->programas = programa_modelo::listar();
            $this->obj->unirPagina("programa/principal");
        }

        public function frmRegistrar(){
            $this->obj->unirPagina("programa/frmRegistrar");
        }

        public function frmEditar(){
            $Uid = $_GET['uid'];
            $this->obj->infoPrograma = programa_modelo::buscarXuid($Uid);
            $this->obj->unirPagina("programa/frmEditar");
        }

        public function reporte(){
            if(!$_SESSION['USU_UID']){
                header('Location: ?controlador=inicio&accion=frmLogin');
            }
            $allPrograms = programa_modelo::listar();
            require_once "views/programa/reporte.php";
        }

        public function registrar(){
            if(isset($_POST["codigo"]) && isset($_POST["programa"])){
                extract($_POST);
                if(trim($codigo) == "" || trim($programa) == ""){
                    echo json_encode(array("estado"=> 2, "mensaje"=>"Todos los campos son obligatorios"));
                } else {
                    $datos['codigo'] = $codigo;
                    $datos['programa'] = $programa;
                    $res = programa_modelo::buscarcodigo($codigo);
                    if(is_array($res)){
                        echo json_encode(array("estado"=> 2,"mensaje"=>"Ya existe un programa con ese código", "icono"=>"error"));
                    } else {
                        $res = programa_modelo::registrar($datos);
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
                $r = programa_modelo::eliminar($uid);
                if($r){
                    echo json_encode(array('estado'=> 1, "mensaje"=> "Se eliminó exitosamente", "icono"=> "success"));
                }else{
                    echo json_encode(array('estado'=> 2, "mensaje"=> "Error al eliminar", "icono"=> "error"));
                }
            }
        }

        public function editar() {
            if(isset($_POST["codigo"]) && isset($_POST["programa"]) && isset($_POST['uid'])){
                extract($_POST);
                if(trim($codigo) == "" || trim($programa) == ""){
                    echo json_encode(array("estado"=> 2, "mensaje"=>"Todos los campos son obligatorios"));
                } else {
                    $datos['codigo'] = $codigo;
                    $datos['programa'] = $programa;
                    $datos['uid'] = $uid;
                    $res = programa_modelo::actualizar($datos);
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