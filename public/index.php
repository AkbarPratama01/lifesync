<?php
session_start();
require_once __DIR__ . '/../vendor/autoload.php';
require_once __DIR__ . '/../src/Config/database.php'; // Koneksi database
$routes = require_once __DIR__ . '/../src/routes.php'; // Muat rute

// Ambil URI permintaan
$requestUri = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);
$requestMethod = $_SERVER['REQUEST_METHOD'];

// Cek rute untuk mencocokkan URL dengan parameter dinamis
$routeFound = false;

foreach ($routes as $route => $handler) {
    // Cocokkan rute dengan ekspresi reguler untuk menangani parameter dinamis
    if (preg_match('%^' . str_replace(['{id}'], ['(\d+)'], $route) . '$%', $requestUri, $matches)) {
        $routeFound = true;

        // Tangani parameter {id}
        array_shift($matches); // Hapus bagian pertama yang merupakan string yang cocok dengan rute
        $handler = is_array($handler) ? $handler : [$handler]; // Pastikan handler adalah array
        $controller = new $handler[0]; // Inisialisasi controller
        call_user_func_array([$controller, $handler[1]], $matches); // Panggil method controller dengan parameter
        break;
    }
}

if (!$routeFound) {
    http_response_code(404);
    echo "Route not found";
}