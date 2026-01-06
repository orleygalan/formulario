<?php
$url = getenv('MYSQL_PUBLIC_URL');

if (!$url) {
    die('MYSQL_PUBLIC_URL no definida');
}

$parts = parse_url($url);

$conexion = mysqli_connect(
    $parts['host'],
    $parts['user'],
    $parts['pass'],
    ltrim($parts['path'], '/'),
    $parts['port']
);

if (!$conexion) {
    die(mysqli_connect_error());
}
