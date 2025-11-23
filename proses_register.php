<?php
session_start();
require 'koneksi.php';

if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    header('Location: register.php');
    exit;
}

// Ambil data dari form
$nama     = trim($_POST['nama'] ?? '');
$username = trim($_POST['username'] ?? '');
$email    = trim($_POST['email'] ?? '');
$password = $_POST['password'] ?? '';
$confirm  = $_POST['confirm_password'] ?? '';
$alasan   = trim($_POST['alasan'] ?? '');

// Karena di form register belum ada input tanggal_lahir & jenis_kelamin,
// kita set nilai default sementara (bisa diupdate nanti di edit_profil)
$tanggal_lahir = '0000-00-00';      // atau '2000-01-01'
$jenis_kelamin = 'Belum diisi';

// Validasi sederhana
if ($password !== $confirm) {
    echo "<script>alert('Password dan konfirmasi password tidak sama.'); window.history.back();</script>";
    exit;
}

// Di sini kita TIDAK cek tanggal_lahir & jenis_kelamin
if ($nama === '' || $username === '' || $email === '' || $password === '' || $alasan === '') {
    echo "<script>alert('Semua field wajib diisi.'); window.history.back();</script>";
    exit;
}

// Cek apakah username / email sudah dipakai
$stmt = $koneksi->prepare("SELECT id_user FROM users WHERE username = ? OR email = ? LIMIT 1");
$stmt->bind_param("ss", $username, $email);
$stmt->execute();
$result = $stmt->get_result();

if ($result->num_rows > 0) {
    echo "<script>alert('Username atau email sudah terdaftar. Gunakan yang lain.'); window.history.back();</script>";
    exit;
}

// Hash password
$passwordHash = password_hash($password, PASSWORD_DEFAULT);

// INSERT ke database -> 7 kolom, 7 tanda ?, 7 parameter
$stmt = $koneksi->prepare("
    INSERT INTO users (nama_lengkap, username, password, email, tanggal_lahir, jenis_kelamin, alasan)
    VALUES (?, ?, ?, ?, ?, ?, ?)
");
$stmt->bind_param(
    "sssssss",
    $nama,
    $username,
    $passwordHash,
    $email,
    $tanggal_lahir,
    $jenis_kelamin,
    $alasan
);

if ($stmt->execute()) {
    $_SESSION['flash_success'] = 'Registrasi berhasil, silakan login.';
    header('Location: login.php');
    exit;
} else {
    echo "<script>alert('Terjadi kesalahan saat menyimpan data.'); window.history.back();</script>";
    exit;
}
