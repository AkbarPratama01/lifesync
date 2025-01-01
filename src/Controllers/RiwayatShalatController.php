<?php

namespace App\Controllers;

use App\Models\RiwayatShalat;

class RiwayatShalatController
{
    /**
     * Tampilkan daftar riwayat shalat.
     */
    public function index()
    {
        // Check if user is logged in
        if (!isset($_SESSION['user_id'])) {
            header('Location: /login');
            exit;
        }

        $userId = $_SESSION['user_id'];
        // Ambil riwayat shalat berdasarkan user_id dari database
        $shalatHistory = RiwayatShalat::where('user_id', $userId)->orderBy('date', 'desc')->get();

        // Kirim data riwayat shalat ke view
        include __DIR__ . '/../Views/riwayatshalat.php'; // Pastikan menggunakan view yang sesuai
    }

    /**
     * Tampilkan form tambah riwayat shalat.
     */
    public function create()
    {
        // Cek jika user sudah login
        if (!isset($_SESSION['user_id'])) {
            header('Location: /login');
            exit;
        }

        include __DIR__ . '/../Views/riwayatshalat_create.php'; // Gunakan langsung view tanpa folder
    }

    /**
     * Simpan riwayat shalat baru.
     */
    public function store()
    {
        // Cek jika user sudah login
        if (!isset($_SESSION['user_id'])) {
            header('Location: /login');
            exit;
        }

        $userId = $_SESSION['user_id'];

        $data = [
            'user_id' => $userId,
            'date' => $_POST['date'],
            'fajr' => $_POST['fajr'],
            'dhuhr' => $_POST['dhuhr'],
            'asr' => $_POST['asr'],
            'maghrib' => $_POST['maghrib'],
            'isha' => $_POST['isha'],
        ];

        RiwayatShalat::create($data);

        header('Location: /riwayat-shalat');
        exit;
    }

    /**
     * Tampilkan form edit riwayat shalat.
     */
    public function edit($id)
    {
        // Check if user is logged in
        if (!isset($_SESSION['user_id'])) {
            header('Location: /login');
            exit;
        }

        $userId = $_SESSION['user_id'];

        // Ambil data riwayat shalat berdasarkan ID dan pastikan data ditemukan
        $shalat = RiwayatShalat::where('user_id', $userId)->findOrFail($id);

        // Kirim data riwayat shalat ke view
        include __DIR__ . '/../Views/riwayatshalat_edit.php';
    }

    /**
     * Perbarui riwayat shalat.
     */
    public function update($id)
    {
        // Cek jika user sudah login
        if (!isset($_SESSION['user_id'])) {
            header('Location: /login');
            exit;
        }

        $userId = $_SESSION['user_id'];
        $riwayatShalat = RiwayatShalat::where('user_id', $userId)->findOrFail($id);

        $riwayatShalat->update([
            'date' => $_POST['date'],
            'fajr' => $_POST['fajr'],
            'dhuhr' => $_POST['dhuhr'],
            'asr' => $_POST['asr'],
            'maghrib' => $_POST['maghrib'],
            'isha' => $_POST['isha'],
        ]);

        header('Location: /riwayat-shalat');
        exit;
    }

    /**
     * Hapus riwayat shalat.
     */
    public function delete($id)
    {
        // Cek jika user sudah login
        if (!isset($_SESSION['user_id'])) {
            header('Location: /login');
            exit;
        }

        $userId = $_SESSION['user_id'];
        $riwayatShalat = RiwayatShalat::where('user_id', $userId)->findOrFail($id);

        $riwayatShalat->delete();

        header('Location: /riwayat-shalat');
        exit;
    }
}