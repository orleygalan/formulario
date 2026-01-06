<?php
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Headers: Content-Type, Authorization");
header("Access-Control-Allow-Methods: POST, GET, OPTIONS");
header("Content-Type: application/json");

echo "Backend activo";
exit;

$uri = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);

$uri = rtrim($uri, '/');

$routes = [
    '/usuario' => '../vista/usuario_api.php',
];

if (!isset($routes[$uri])) {
    http_response_code(404);
    echo json_encode([
        "success" => false,
        "error" => "Endpoint no encontrado"
    ]);
    exit;
}

require $routes[$uri];

?>