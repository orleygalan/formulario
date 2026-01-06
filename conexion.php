<?php

$host = $_ENV['MYSQLHOST'];
$port = $_ENV['MYSQLPORT'];
$user = $_ENV['MYSQLUSER'];
$pass = $_ENV['MYSQLPASSWORD'];
$db   = $_ENV['MYSQLDATABASE'];

$conexion = mysqli_connect($host, $user, $pass, $db, $port);

if (!$conexion) {
    http_response_code(500);
    echo json_encode([
        "success" => false,
        "error" => "Error de conexión a la base de datos"
    ]);
    exit;
}
