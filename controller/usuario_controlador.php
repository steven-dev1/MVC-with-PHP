<?php
    require_once "model/usuario_modelo.php";
    class usuario_controlador {
        public function __construct() {
            $this->obj = new Plantilla();
        }

        public function principal(){
            if(!$_SESSION['USU_UID']){
                header('Location: ?controlador=inicio&accion=frmLogin');
            }
            $this->obj->usuarios = usuario_modelo::listar();
            $this->obj->unirPagina("usuario/principal");
        }
        public function frmRegistrar(){
            if(!$_SESSION['USU_UID']){
                header('Location: ?controlador=inicio&accion=frmLogin');
            }
            $this->obj->unirPagina("usuario/frmRegistrar.usuario");
        }

        public function frmEditar(){
            $Uid = $_GET['uid'];
            $this->obj->infoUsuario = usuario_modelo::buscarXuid($Uid);
            $this->obj->unirPagina('/usuario/frmEditar.usuario');
        }

        public function reporte(){
            if(!$_SESSION['USU_UID']){
                header('Location: ?controlador=inicio&accion=frmLogin');
            }
            if(isset($_POST['rol']) && $_POST['rol'] != 4){
                $rol = $_POST['rol'];
                $allUsers = usuario_modelo::listar(" WHERE USU_ROL = $rol");
            } else {
                $allUsers = usuario_modelo::listar();
            }
            require_once "views/usuario/reporte.php";
        }

        public function registrar(){
            if(isset($_POST["names"]) && isset($_POST["last_names"]) && isset($_POST["email"]) && isset($_POST["password"]) && isset($_POST["telefono"]) && isset($_POST["fecha"]) && isset($_POST["rol"])){
                extract($_POST);
                if(trim($names) == "" || trim($last_names) == "" || trim($password) == "" || trim($telefono) == "" || trim($fecha) == "" || trim($rol) == ""){
                    echo json_encode(array("estado"=> 2, "mensaje"=>"Todos los campos son obligatorios"));
                } else {
                    $datos['names'] = $names;
                    $datos['last_names'] = $last_names;
                    $datos['email'] = $email;
                    $datos['password'] = $password;
                    $datos['telefono'] = $telefono;
                    $datos['fecha'] = $fecha;
                    $datos['rol'] = $rol;
                    $res = usuario_modelo::buscarXEmail($email);
                    if(is_array($res)){
                        echo json_encode(array("estado"=> 2,"mensaje"=>"Ese correo ya existe", "icono"=>"error"));
                    } else {
                        $res = usuario_modelo::registrar($datos);
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
                $r = usuario_modelo::eliminar($uid);
               
                if($r){
                    echo json_encode(array('estado'=> 1, "mensaje"=> "Se elimino exitosamente", "icono"=> "success"));
                }else{
                    echo json_encode(array('estado'=> 2, "mensaje"=> "Error al eliminar", "icono"=> "error"));
                }
            }
        }

        public function editar() {
            if(isset($_POST["names"]) && isset($_POST["last_names"]) && isset($_POST["email"]) && isset($_POST["telefono"]) && isset($_POST["fecha"]) && isset($_POST["rol"]) && isset($_POST['uid'])){
                extract($_POST);
                if(trim($names) == "" || trim($last_names) == "" || trim($telefono) == "" || trim($fecha) == "" || trim($rol) == ""){
                    echo json_encode(array("estado"=> 2, "mensaje"=>"Todos los campos son obligatorios"));
                } else {
                    $datos['names'] = $names;
                    $datos['last_names'] = $last_names;
                    $datos['email'] = $email;
                    $datos['telefono'] = $telefono;
                    $datos['fecha'] = $fecha;
                    $datos['rol'] = $rol;
                    $datos['uid'] = $uid;
                    $res = usuario_modelo::actualizar($datos);
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