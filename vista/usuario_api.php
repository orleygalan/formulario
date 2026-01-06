<?php
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Headers: Content-Type, Authorization");
header("Access-Control-Allow-Methods: POST, GET, OPTIONS");

require '../controlador/usuario_controlador.php';

$method = $_SERVER['REQUEST_METHOD'];
$data = json_decode(file_get_contents("php://input"), true);
$action = $_GET['action'];

if ($method === 'POST') {

    if ($action === 'register') {
        $nombre = $data['nombre'];
        $edad = $data['edad'];
        $password = $data['password'];

        register_molde($nombre, $edad, $password);

    } else if ($action === 'login') {
        $nombre = $data['nombre'];
        $pass = $data['pass'];

        Login_controlador($nombre, $pass);

    }


} else {
    echo 'Método no reconocido';
}




?>