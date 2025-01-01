<?php

namespace App\Controllers;

use App\Models\RiwayatFinansial;

class RiwayatFinansialController
{
  /**
   * Tampilkan daftar riwayat finansial.
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
      $financialHistory = RiwayatFinansial::where('user_id', $userId)->orderBy('date', 'desc')->get();

      // Kirim data riwayat shalat ke view
      include __DIR__ . '/../Views/riwayatfinansial.php'; // Pastikan menggunakan view yang sesuai
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
          'description' => $_POST['description'],
          'category' => $_POST['category'],
          'type' => $_POST['type'],
          'nominal' => $_POST['nominal'],
      ];

      RiwayatFinansial::create($data);

      header('Location: /financial_records');
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
      $riwayatShalat = RiwayatFinansial::where('user_id', $userId)->findOrFail($id);

      $riwayatShalat->delete();

      header('Location: /financial_records');
      exit;
  }
}