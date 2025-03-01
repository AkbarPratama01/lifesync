<?php

use App\Controllers\AuthController;
use App\Controllers\DashboardController;
use App\Controllers\JurnalHarianController;
use App\Controllers\RiwayatShalatController;
use App\Controllers\TodolistController;
use App\Controllers\RiwayatFinansialController;
use App\Controllers\GoalController;
use App\Controllers\QuranController;

// Definisikan rute aplikasi
return [
    // Rute untuk halaman login dan register
    '/login' => [AuthController::class, 'showLogin'],       // Halaman login
    '/register' => [AuthController::class, 'showRegister'], // Halaman register
    '/login/submit' => [AuthController::class, 'handleLogin'],       // Proses login (POST)
    '/register/submit' => [AuthController::class, 'handleRegister'], // Proses register (POST)
    '/logout' => [AuthController::class, 'logout'],  // Proses logout
    
    // Rute untuk dashboard
    '/dashboard' => [DashboardController::class, 'showDashboard'],   // Halaman utama dashboard
    '/dashboard/update-shalat' => [DashboardController::class, 'updateShalat'], // Proses update riwayat shalat (POST)
    
    // Rute untuk ToDo List
    '/todolist' => [TodolistController::class, 'index'],               // Halaman utama Todolist
    '/todolist/add' => [TodolistController::class, 'add'],             // Tambah tugas (POST)
    '/todolist/complete/{id}' => [TodolistController::class, 'complete'], // Menandai tugas sebagai selesai
    '/todolist/delete/{id}' => [TodolistController::class, 'delete'], // Hapus tugas
    '/todolist/edit/{id}' => [TodolistController::class, 'edit'],  // Edit tugas
    '/todolist/edit/submit' => [TodolistController::class, 'update'], // Proses edit tugas (POST)
    
    // Rute untuk Jurnal Harian
    '/jurnal-harian' => [JurnalHarianController::class, 'index'], // Menampilkan daftar jurnal
    '/jurnal-harian/create' => [JurnalHarianController::class, 'create'], // Menampilkan form untuk tambah jurnal
    '/jurnal-harian/store' => [JurnalHarianController::class, 'store'],  // Menyimpan entri jurnal baru (POST)
    '/jurnal-harian/edit/{id}' => [JurnalHarianController::class, 'edit'], // Menampilkan form untuk edit jurnal
    '/jurnal-harian/update/{id}' => [JurnalHarianController::class, 'update'], // Mengupdate jurnal (POST)
    '/jurnal-harian/delete/{id}' => [JurnalHarianController::class, 'delete'], // Menghapus jurnal

    // Rute untuk Riwayat Shalat
    '/riwayat-shalat' => [RiwayatShalatController::class, 'index'], // Menampilkan daftar riwayat shalat
    '/riwayat-shalat/create' => [RiwayatShalatController::class, 'create'], // Menampilkan form untuk tambah riwayat shalat
    '/riwayat-shalat/store' => [RiwayatShalatController::class, 'store'],  // Menyimpan entri riwayat shalat baru (POST)
    '/riwayat-shalat/edit/{id}' => [RiwayatShalatController::class, 'edit'], // Menampilkan form untuk edit riwayat shalat
    '/riwayat-shalat/update/{id}' => [RiwayatShalatController::class, 'update'], // Mengupdate riwayat shalat (POST)
    '/riwayat-shalat/delete/{id}' => [RiwayatShalatController::class, 'delete'], // Menghapus riwayat shalat

    // Rute untuk Riwayat Finansial
    '/financial_records' => [RiwayatFinansialController::class, 'index'], // Menampilkan daftar riwayat finansial
    '/financial_records/store' => [RiwayatFinansialController::class, 'store'],  // Menyimpan entri riwayat finansial baru (POST)
    '/financial_records/delete/{id}' => [RiwayatFinansialController::class, 'delete'], // Menghapus riwayat finansial
    '/financial_records/edit/{id}' => [RiwayatFinansialController::class, 'edit'], // Menampilkan form untuk edit riwayat finansial
    '/financial_records/update/{id}' => [RiwayatFinansialController::class, 'update'], // Mengupdate riwayat finansial (POST)

    // Rute untuk goal List
    '/goal' => [GoalController::class, 'index'],               // Halaman utama Todolist
    '/goal/add' => [GoalController::class, 'add'],             // Tambah tugas (POST)
    '/goal/complete/{id}' => [GoalController::class, 'complete'], // Menandai tugas sebagai selesai
    '/goal/delete/{id}' => [GoalController::class, 'delete'], // Hapus tugas
    '/goal/edit/{id}' => [GoalController::class, 'edit'],  // Edit tugas
    '/goal/edit/submit' => [GoalController::class, 'update'], // Proses edit tugas (POST)

    // Rute untuk Al-Quran
    '/quran' => [QuranController::class, 'index'],               // Halaman utama Todolist
    '/quran/{id}' => [QuranController::class, 'show'],
    '/quran/bookmark/{id}' => [QuranController::class, 'bookmark'],
    '/quran/bookmarked' => [QuranController::class, 'bookmarked'],
];