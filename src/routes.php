<?php

use App\Controllers\AuthController;
use App\Controllers\DashboardController;
use App\Controllers\TodolistController;

// Definisikan rute aplikasi
return [
    '/login' => [AuthController::class, 'showLogin'],       // Rute untuk halaman login
    '/register' => [AuthController::class, 'showRegister'], // Rute untuk halaman register
    '/login/submit' => [AuthController::class, 'handleLogin'],       // Rute untuk proses login (POST)
    '/register/submit' => [AuthController::class, 'handleRegister'], // Rute untuk proses register (POST)
    '/dashboard' => [DashboardController::class, 'showDashboard'],   // Rute untuk dashboard
    '/logout' => [AuthController::class, 'logout'],
    '/todolist' => [TodolistController::class, 'index'],               // Halaman utama Todolist
    '/todolist/add' => [TodolistController::class, 'add'],             // Tambah tugas (POST)
    '/todolist/complete/{id}' => [TodolistController::class, 'complete'], // Rute untuk menandai tugas sebagai selesai
    '/todolist/delete/{id}' => [TodolistController::class, 'delete'], // Hapus tugas
    '/todolist/edit/{id}' => [TodolistController::class, 'edit'],  // Rute dengan parameter ID
    '/todolist/edit/submit' => [TodolistController::class, 'update'], // Proses edit
];