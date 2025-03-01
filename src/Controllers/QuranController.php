<?php

namespace App\Controllers;

use App\Models\Bookmark;
use App\Models\Surat;
use App\Models\Ayat;

class QuranController
{
    /**
     * Menampilkan daftar surat.
     */
    public function index()
    {
        // Ambil semua surat
        $surat = Surat::orderBy('nomor')->get();

        // Check if each Surat is bookmarked by the logged-in user
        $userId = $_SESSION['user_id'] ?? null;
        $bookmarkedSurats = [];
        if ($userId) {
            $bookmarkedSurats = Bookmark::where('user_id', $userId)->pluck('surat_id')->toArray();
        }

        // Kirim data ke view
        include __DIR__ . '/../Views/quran_list.php';
    }

    /**
     * Menampilkan ayat-ayat dari surat tertentu.
     */
    public function show($id)
    {
        // Cari surat berdasarkan ID
        $surat = Surat::find($id);

        if (!$surat) {
            echo "Surat tidak ditemukan.";
            return;
        }

        // Check if the Surat is bookmarked by the logged-in user
        $userId = $_SESSION['user_id'] ?? null;
        $isBookmarked = false;
        if ($userId) {
            $isBookmarked = Bookmark::where('user_id', $userId)->where('surat_id', $id)->exists();
        }

        // Ambil semua ayat dari surat ini
        $ayat = $surat->ayat()->orderBy('nomor')->get();

        // Kirim data ke view
        include __DIR__ . '/../Views/quran_detail.php';
    }

    /**
     * Tandai surat atau ayat sebagai telah dibaca (fitur bookmark).
     */
    public function bookmark($id)
    {
        // Pastikan user sudah login
        if (!isset($_SESSION['user_id'])) {
            header('Location: /login');
            exit;
        }

        $userId = $_SESSION['user_id'];

        // Tandai surat atau ayat berdasarkan parameter ID
        $bookmark = Bookmark::firstOrCreate([
            'user_id' => $userId,
            'surat_id' => $id,
        ]);

        // Redirect kembali ke halaman quran
        header('Location: /quran/' . $id);
        exit;
    }

    /**
     * Menampilkan daftar surat yang ditandai.
     */
    public function bookmarked()
    {
        // Pastikan user sudah login
        if (!isset($_SESSION['user_id'])) {
            header('Location: /login');
            exit;
        }

        $userId = $_SESSION['user_id'];

        // Ambil semua bookmark untuk user
        $bookmarks = Bookmark::where('user_id', $userId)->get();

        // Kirim data ke view
        include __DIR__ . '/../Views/quran_bookmarked.php';
    }
}