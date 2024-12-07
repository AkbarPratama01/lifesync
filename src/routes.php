<?php

use App\Controllers\HomeController;

// Example of routing definition
return [
    '/' => [HomeController::class, 'index'],
    '/about' => [HomeController::class, 'about'],
];