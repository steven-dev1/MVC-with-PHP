<?php 

    class connection {
        public function __construct() {
            try {
                $this->con = new PDO("mysql:host=localhost;dbname=bdmvc","root", "");
                $this->con-> setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                echo "Conexión exitosa";
            } catch(Exception $e) {
                echo "Error:".$e->getMessage();
            }
        }

        public function getConexion() {
            return $this->con;
        }
    }