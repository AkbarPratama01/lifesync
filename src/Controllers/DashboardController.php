<?php

namespace App\Controllers;

class DashboardController
{
    public function showDashboard()
    {
        // session_start();

        // Cek apakah pengguna sudah login
        if (!isset($_SESSION['user_id'])) {
            // Redirect ke halaman login jika belum login
            header('Location: /login');
            exit;
        }

        // Data pengguna yang disimpan di session
        $userName = $_SESSION['user_name'] ?? 'Pengguna';
        $userEmail = $_SESSION['user_email'] ?? 'Email tidak tersedia';

        // Tampilkan halaman dashboard
        require __DIR__ . '/../Views/dashboard.php';
    }
}