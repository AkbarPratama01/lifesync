<?php

namespace App\Controllers;

use App\Models\Bookmark;
use App\Models\Surat;

class BookmarkController
{
    /**
     * Menandai surat tertentu sebagai bookmark.
     */
    public function store($surat_id)
    {
        // Pastikan user sudah login
        if (!isset($_SESSION['user_id'])) {
            header('Location: /login');
            exit;
        }

        $userId = $_SESSION['user_id'];

        // Tandai surat sebagai bookmark
        $bookmark = Bookmark::firstOrCreate([
            'user_id' => $userId,
            'surat_id' => $surat_id,
        ]);

        // Redirect ke halaman daftar surat
        header('Location: /bookmarks');
        exit;
    }

    /**
     * Menampilkan daftar bookmark untuk user.
     */
    public function index()
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
        include __DIR__ . '/../Views/bookmarks_index.php';
    }

    /**
     * Menghapus bookmark surat tertentu.
     */
    public function destroy($bookmark_id)
    {
        // Pastikan user sudah login
        if (!isset($_SESSION['user_id'])) {
            header('Location: /login');
            exit;
        }

        $userId = $_SESSION['user_id'];

        // Cari dan hapus bookmark berdasarkan ID dan user_id
        $bookmark = Bookmark::where('user_id', $userId)
                            ->where('id', $bookmark_id)
                            ->first();

        if ($bookmark) {
            $bookmark->delete();
        }

        // Redirect ke halaman daftar bookmark
        header('Location: /bookmarks');
        exit;
    }
}