<?php
session_start();
require 'koneksi.php';

if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    header('Location: login.php');
    exit;
}

$loginInput = trim($_POST['username'] ?? ''); 
$password   = $_POST['password'] ?? '';

if ($loginInput === '' || $password === '') {
    echo "<script>alert('Username/email dan password wajib diisi.'); window.history.back();</script>";
    exit;
}


$stmt = $koneksi->prepare("
    SELECT * FROM users
    WHERE username = ? OR email = ?
    LIMIT 1
");
$stmt->bind_param("ss", $loginInput, $loginInput);
$stmt->execute();
$result = $stmt->get_result();

if ($result->num_rows === 0) {
    echo "<script>alert('Akun tidak ditemukan. Cek kembali username/email Anda.'); window.history.back();</script>";
    exit;
}

$user = $result->fetch_assoc();


if (!password_verify($password, $user['password'])) {
    echo "<script>alert('Password salah.'); window.history.back();</script>";
    exit;
}


$_SESSION['id_user']      = $user['id_user'];
$_SESSION['nama_lengkap'] = $user['nama_lengkap'];
$_SESSION['username']     = $user['username'];
$_SESSION['email']        = $user['email'];


header('Location: index_baru.php');
exit;
