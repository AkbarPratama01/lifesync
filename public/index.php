<?php

// Load Composer's autoloader
require_once __DIR__ . '/../vendor/autoload.php';

// Load environment variables
use Dotenv\Dotenv;
$dotenv = Dotenv::createImmutable(__DIR__ . '/../');
$dotenv->load();

// Include routes
require_once __DIR__ . '/../src/routes.php';

// Simple routing example
use App\Controllers\HomeController;

$path = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);

if ($path === '/' || $path === '/home') {
    $controller = new HomeController();
    echo $controller->index();
} else {
    http_response_code(404);
    echo "404 Not Found";
}