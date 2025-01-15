<?php

namespace App\Controllers;

use App\Models\RiwayatFinansial;
use App\Models\Todo; 
use App\Models\Journal;

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

        $userId = $_SESSION['user_id'];

        // Data pengguna yang disimpan di session
        $userName = $_SESSION['user_name'] ?? 'Pengguna';
        $userEmail = $_SESSION['user_email'] ?? 'Email tidak tersedia';

        $totalPendapatan = RiwayatFinansial::where('type', 'Pendapatan')
                            ->where('user_id', $userId)
                            ->sum('nominal');

        $totalPengeluaran = RiwayatFinansial::where('type', 'Pengeluaran')
                            ->where('user_id', $userId)
                            ->sum('nominal');
        
        $totalBalance = $totalPendapatan - $totalPengeluaran;

        // Format angka menjadi format uang (contoh dalam format Rupiah)
        $formattedPendapatan = 'Rp ' . number_format($totalPendapatan, 0, ',', '.');
        $formattedPengeluaran = 'Rp ' . number_format($totalPengeluaran, 0, ',', '.');
        $formattedBalance = 'Rp ' . number_format($totalBalance, 0, ',', '.');

        // Ambil data todos berdasarkan user_id
        $todos = Todo::where('user_id', $userId)->get();
        $todos_length = count($todos);

        $now = date("Y-m-d");
        $journals = Journal::where('user_id', $userId)->where('date', $now)->orderBy('date', 'desc')->get();
        $journals_length = count($journals);

        // Tampilkan halaman dashboard
        require __DIR__ . '/../Views/dashboard.php';
    }
}