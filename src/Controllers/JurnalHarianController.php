<?php

namespace App\Controllers;

use App\Models\Journal;

class JurnalHarianController
{
    /**
     * Tampilkan daftar jurnal.
     */
    public function index()
    {
        // Check if user is logged in
        if (!isset($_SESSION['user_id'])) {
            header('Location: /login');
            exit;
        }

        $userId = $_SESSION['user_id'];
        $journals = Journal::where('user_id', $userId)->orderBy('date', 'desc')->get();

        // Tampilkan daftar jurnal menggunakan view langsung tanpa folder tambahan
        include __DIR__ . '/../Views/jurnalharian.php';
    }

    /**
     * Tampilkan form tambah jurnal.
     */
    public function create()
    {
        // Check if user is logged in
        if (!isset($_SESSION['user_id'])) {
            header('Location: /login');
            exit;
        }

        include __DIR__ . '/../Views/jurnalharian_create.php'; // Gunakan langsung view tanpa folder
    }

    /**
     * Simpan jurnal baru.
     */
    public function store()
    {
        // Check if user is logged in
        if (!isset($_SESSION['user_id'])) {
            header('Location: /login');
            exit;
        }

        $userId = $_SESSION['user_id'];

        $data = [
            'user_id' => $userId,
            'date' => $_POST['date'],
            'title' => $_POST['title'],
            'content' => $_POST['content'],
        ];

        Journal::create($data);

        header('Location: /jurnal-harian');
        exit;
    }

    /**
     * Tampilkan form edit jurnal.
     */
    public function edit($id)
    {
        // Check if user is logged in
        if (!isset($_SESSION['user_id'])) {
            header('Location: /login');
            exit;
        }

        $userId = $_SESSION['user_id'];
        $journal = Journal::where('user_id', $userId)->findOrFail($id);

        include __DIR__ . '/../Views/jurnalharian_edit.php'; // Gunakan langsung view tanpa folder
    }

    /**
     * Perbarui jurnal.
     */
    public function update($id)
    {
        // Check if user is logged in
        if (!isset($_SESSION['user_id'])) {
            header('Location: /login');
            exit;
        }

        $userId = $_SESSION['user_id'];
        $journal = Journal::where('user_id', $userId)->findOrFail($id);

        $journal->update([
            'date' => $_POST['date'],
            'title' => $_POST['title'],
            'content' => $_POST['content'],
        ]);

        header('Location: /jurnal-harian');
        exit;
    }

    /**
     * Hapus jurnal.
     */
    public function delete($id)
    {
        // Check if user is logged in
        if (!isset($_SESSION['user_id'])) {
            header('Location: /login');
            exit;
        }

        $userId = $_SESSION['user_id'];
        $journal = Journal::where('user_id', $userId)->findOrFail($id);

        $journal->delete();

        header('Location: /jurnal-harian');
        exit;
    }
}