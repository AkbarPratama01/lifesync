<?php

require_once __DIR__ . '/../vendor/autoload.php';
require_once __DIR__ . '/../src/Config/database.php'; // Koneksi database
$routes = require_once __DIR__ . '/../src/routes.php'; // Muat rute

// Ambil URI permintaan
$requestUri = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);
$requestMethod = $_SERVER['REQUEST_METHOD'];

// Eksekusi rute
if (isset($routes[$requestUri])) {
    $handler = $routes[$requestUri];
    if (is_callable($handler)) {
        call_user_func($handler);
    } elseif (is_array($handler) && class_exists($handler[0])) {
        $controller = new $handler[0];
        $method = $handler[1];
        if (method_exists($controller, $method)) {
            call_user_func([$controller, $method]);
        } else {
            http_response_code(404);
            echo "Method not found";
        }
    } else {
        http_response_code(404);
        echo "Invalid route handler";
    }
} else {
    http_response_code(404);
    echo "Route not found";
}