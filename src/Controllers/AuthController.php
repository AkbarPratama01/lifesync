<?php

namespace App\Controllers;

use App\Models\User; // Sesuaikan namespace model di sini

class AuthController
{
    public function showLogin()
    {
        $view = __DIR__ . '/../Views/login.php';
        include $view;
    }

    public function showRegister()
    {
        $view = __DIR__ . '/../Views/register.php';
        include $view;
    }

    public function handleLogin()
    {
        $email = $_POST['email'];
        $password = $_POST['password'];

        // Cari pengguna berdasarkan email
        $user = User::where('email', $email)->first();

        // Validasi
        if ($user && password_verify($password, $user->password)) {
            echo "Login berhasil! Selamat datang, " . $user->name;
        } else {
            echo "Email atau password salah.";
        }
    }

    public function handleRegister()
    {
        $name = $_POST['name'];
        $email = $_POST['email'];
        $password = $_POST['password'];

        // Enkripsi password
        $hashedPassword = password_hash($password, PASSWORD_BCRYPT);

        try {
            // Simpan pengguna baru ke database
            User::create([
                'name' => $name,
                'email' => $email,
                'password' => $hashedPassword,
                'username' => $name
            ]);
    
            // Redirect ke halaman login
            echo "
            <script src='/js/sweetalert2.all.min.js'></script>
            <script>
                Swal.fire({
                    title: 'Registrasi Berhasil!',
                    text: 'Silakan login menggunakan akun Anda.',
                    icon: 'success',
                    confirmButtonText: 'OK'
                }).then((result) => {
                    if (result.isConfirmed) {
                        window.location.href = '/login';
                    }
                });
            </script>";
            exit; // Pastikan script berhenti setelah redirect
        } catch (\Exception $e) {
            // Tampilkan pesan error jika ada masalah
            echo "
            <script src='/js/sweetalert2.all.min.js'></script>
            <script>
                Swal.fire({
                    title: 'Registrasi Gagal!',
                    text: '". addslashes($e->getMessage()) ."',
                    icon: 'error',
                    confirmButtonText: 'Coba Lagi'
                });
            </script>";
        }
    }
}