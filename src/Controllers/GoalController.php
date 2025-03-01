<?php

namespace App\Controllers;

use App\Models\Goal; // Pastikan ini ditambahkan

class GoalController
{
  public function index()
  {
    // Pastikan user sudah login dan ambil user ID dari sesi
    // 
    if (!isset($_SESSION['user_id'])) {
        header('Location: /login');
        exit;
    }

    $userId = $_SESSION['user_id'];

    // Ambil data todos berdasarkan user_id
    $goals = Goal::where('user_id', $userId)->get();

    // Kirim data ke view
    include __DIR__ . '/../Views/goal.php';
  }

  public function add()
  {
    // Validasi data
    $text = $_POST['text'] ?? null;
    $year = $_POST['year'] ?? null;
    $userId = $_SESSION['user_id'] ?? null; // Pastikan user_id tersedia

    if ($text && $year && $userId) {
        // Tambahkan tugas baru ke database
        Goal::create([
            'user_id' => $userId,
            'text' => $text,
            'year' => $year,
            'is_completed' => 0,
        ]);

        // Redirect ke halaman todolist
        header('Location: /goal');
        exit;
    }

    echo "Gagal menambahkan tugas. Pastikan semua data diisi.";
  }

  public function complete($id)
  {
    if (!isset($_SESSION['user_id'])) {
        header('Location: /login');
        exit;
    }

    // Cari todo berdasarkan ID dan user_id
    $goal = Goal::where('id', $id)
        ->where('user_id', $_SESSION['user_id'])
        ->first();

    if ($goal) {
        // Tandai sebagai selesai
        $goal->is_completed = 1;
        $goal->save();
        header('Location: /goal');
        exit;
    } else {
        echo "Goal not found or permission denied.";
    }
  }

  // Hapus tugas
  public function delete($id)
  {
      
    if (!isset($_SESSION['user_id'])) {
        header('Location: /login');
        exit;
    }

    // Cari todo berdasarkan ID dan user_id
    $goal = Goal::where('id', $id)
        ->where('user_id', $_SESSION['user_id'])
        ->first();

    if ($goal) {
        // Hapus todo
        $goal->delete();
        header('Location: /goal');
        exit;
    } else {
        echo "Task not found or permission denied.";
    }
  }

  public function edit($id)
  {
    // 
    if (!isset($_SESSION['user_id'])) {
        header('Location: /login');
        exit;
    }

    // Cari todo berdasarkan ID dan user_id
    $goal = Goal::where('id', $id)
        ->where('user_id', $_SESSION['user_id'])
        ->first();

    if (!$goal) {
        echo "Task not found.";
        return;
    }

    // Kirim data ke view untuk ditampilkan
    include __DIR__ . '/../Views/edit_goal.php';
  }

  public function update()
  {
      
    if (!isset($_SESSION['user_id'])) {
        header('Location: /login');
        exit;
    }

    // Ambil data dari formulir
    $id = $_POST['id'];
    $text = $_POST['text'];
    $year = $_POST['year'];
    $is_completed = isset($_POST['is_completed']) ? 1 : 0;

    // Update data task di database
    $goal = Goal::where('id', $id)
        ->where('user_id', $_SESSION['user_id'])
        ->first();

    if ($goal) {
        $goal->text = $text;
        $goal->year = $year;
        $goal->is_completed = $is_completed;
        $goal->save();
        header('Location: /goal');
        exit;
    } else {
        echo "Task not found or permission denied.";
    }
  }
}