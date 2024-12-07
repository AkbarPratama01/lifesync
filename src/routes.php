<?php

use App\Controllers\AuthController;
use App\Controllers\HomeController;

// Definisikan rute aplikasi
return [
    '/' => [HomeController::class, 'index'],       // Rute untuk halaman utama
    '/about' => [HomeController::class, 'about'], // Rute untuk halaman 'About'
    '/login' => [AuthController::class, 'showLogin'],       // Rute untuk halaman login
    '/register' => [AuthController::class, 'showRegister'], // Rute untuk halaman register
    '/login/submit' => [AuthController::class, 'handleLogin'],       // Rute untuk proses login (POST)
    '/register/submit' => [AuthController::class, 'handleRegister'], // Rute untuk proses register (POST)
];