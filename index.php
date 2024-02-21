<?php 
session_start();
require_once('resources/ruta.php');
require_once('resources/plantilla.php');
require_once('resources/connection.php');
if(isset($_GET['controlador']) && isset($_GET['accion'])){
    $controlador = $_GET['controlador'];
    $accion = $_GET['accion'];
} else {
    $controlador = 'inicio';
    $accion = 'principal';
}

ruta::cargarContenido($controlador, $accion);