<?php

// Aquí le pedimos al sistema la variable de entorno MYSQL_PUBLIC_URL.
// Esta variable contiene toda la información de conexión a MySQL
// en una sola cadena (usuario, contraseña, host, puerto y base de datos).
$url = getenv('MYSQL_PUBLIC_URL');


// Si la variable no existe o no fue enviada al servicio,
// detenemos el programa inmediatamente porque no hay forma de conectarse.
if (!$url) {
    die('MYSQL_PUBLIC_URL no definida');
}


// parse_url toma la URL de conexión y la "desarma" en partes.
// Por ejemplo: host, usuario, contraseña, puerto y nombre de la base de datos.
// Esto es necesario porque mysqli_connect no entiende URLs completas.
$parts = parse_url($url);


// Aquí creamos la conexión a la base de datos usando las partes separadas.
// - host: servidor donde está MySQL
// - user: usuario de la base de datos
// - pass: contraseña del usuario
// - path: nombre de la base de datos (viene con /, por eso lo quitamos)
// - port: puerto de conexión
$conn = mysqli_connect(
    $parts['host'],
    $parts['user'],
    $parts['pass'],
    ltrim($parts['path'], '/'), // quitamos el "/" inicial del nombre de la BD
    $parts['port']
);


// Si la conexión falla, mostramos el error real de MySQL
// y detenemos la ejecución para evitar errores más adelante.
if (!$conn) {
    die(mysqli_connect_error());
}
