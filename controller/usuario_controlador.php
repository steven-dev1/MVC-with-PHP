<?php
    require_once "model/usuario_modelo.php";
    class usuario_controlador {
        public function __construct() {
            $this->obj = new Plantilla();
        }

        public function principal(){
            $this->obj->usuarios = usuario_modelo::listar();
            $this->obj->unirPagina("usuario/principal");
        }
        public function frmRegistrar(){
            $this->obj->unirPagina("usuario/frmRegistrar");
        }

        public function registrar(){
            if (isset($_POST['names']) && isset($_POST['last_names']) && isset($_POST['email']) && isset($_POST['password']) && isset($_POST['telefono']) && isset($_POST['fecha'])){
                extract($_POST);
                $datos['names'] = $names;
                $datos['last_names'] = $last_names;
                $datos['email'] = $email;
                $datos['password'] = $password;
                $datos['telefono'] = $telefono;
                $datos['fecha'] = $fecha;
                $res = usuario_modelo::registrar($datos);
                if ($res > 0) {
                    echo json_encode(array('status'=> 'success','info'=> 1));
                }
            } else {
                header('location: /AppMVC');
            }
        }
    }
?>