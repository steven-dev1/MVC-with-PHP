<?php
require_once 'model/inicio_modelo.php';
    class inicio_controlador {
        public function __construct(){
            $this->obj = new Plantilla();
        }
        public function principal(){
            if(!$_SESSION['USU_UID']){
                header('Location: ?controlador=inicio&accion=frmLogin');
            }
            $this->obj->unirPagina("inicio/principal");
        }
        public function frmLogin(){
            $this->obj->unirPagina("inicio/frmLogin", false);
        }
        public function cerrarSesion(){
            session_destroy();
            header('Location: ?controlador=inicio&accion=frmLogin');
        }

        public function validarUsuario(){
            if (isset($_POST["email"]) && isset($_POST["password"])){
                extract($_POST);
                if(trim($_POST["email"]) == "" || trim($_POST["password"]) == "") {
                    echo json_encode(array("estado"=> 0,"mensaje"=> "Todos los campos son obligatorios."));
                } else {
                    $email = $_POST['email'];
                    $pwEncripted = sha1($password);
                    $res = inicio_modelo::validar($email, $password);

                    if(is_array($res)){
                        $_SESSION['USU_NOMBRES'] = $res['USU_NOMBRES'];
                        $_SESSION['USU_APELLIDOS'] = $res['USU_APELLIDOS'];
                        $_SESSION['USU_ID'] = $res['USU_ID'];
                        $_SESSION['USU_UID'] = $res['USU_UID'];
                        $_SESSION['USU_ROL'] = $res['USU_ROL'];
                        echo json_encode(array("estado"=>1, "mensaje" => "Bienvenido"));
                    } else {
                        echo json_encode(array('estado' => 0,'mensaje'=> 'Usuario o contraseña incorrectos.'));
                    }
                }
            }
        }
    }
?>