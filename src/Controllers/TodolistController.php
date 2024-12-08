<?php

namespace App\Controllers;

use App\Models\Todo; // Pastikan ini ditambahkan

class TodolistController
{
    public function index()
    {
        // Pastikan user sudah login dan ambil user ID dari sesi
        // session_start();
        if (!isset($_SESSION['user_id'])) {
            header('Location: /login');
            exit;
        }

        $userId = $_SESSION['user_id'];

        // Ambil data todos berdasarkan user_id
        $todos = Todo::where('user_id', $userId)->get();

        // Kirim data ke view
        include __DIR__ . '/../Views/todolist.php';
    }

    public function add()
    {
        // Validasi data
        $task = $_POST['task'] ?? null;
        $dueDate = $_POST['due_date'] ?? null;
        $userId = $_SESSION['user_id'] ?? null; // Pastikan user_id tersedia

        if ($task && $dueDate && $userId) {
            // Tambahkan tugas baru ke database
            Todo::create([
                'user_id' => $userId,
                'task' => $task,
                'due_date' => $dueDate,
                'is_completed' => 0,
            ]);

            // Redirect ke halaman todolist
            header('Location: /todolist');
            exit;
        }

        echo "Gagal menambahkan tugas. Pastikan semua data diisi.";
    }

    public function complete($id)
    {
        session_start();
        if (!isset($_SESSION['user_id'])) {
            header('Location: /login');
            exit;
        }

        // Cari todo berdasarkan ID dan user_id
        $todo = Todo::where('id', $id)
            ->where('user_id', $_SESSION['user_id'])
            ->first();

        if ($todo) {
            // Tandai sebagai selesai
            $todo->is_completed = 1;
            $todo->save();
            header('Location: /todolist');
            exit;
        } else {
            echo "Task not found or permission denied.";
        }
    }

    // Hapus tugas
    public function delete($id)
    {
        session_start();
        if (!isset($_SESSION['user_id'])) {
            header('Location: /login');
            exit;
        }

        // Cari todo berdasarkan ID dan user_id
        $todo = Todo::where('id', $id)
            ->where('user_id', $_SESSION['user_id'])
            ->first();

        if ($todo) {
            // Hapus todo
            $todo->delete();
            header('Location: /todolist');
            exit;
        } else {
            echo "Task not found or permission denied.";
        }
    }

    public function edit($id)
    {
        // session_start();
        if (!isset($_SESSION['user_id'])) {
            header('Location: /login');
            exit;
        }

        // Cari todo berdasarkan ID dan user_id
        $todo = Todo::where('id', $id)
            ->where('user_id', $_SESSION['user_id'])
            ->first();

        if (!$todo) {
            echo "Task not found.";
            return;
        }

        // Kirim data ke view untuk ditampilkan
        include __DIR__ . '/../Views/edit_todolist.php';
    }

    // Proses pembaruan todo
    public function update()
    {
        session_start();
        if (!isset($_SESSION['user_id'])) {
            header('Location: /login');
            exit;
        }

        // Ambil data dari formulir
        $id = $_POST['id'];
        $task = $_POST['task'];
        $due_date = $_POST['due_date'];
        $is_completed = isset($_POST['is_completed']) ? 1 : 0;

        // Update data task di database
        $todo = Todo::where('id', $id)
            ->where('user_id', $_SESSION['user_id'])
            ->first();

        if ($todo) {
            $todo->task = $task;
            $todo->due_date = $due_date;
            $todo->is_completed = $is_completed;
            $todo->save();
            header('Location: /todolist');
            exit;
        } else {
            echo "Task not found or permission denied.";
        }
    }
}