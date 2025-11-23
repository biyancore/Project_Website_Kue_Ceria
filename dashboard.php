<?php
// Cek login (ini sudah otomatis session_start di dalamnya)
require 'cek_login.php';

// Koneksi ke database
require 'koneksi.php';

// id user yang sedang login
$id_user = $_SESSION['id_user'];

// --- fungsi upload gambar ---
function uploadGambar($fieldName, $oldFile = null) {
    if (!isset($_FILES[$fieldName]) || $_FILES[$fieldName]['error'] === 4) {
        return $oldFile; // tidak ada gambar baru
    }

    $folder = 'uploads/';
    if (!is_dir($folder)) {
        mkdir($folder, 0777, true);
    }

    $namaFile = $_FILES[$fieldName]['name'];
    $tmpName  = $_FILES[$fieldName]['tmp_name'];

    $ext = pathinfo($namaFile, PATHINFO_EXTENSION);
    $newName = uniqid('post_', true) . '.' . strtolower($ext);

    move_uploaded_file($tmpName, $folder . $newName);

    // hapus file lama (kalau ada)
    if ($oldFile && file_exists($folder . $oldFile)) {
        unlink($folder . $oldFile);
    }

    return $newName;
}

// ========== UPDATE PROFIL USER ==========
if (isset($_POST['aksi_profil']) && $_POST['aksi_profil'] === 'update_profil') {
    $nama_lengkap  = trim($_POST['nama_lengkap'] ?? '');
    $username      = trim($_POST['username'] ?? '');
    $email         = trim($_POST['email'] ?? '');
    $tanggal_lahir = $_POST['tanggal_lahir'] ?? null;
    $jenis_kelamin = $_POST['jenis_kelamin'] ?? null;
    $alasan        = trim($_POST['alasan'] ?? '');

    if ($nama_lengkap === '' || $username === '' || $email === '') {
        $error_profil = "Nama, username, dan email wajib diisi.";
    } else {
        // Cek username / email tidak dipakai user lain
        $cek = $koneksi->prepare("
            SELECT id_user FROM users 
            WHERE (username = ? OR email = ?) AND id_user != ?
            LIMIT 1
        ");
        $cek->bind_param("ssi", $username, $email, $id_user);
        $cek->execute();
        $cekRes = $cek->get_result();

        if ($cekRes->num_rows > 0) {
            $error_profil = "Username atau email sudah digunakan oleh akun lain.";
        } else {
            $stmtUpd = $koneksi->prepare("
                UPDATE users
                SET nama_lengkap = ?, username = ?, email = ?, tanggal_lahir = ?, jenis_kelamin = ?, alasan = ?
                WHERE id_user = ?
            ");
            $stmtUpd->bind_param(
                "ssssssi",
                $nama_lengkap,
                $username,
                $email,
                $tanggal_lahir,
                $jenis_kelamin,
                $alasan,
                $id_user
            );

            if ($stmtUpd->execute()) {
                // update session biar nama/username ke-refresh
                $_SESSION['nama_lengkap'] = $nama_lengkap;
                $_SESSION['username']     = $username;
                $_SESSION['email']        = $email;

                header("Location: dashboard.php#profil");
                exit;
            } else {
                $error_profil = "Gagal menyimpan perubahan profil.";
            }
        }
    }
}

// ========== UPDATE FOTO PROFIL ==========
if (isset($_POST['aksi_profil']) && $_POST['aksi_profil'] === 'update_foto') {

    $folder = "uploads/profil/";
    if (!is_dir($folder)) mkdir($folder, 0777, true);

    $foto = $_FILES['foto_profil'];
    $ext = strtolower(pathinfo($foto['name'], PATHINFO_EXTENSION));

    // buat nama unik
    $newName = uniqid('profil_', true) . "." . $ext;

    // pindahkan ke uploads/profil/
    move_uploaded_file($foto['tmp_name'], $folder . $newName);

    // hapus foto lama (jika ada)
    if (!empty($user['foto_profil']) && file_exists($folder . $user['foto_profil'])) {
        unlink($folder . $user['foto_profil']);
    }

    // update db
    $update = $koneksi->prepare("UPDATE users SET foto_profil=? WHERE id_user=?");
    $update->bind_param("si", $newName, $id_user);
    $update->execute();

    header("Location: dashboard.php#profil");
    exit;
}


// ========== hapus foto ptofile ==========
if (isset($_GET['hapus_foto'])) {
    $folder = "uploads/profil/";

    $row = $koneksi->query("SELECT foto_profil FROM users WHERE id_user=$id_user")->fetch_assoc();

    if (!empty($row['foto_profil']) && file_exists($folder . $row['foto_profil'])) {
        unlink($folder . $row['foto_profil']);
    }

    $koneksi->query("UPDATE users SET foto_profil=NULL WHERE id_user=$id_user");

    $_SESSION['foto_profil'] = null;

    header("Location: dashboard.php#profil");
    exit;
}


// ========== CREATE (TAMBAH POSTINGAN) ==========
if (isset($_POST['aksi']) && $_POST['aksi'] === 'tambah') {
    $judul  = $_POST['judul'];
    $isi    = $_POST['isi'];
    $gambar = uploadGambar('gambar');

    $stmt = $koneksi->prepare(
        "INSERT INTO komunitas (judul, isi, gambar, id_user) VALUES (?, ?, ?, ?)"
    );
    $stmt->bind_param("sssi", $judul, $isi, $gambar, $id_user);
    $stmt->execute();

    header("Location: dashboard.php#posting"); // sesuaikan dengan nama file kamu
    exit;
}

// ========== UPDATE (EDIT POSTINGAN) ==========
if (isset($_POST['aksi']) && $_POST['aksi'] === 'update') {
    $id_komunitas = (int)$_POST['id_komunitas'];
    $judul        = $_POST['judul'];
    $isi          = $_POST['isi'];

    // ambil gambar lama
    $res = $koneksi->query("SELECT gambar FROM komunitas WHERE id_komunitas=$id_komunitas AND id_user=$id_user");
    $row = $res->fetch_assoc();
    $oldGambar = $row['gambar'] ?? null;

    $gambar = uploadGambar('gambar', $oldGambar);

    $stmt = $koneksi->prepare(
        "UPDATE komunitas SET judul=?, isi=?, gambar=? WHERE id_komunitas=? AND id_user=?"
    );
    $stmt->bind_param("sssii", $judul, $isi, $gambar, $id_komunitas, $id_user);
    $stmt->execute();

    header("Location: dashboard.php#posting");
    exit;
}

// ========== DELETE (HAPUS POSTINGAN) ==========
if (isset($_GET['hapus'])) {
    $id_komunitas = (int)$_GET['hapus'];

    // hapus file gambar dulu
    $res = $koneksi->query("SELECT gambar FROM komunitas WHERE id_komunitas=$id_komunitas AND id_user=$id_user");
    if ($row = $res->fetch_assoc()) {
        if ($row['gambar'] && file_exists('uploads/' . $row['gambar'])) {
            unlink('uploads/' . $row['gambar']);
        }
    }

    $koneksi->query("DELETE FROM komunitas WHERE id_komunitas=$id_komunitas AND id_user=$id_user");

    header("Location: dashboard.php#posting");
    exit;
}

// ========== READ (AMBIL SEMUA POSTINGAN SAYA) ==========
$stmt = $koneksi->prepare("
    SELECT k.*, u.username 
    FROM komunitas k 
    LEFT JOIN users u ON k.id_user = u.id_user
    WHERE k.id_user = ?
    ORDER BY k.id_komunitas DESC
");
$stmt->bind_param("i", $id_user);
$stmt->execute();
$posts = $stmt->get_result();

// data untuk MODE EDIT (kalau ada ?edit=)
$editPost = null;
if (isset($_GET['edit'])) {
    $id_edit = (int)$_GET['edit'];
    $resEdit = $koneksi->query("SELECT * FROM komunitas WHERE id_komunitas=$id_edit AND id_user=$id_user");
    $editPost = $resEdit->fetch_assoc();
}

// ========== DATA USER YANG LOGIN ==========
$userStmt = $koneksi->prepare("
    SELECT nama_lengkap, username, email, tanggal_lahir, jenis_kelamin, alasan 
    FROM users 
    WHERE id_user = ?
    LIMIT 1
");
$userStmt->bind_param("i", $id_user);
$userStmt->execute();
$userRes = $userStmt->get_result();
$user = $userRes->fetch_assoc();
?>



<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Ceria Bakery | Dashboard Member</title>

  <!-- FONT + ICON + CSS -->
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Caprasimo&family=Lobster&family=Poppins:wght@400;500;600;700&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css">
<script src="https://kit.fontawesome.com/5b43f676d3.js" crossorigin="anonymous"></script>

  <style>
    * {
  box-sizing: border-box;
  margin: 0;
  padding: 0;
  outline: none;
  border: none;
  text-decoration: none;
}

        body {
         background-color: #fff9b4;
  background-blend-mode: multiply;
  font-family: "Poppins", sans-serif;
  overflow-x: hidden;
  scroll-behavior: smooth;
    }
/* =========================================================
   NAVBAR
========================================================= */
.navbar {
  position: fixed;
  top: 0;
  width: 100%;
  z-index: 1000;
  display: flex;
  align-items: center;
  justify-content: space-between;
  padding: 0.5rem 2.5rem;
  background: linear-gradient(180deg, #d79f90, #fff9b4);
  box-shadow: 0 3px 6px rgba(0, 0, 0, 0.05);
  backdrop-filter: blur(10px);
}

.logo {
  width: 90px;
  filter: drop-shadow(2px 2px 4px rgba(0, 0, 0, 0.2));
}

.nav-menu {
  display: flex;
  gap: 25px;
  transition: all 0.4s ease;
}

.nav-link {
  font-weight: 500;
  font-size: 18px;
  color: #fff !important;
  position: relative;
  padding-bottom: 4px;
  text-align: center;
  transition: color 0.3s ease;
}

.nav-link::after {
  content: "";
  position: absolute;
  left: 50%;
  bottom: 0;
  width: 0;
  height: 2px;
  background: #ffe4ec;
  border-radius: 10px;
  transform: translateX(-50%);
  transition: all 0.3s ease;
}

.nav-link:hover::after,
.nav-link.active::after {
  width: 100%;
}

.nav-link:hover {
  color: #fff9b4 !important;
}

.nav-link.active {
  color: #fff !important;
  text-shadow: 0 0 8px rgba(255, 255, 255, 0.6);
}

.nav-icons {
  right: 0;
  display: flex !important;
  align-items: center;
  gap: 18px;
}

.nav-icons a {
  font-size: 20px;
  color: #fff;
  transition: all 0.3s ease;
}

.nav-icons a:hover {
  color: #fff9b4;
  transform: translateY(-2px);
}

.nav-icons a i {
  color: #8e1913; /* biar gak nyaru sama background */
  font-size: 26px;
  cursor: pointer;
  position: relative;
  z-index: 2001;
}

/* =========================================================
   MENU SECTION
========================================================= */

.menu-card {
  border-radius: 20px;
  overflow: hidden;
  background-color: #ffffff;
  box-shadow: 0 4px 14px rgba(0, 0, 0, 0.1);
  transition: all 0.3s ease;
  margin-bottom: 30px;
}

.menu-card:hover {
  transform: translateY(-5px);
  box-shadow: 0 6px 18px rgba(0, 0, 0, 0.15);
}

.menu-card img {
  height: 180px;
  width: 100%;
  object-fit: cover;
}

.menu-card .card-body {
  padding: 15px 18px;
}

/* =========================================================
   AUTH MODAL (LOGIN / REGISTER)
========================================================= */
.auth-modal {
  display: none;
  position: fixed;
  z-index: 2000;
  left: 0;
  top: 0;
  width: 100%;
  height: 100%;
  background: rgba(0, 0, 0, 0.5);
  justify-content: center;
  align-items: center;
}

.auth-content {
  background: #fff9b4;
  border-radius: 25px;
  padding: 30px 40px;
  width: 400px;
  box-shadow: 0 4px 20px rgba(0, 0, 0, 0.3);
  position: relative;
  animation: pop 0.3s ease;
}

@keyframes pop {
  from {
    transform: scale(0.8);
    opacity: 0;
  }
  to {
    transform: scale(1);
    opacity: 1;
  }
}

.close-btn {
  position: absolute;
  top: 15px;
  right: 20px;
  font-size: 24px;
  color: #8e1913;
  cursor: pointer;
}

.form-box {
  display: none;
  flex-direction: column;
  gap: 15px;
}

.form-box.active {
  display: flex;
}

.form-box h2 {
  text-align: center;
  color: #8e1913;
  font-family: "Caprasimo", cursive;
  margin-bottom: 10px;
}

.form-box input,
.form-box textarea,
.form-box select {
  width: 100%;
  padding: 10px;
  border-radius: 10px;
  border: 1px solid #c9b780;
  font-family: "Poppins", sans-serif;
}

.switch-form {
  text-align: center;
  font-size: 0.9rem;
}

.switch-form a {
  color: #8e1913;
  font-weight: 600;
}

   /* =========================================================
   DASHBOARD MEMBER
========================================================= */
.dashboard-section {
  background: #fffaf2;
  padding: 60px 0;
  margin-top:70px;
  margin-bottom: 40px;
  min-height: 100vh;
}

.dashboard-container {
  width: 90%;
  margin: auto;
  display: flex;
  flex-wrap: wrap;
  gap: 30px;
  justify-content: center;
  align-items: flex-start;
}

.dashboard-tabs {
  flex: 1 1 200px;
  display: flex;
  flex-direction: column;
  gap: 15px;
}

.tab-btn {
  background: linear-gradient(90deg, #d79f90, #fff9b4);
  border: none;
  padding: 12px 20px;
  border-radius: 15px;
  font-size: 16px;
  font-weight: 600;
  color: #8e1913;
  cursor: pointer;
  transition: all 0.3s ease;
  text-align: left;
}

.tab-btn.active,
.tab-btn:hover {
  background: linear-gradient(90deg, #bfa12a, #fff9b4);
  transform: translateX(5px);
}

.dashboard-content {
  flex: 3 1 600px;
  background: rgba(255, 255, 255, 0.7);
  border-radius: 25px;
  padding: 30px;
  box-shadow: 0 4px 15px rgba(0, 0, 0, 0.1);
}

.tab-content {
  display: none;
  animation: fade 0.5s ease;
}

.tab-content.active {
  display: block;
}

.profil-card {
  text-align: center;
}

.profil-img {
  width: 130px;
  height: 130px;
  border-radius: 50%;
  object-fit: cover;
  border: 4px solid #d79f90;
  margin-bottom: 15px;
}

.profil-nama {
  font-family: "Caprasimo", cursive;
  color: #8e1913;
  font-size: 1.8rem;
}

.profil-username {
  color: #bfa12a;
  font-weight: 600;
  margin-bottom: 5px;
}

.profil-email,
.profil-bio,
.profil-fav {
  color: #5b4646;
  font-size: 1rem;
}

.edit-btn {
  margin-top: 20px;
}

#editProfilForm input,
#editProfilForm textarea {
  margin-bottom: 10px;
}

/* dummy buat postingan */
/* Modal Upload Postingan (sama style dengan auth modal) */
#uploadModal {
  display: none;
  position: fixed;
  z-index: 2000;
  left: 0;
  top: 0;
  width: 100%;
  height: 100%;
  background: rgba(0, 0, 0, 0.5);
  justify-content: center;
  align-items: center;
}

#uploadModal .auth-content {
  background: #fff9b4;
  border-radius: 25px;
  padding: 30px 40px;
  width: 400px;
  box-shadow: 0 4px 20px rgba(0, 0, 0, 0.3);
  position: relative;
}

#uploadModal .close-btn {
  position: absolute;
  top: 15px;
  right: 20px;
  font-size: 24px;
  color: #8e1913;
  cursor: pointer;
}

/* ===== PROFILE SETTINGS NEW LAYOUT ===== */

.profile-settings {
  display: flex;
  flex-direction: column;
  gap: 20px;
}

.profile-header-line {
  display: flex;
  justify-content: space-between;
  align-items: flex-start;
  gap: 15px;
  margin-bottom: 5px;
}

.profile-title {
  font-size: 1.6rem;
  font-weight: 700;
  color: #8e1913;
  margin-bottom: 4px;
}

.profile-subtitle {
  font-size: 0.9rem;
  color: #7f8c8d;
  margin: 0;
}

/* blok Basic info / Account info */
.profile-section {
  background: rgba(255, 249, 180, 0.7);
  border-radius: 22px;
  padding: 18px 20px 12px;
  box-shadow: 0 8px 20px rgba(0, 0, 0, 0.05);
}

.profile-section-heading {
  font-size: 1rem;
  font-weight: 600;
  color: #8e1913;
  margin-bottom: 12px;
}

/* Foto profil + teks di samping */
.profile-basic-layout {
  display: flex;
  align-items: center;
  gap: 18px;
  margin-bottom: 10px;
}

.profile-avatar-wrapper {
  width: 72px;
  height: 72px;
  border-radius: 50%;
  border: 3px solid #d79f90;
  overflow: hidden;
  position: relative;
  background: #fff;
}

/* Override ukuran lama di dalam wrapper */
.profile-avatar-wrapper .profil-img {
  width: 100%;
  height: 100%;
  border-radius: 50%;
  object-fit: cover;
  border: none;
  margin: 0;
}

.avatar-icon {
  position: absolute;
  bottom: 4px;
  right: 4px;
  background: #8e1913;
  color: #fff;
  border-radius: 50%;
  width: 22px;
  height: 22px;
  display: flex;
  align-items: center;
  justify-content: center;
  font-size: 0.75rem;
}

.profile-avatar-text {
  display: flex;
  flex-direction: column;
  gap: 2px;
}

.avatar-label {
  font-size: 0.9rem;
  font-weight: 600;
  color: #2c3e50;
  margin: 0;
}

.avatar-actions {
  font-size: 0.8rem;
  margin: 0;
}

.avatar-actions a {
  color: #d63031;
  text-decoration: none;
}

.avatar-actions a:hover {
  text-decoration: underline;
}

.avatar-note {
  font-size: 0.75rem;
  color: #7f8c8d;
  margin: 0;
}

/* Baris-baris info */
.profile-rows {
  margin-top: 6px;
}

.profile-row {
  display: grid;
  grid-template-columns: 150px minmax(0, 1fr) auto;
  align-items: center;
  padding: 8px 0;
  font-size: 0.9rem;
}

.profile-row + .profile-row {
  border-top: 1px solid rgba(0, 0, 0, 0.06);
}

.profile-row-label {
  color: #7f8c8d;
}

.profile-row-value {
  color: #2c3e50;
}

.profile-row-cta i {
  font-size: 0.8rem;
  color: #d79f90;
}

.profile-row:hover {
  background: rgba(255, 255, 255, 0.7);
  border-radius: 12px;
  padding-left: 8px;
}

/* Form edit profil di bawahnya */
#editProfilForm {
  margin-top: 5px;
  background: #ffffff;
  border-radius: 20px;
  padding: 18px 20px;
  box-shadow: 0 8px 20px rgba(0, 0, 0, 0.07);
  display: none;              /* default hidden, ditoggle JS */
  flex-direction: column;
  gap: 10px;
}

#editProfilForm h3 {
  font-size: 1.1rem;
  color: #8e1913;
  margin-bottom: 5px;
}

#editProfilForm input,
#editProfilForm textarea,
#editProfilForm select {
  width: 100%;
  padding: 8px 10px;
  border-radius: 10px;
  border: 1px solid #f1c40f;
  font-size: 0.9rem;
  font-family: "Poppins", sans-serif;
}

#editProfilForm input:focus,
#editProfilForm textarea:focus,
#editProfilForm select:focus {
  border-color: #8e1913;
  box-shadow: 0 0 0 0.12rem rgba(142, 25, 19, 0.2);
}
/* --- CARD KECIL POSTINGAN --- */
.community-grid {
  display: grid;
  grid-template-columns: repeat(auto-fit, minmax(230px, 1fr));
  gap: 22px;
}

.community-card {
  background: #ffffff;
  border-radius: 22px;
  box-shadow: 0 8px 20px rgba(0, 0, 0, 0.12);
  overflow: hidden;
  display: flex;
  flex-direction: column;
  transition: .2s ease;
  min-height: auto !important;
}


.community-card:hover {
  transform: translateY(-4px);
  box-shadow: 0 12px 26px rgba(0,0,0,0.18);
}

#posting .community-img {
  width: 100% !important;
  height: 150px !important;
  object-fit: cover;
}


/* BODY CARD */
.community-body {
  padding: 14px 16px 18px;
}

.community-title {
  margin: 0 0 4px;
  font-size: 1rem;
  font-weight: 700;
  color: #2c3e50;
}

.community-user {
  margin: 0 0 8px;
  font-size: .85rem;
  color: #d75b63;
}

.community-caption {
  margin: 0 0 12px;
  font-size: .83rem;
  color: #333;
  line-height: 1.35;
  height: 48px;
  overflow: hidden;
}

.community-meta {
  font-size: .78rem;
  color: #888;
  display: flex;
  gap: 6px;
  align-items: center;
  margin-bottom: 10px;
}

/* Tombol */
.community-btn {
  width: 100%;
  border-radius: 30px;
  padding: 8px 0;
  font-size: .9rem;
  font-weight: 600;
  background: linear-gradient(to right, #b79a55, #e3d48c);
}

/* Override style btn-hero ketika dipakai sebagai tombol card */
#posting .community-btn.btn-hero {
  margin-top: 0 !important;
  padding: 8px 0 !important;
  font-size: 0.9rem !important;
  box-shadow: none;
}




/* =========================================================
   FOOTER
========================================================= */
footer {
  text-align: center;
  padding: 20px;
  font-size: 16px;
  color: #fff;
  background: linear-gradient(180deg, #fff9b4, #d79f90);
    position: fixed bottom;
  padding-bottom:-10px;
}

footer .social-icons a {
  color: #8e1913;
  margin: 0 10px;
  font-size: 22px;
  transition: color 0.3s ease;
}

footer .social-icons a:hover {
  color: #ff6f91;
}

.btn-hero {
  display: inline-block;
  padding: 13px 25px;
  margin-top: 50px;
  border-radius: 25px;
  font-weight: 600;
  font-size: 18px;
  color: #8e1913;
  cursor: pointer;
  background: linear-gradient(90deg, #90804e, #fff9b4);
  box-shadow: 0 4px 8px rgba(110, 110, 110, 0.7);
  transition: all 0.3s ease;
}
.btn-hero:hover {
  background: linear-gradient(90deg, #b6a264, #eae4a2);
  transform: translateY(-2px);
}

/* =========================================================
   FEATURED TITLE
========================================================= */
.featured-title {
  background-image: url("image/backgroundTitle.png");
  background-size: 260px auto;   /* ⬅ ganti dari 20% ke px */
  background-position: center;
  background-repeat: no-repeat;
  text-align: center;
  padding: 30px 0 10px;
  margin: 10px 0 40px;
  display: flex;
  flex-direction: column;
  align-items: center;
  justify-content: center;
  width: 100%;                   /* ⬅ penting, biar lebarnya full */
}

.featured-title h2 {
  font-family: "Caprasimo", cursive;
  font-size: 2.6rem;
  color: #8e1913;
  letter-spacing: 1px;
  margin: 0 auto;
  text-align: center;
}
  </style>
</head>
<body>

<!-- ================= NAVBAR ================= -->
<nav class="navbar">
  <div class="navbar-left">
    <img src="image/ceria.png" alt="Logo Ceria Bakery" class="logo">
  </div>

  <ul class="nav-menu">
    <li><a href="index_baru.php#hero" class="nav-link active"><i class="fa-solid fa-house"></i> Home</a></li>
    <li><a href="index_baru.php#artikel" class="nav-link"><i class="fa-solid fa-newspaper"></i> Artikel</a></li>
    <li><a href="index_baru.php#resep" class="nav-link"><i class="fa-solid fa-cookie-bite"></i> Resep</a></li>
    <li><a href="index_baru.php#komunitas" class="nav-link"><i class="fa-solid fa-users"></i> Komunitas</a></li>
    <li><a href="index_baru.php#toko" class="nav-link"><i class="fa-solid fa-bag-shopping"></i> Shop</a></li>
  </ul>

  <div class="nav-icons">
    <a href="#" id="userIcon" title="Akun Saya"><i class="fa-solid fa-user-circle"></i></a>
  </div>
</nav>

<!-- ================= DASHBOARD MEMBER ================= -->
<section id="dashboard" class="dashboard-section">
  <div class="featured-title"><h2>Dashboard Member</h2></div>
  <div class="dashboard-container">

    <!-- Tabs -->
    <div class="dashboard-tabs">
      <button class="tab-btn active" data-tab="profil">Profil Saya</button>
      <button class="tab-btn" data-tab="posting">Postingan Saya</button>
      <button class="tab-btn" data-tab="favorit">Resep Favorit</button>
      <button class="tab-btn link-underline-light" data-tab="logout">Log out</button>
    </div>

    <!-- ==== KONTEN TIAP TAB ==== -->
    <div class="dashboard-content">

      <!-- ========== TAB PROFIL ========== -->
      <div class="tab-content active" id="profil">
        <div class="profile-settings">

          <!-- Header judul + tombol edit -->
          <div class="profile-header-line">
            <div>
              <h3 class="profile-title">Pengaturan Akun</h3>
              <p class="profile-subtitle">
                Kelola informasi dasar dan akun Ceria Bakery kamu.
              </p>
            </div>
            <button class="btn-hero edit-btn" id="editProfilBtn" type="button">
              Edit Profil
            </button>
          </div>

          <!-- BASIC INFO -->
          <div class="profile-section">
            <h4 class="profile-section-heading">Basic info</h4>

            <!-- Foto profil -->
            <div class="profile-basic-layout">
              <div class="profile-avatar-wrapper">
                <?php
                  $fotoProfil = !empty($user['foto_profil'])
                    ? 'uploads/profil/' . htmlspecialchars($user['foto_profil'], ENT_QUOTES, 'UTF-8')
                    : 'image/default-avatar.jpg';
                ?>
                <img
                  src="<?= $fotoProfil; ?>"
                  alt="Foto Profil"
                  class="profil-img"
                >
                <span class="avatar-icon">
                  <i class="fa-solid fa-camera"></i>
                </span>
              </div>

              <div class="profile-avatar-text">
                <p class="avatar-label">Foto Profil</p>
                <p class="avatar-actions">
                  <a href="#" class="avatar-upload-link">Upload foto baru</a>
                  <span>·</span>
                  <a href="dashboard.php?hapus_foto=1" class="avatar-remove-link">Hapus</a>
                </p>
                <p class="avatar-note">Format JPG/PNG, maks. 2MB.</p>
              </div>
            </div>

            <!-- Form upload foto (hidden input + auto submit) -->
            <form
              id="uploadFotoForm"
              method="post"
              enctype="multipart/form-data"
              action="dashboard.php#profil"
              style="margin-top:10px;"
            >
              <input
                type="file"
                id="inputFotoProfil"
                name="foto_profil"
                accept="image/*"
                style="display:none;"
              >
              <input type="hidden" name="aksi_profil" value="update_foto">
            </form>

            <!-- Baris data basic info -->
            <div class="profile-rows">
              <div class="profile-row">
                <span class="profile-row-label">Nama</span>
                <span class="profile-row-value">
                  <?= htmlspecialchars($user['nama_lengkap'] ?? '-'); ?>
                </span>
                <span class="profile-row-cta">
                  <i class="fa-solid fa-chevron-right"></i>
                </span>
              </div>

              <div class="profile-row">
                <span class="profile-row-label">Tanggal Lahir</span>
                <span class="profile-row-value">
                  <?= !empty($user['tanggal_lahir']) 
                        ? date('d F Y', strtotime($user['tanggal_lahir'])) 
                        : '-'; ?>
                </span>
                <span class="profile-row-cta">
                  <i class="fa-solid fa-chevron-right"></i>
                </span>
              </div>

              <div class="profile-row">
                <span class="profile-row-label">Jenis Kelamin</span>
                <span class="profile-row-value">
                  <?= htmlspecialchars($user['jenis_kelamin'] ?? '-'); ?>
                </span>
                <span class="profile-row-cta">
                  <i class="fa-solid fa-chevron-right"></i>
                </span>
              </div>

              <div class="profile-row">
                <span class="profile-row-label">Email</span>
                <span class="profile-row-value">
                  <?= htmlspecialchars($user['email'] ?? '-'); ?>
                </span>
                <span class="profile-row-cta">
                  <i class="fa-solid fa-chevron-right"></i>
                </span>
              </div>
            </div>
          </div>

          <!-- ACCOUNT INFO -->
          <div class="profile-section">
            <h4 class="profile-section-heading">Account info</h4>

            <div class="profile-rows">
              <div class="profile-row">
                <span class="profile-row-label">Username</span>
                <span class="profile-row-value">
                  @<?= htmlspecialchars($user['username'] ?? 'member'); ?>
                </span>
                <span class="profile-row-cta">
                  <i class="fa-solid fa-chevron-right"></i>
                </span>
              </div>

              <div class="profile-row">
                <span class="profile-row-label">Password</span>
                <span class="profile-row-value">********</span>
                <span class="profile-row-cta">
                  <i class="fa-solid fa-chevron-right"></i>
                </span>
              </div>
            </div>
          </div>

          <!-- FORM EDIT PROFIL -->
          <form id="editProfilForm" class="form-box" method="post" action="#profil">
            <h3>Edit Profil</h3>

            <?php if (!empty($error_profil)): ?>
              <p style="color:#c0392b; font-size:0.85rem; margin-bottom:8px;">
                <?= htmlspecialchars($error_profil); ?>
              </p>
            <?php endif; ?>

            <input type="hidden" name="aksi_profil" value="update_profil">

            <input
              type="text"
              name="nama_lengkap"
              placeholder="Nama Lengkap"
              value="<?= htmlspecialchars($user['nama_lengkap'] ?? ''); ?>"
              required
            >

            <input
              type="text"
              name="username"
              placeholder="Username"
              value="<?= htmlspecialchars($user['username'] ?? ''); ?>"
              required
            >

            <input
              type="email"
              name="email"
              placeholder="Email"
              value="<?= htmlspecialchars($user['email'] ?? ''); ?>"
              required
            >

            <label style="font-size:0.8rem; margin-top:4px;">Tanggal Lahir</label>
            <input
              type="date"
              name="tanggal_lahir"
              value="<?= !empty($user['tanggal_lahir']) ? htmlspecialchars($user['tanggal_lahir']) : ''; ?>"
            >

            <label style="font-size:0.8rem; margin-top:4px;">Jenis Kelamin</label>
            <select name="jenis_kelamin">
              <option value="">Pilih jenis kelamin</option>
              <option value="Perempuan" <?= (isset($user['jenis_kelamin']) && $user['jenis_kelamin'] === 'Perempuan') ? 'selected' : ''; ?>>
                Perempuan
              </option>
              <option value="Laki-laki" <?= (isset($user['jenis_kelamin']) && $user['jenis_kelamin'] === 'Laki-laki') ? 'selected' : ''; ?>>
                Laki-laki
              </option>
              <option value="Lainnya" <?= (isset($user['jenis_kelamin']) && $user['jenis_kelamin'] === 'Lainnya') ? 'selected' : ''; ?>>
                Lainnya
              </option>
            </select>

            <textarea
              rows="3"
              name="alasan"
              placeholder="Bio / alasan join komunitas"
            ><?= htmlspecialchars($user['alasan'] ?? ''); ?></textarea>

            <button type="submit" class="btn-hero">Simpan Perubahan</button>
          </form>

        </div>
      </div>

      <!-- ========== TAB POSTINGAN SAYA ========== -->
      <div class="tab-content" id="posting">
        <div>
          <h3 class="profile-title">Postingan Saya</h3>
          <p class="profile-subtitle">
            Semua resep dan cerita baking yang sudah kamu upload akan muncul di sini. Kalau kamu tambah postingan baru, card-nya akan otomatis bertambah.
            <br><br>
          </p>
        </div>

        <div class="community-grid" id="postingSayaList">
          <?php if ($posts->num_rows > 0): ?>
            <?php while ($post = $posts->fetch_assoc()): ?>
              <?php
                $gambarSrc = !empty($post['gambar'])
                  ? 'uploads/' . htmlspecialchars($post['gambar'])
                  : 'image/reseplembut.jpg';
              ?>
              <article class="community-card">
                <img
                  src="<?= $gambarSrc; ?>"
                  alt="<?= htmlspecialchars($post['judul']); ?> @<?= htmlspecialchars($post['username'] ?? 'member'); ?>"
                  class="community-img"
                >
                <div class="community-body">
                  <h5 class="community-title">
                    <?= htmlspecialchars($post['judul']); ?>
                  </h5>

                  <p class="community-user">
                    @<?= htmlspecialchars($post['username'] ?? 'member'); ?> • Komunitas
                  </p>

                  <p class="community-caption">
                    <?= nl2br(htmlspecialchars($post['isi'])); ?>
                  </p>

                  <div class="community-meta">
                    <span>❤️ 0 suka</span>
                    <span>•</span>
                    <span>baru saja</span>
                  </div>

                  <button
                    type="button"
                    class="btn-hero community-btn lihat-post-btn"
                    data-gambar="<?= $gambarSrc; ?>"
                    data-judul="<?= htmlspecialchars($post['judul']); ?>"
                    data-user="@<?= htmlspecialchars($post['username'] ?? 'member'); ?> • Komunitas"
                    data-isi="<?= nl2br(htmlspecialchars($post['isi'], ENT_QUOTES)); ?>"
                  >
                    Lihat Postingan
                  </button>

                  <div style="display:flex; gap:8px; margin-top:10px;">
                    <a href="dashboard.php?edit=<?= (int)$post['id_komunitas']; ?>#posting"
                       class="btn-hero community-btn"
                       style="flex:1; text-align:center;">
                      Edit
                    </a>

                    <a href="dashboard.php?hapus=<?= (int)$post['id_komunitas']; ?>#posting"
                       class="btn-hero community-btn"
                       style="flex:1; text-align:center; background:linear-gradient(to right,#c0392b,#e74c3c);"
                       onclick="return confirm('Yakin ingin menghapus postingan ini?');">
                      Hapus
                    </a>
                  </div>
                </div>
              </article>
            <?php endwhile; ?>
          <?php else: ?>
            <p style="grid-column:1/-1; text-align:center; padding:20px;">
              Belum ada postingan. Yuk buat postingan pertama kamu! ✨
            </p>
          <?php endif; ?>
        </div>

        <div style="text-align:center; margin-top:25px;">
          <button id="tambahPostBtn" class="btn-hero" style="max-width:260px; font-size:16px;">
            Tambah Postingan Baru
          </button>
        </div>
      </div>

      <!-- ========== TAB RESEP FAVORIT ========== -->
      <div class="tab-content" id="favorit">
        <div>
          <h3 class="profile-title">Resep Favorit Saya</h3>
          <p class="profile-subtitle">
            Semua resep kamu simpan akan muncul di sini. 
          </p>
          <br>
        </div>

        <div class="menu-grid" style="grid-template-columns: repeat(auto-fit, minmax(250px, 1fr)); gap:40px;">
          <!-- JS renderFavoritesDashboard() akan mengisi kartu di sini -->
        </div>
      </div>

      <!-- ========== TAB LOGOUT (OPTIONAL) ========== -->
      <div class="tab-content" id="logout">
        <h3 class="profile-title">Keluar Akun</h3>
        <p class="profile-subtitle">
          Klik tombol di bawah ini untuk keluar dari akun Ceria Bakery.
        </p>
        <br>
        <a href="logout.php" class="btn-hero">Log out</a>
      </div>

    </div> <!-- end .dashboard-content -->
  </div>   <!-- end .dashboard-container -->
</section>

<!-- ================= MODAL UPLOAD POSTINGAN ================= -->
<div id="uploadModal" class="auth-modal">
  <div class="auth-content" style="max-width:430px;">
    <span class="close-btn">&times;</span>

    <!-- form dipakai untuk TAMBAH & EDIT -->
    <form id="uploadForm"
          class="form-box active"
          method="post"
          enctype="multipart/form-data"
          action="#posting">

      <h2 style="text-align:center; margin-bottom:15px;">
        <?= $editPost ? 'Edit Postingan' : 'Tambah Postingan Baru'; ?>
      </h2>

      <input type="hidden" name="aksi" value="<?= $editPost ? 'update' : 'tambah'; ?>">

      <?php if ($editPost): ?>
        <input type="hidden" name="id_komunitas"
               value="<?= (int)$editPost['id_komunitas']; ?>">
      <?php endif; ?>

      <input type="text"
             name="judul"
             placeholder="Judul Postingan"
             required
             value="<?= $editPost ? htmlspecialchars($editPost['judul']) : ''; ?>">

      <textarea name="isi"
                placeholder="Cerita / deskripsi postingan kamu"
                rows="5"
                required><?= $editPost ? htmlspecialchars($editPost['isi']) : ''; ?></textarea>

      <input type="file" name="gambar" accept="image/*">

      <?php if ($editPost && !empty($editPost['gambar'])): ?>
        <p style="font-size:0.8rem; margin-top:8px;">
          Gambar saat ini:
          <strong><?= htmlspecialchars($editPost['gambar']); ?></strong>
        </p>
      <?php endif; ?>

      <button type="submit" class="btn-hero" style="margin-top:15px;">
        <?= $editPost ? 'Update Postingan' : 'Upload'; ?>
      </button>
    </form>
  </div>
</div>

<!-- ================= MODAL LIHAT POSTINGAN ================= -->
<div id="viewPostModal" class="auth-modal">
  <div class="auth-content" style="max-width:460px; padding:22px 22px 26px;">
    <span class="close-btn close-view-post">&times;</span>

    <!-- Card postingan di dalam modal -->
    <article class="community-card" style="margin-bottom:0;">
      <img id="viewPostImage"
           src=""
           alt="Detail Postingan"
           class="community-img"
           style="width:100%; height:200px; object-fit:cover;">

      <div class="community-body">
        <h5 id="viewPostTitle" class="community-title">
          <!-- judul diisi via JS -->
        </h5>

        <p id="viewPostUser" class="community-user">
          <!-- @username • Komunitas -->
        </p>

        <p id="viewPostIsi"
           class="community-caption"
           style="height:auto; max-height:none; margin-bottom:10px;">
          <!-- isi postingan -->
        </p>

        <div class="community-meta">
          <span>❤️ 0 suka</span>
          <span>•</span>
          <span>baru saja</span>
        </div>
      </div>
    </article>
  </div>
</div>


  <!-- ================= FOOTER ================= -->
  <footer>
    <div class="social-icons">
      <a href="#"><i class="fa-brands fa-instagram"></i></a>
      <a href="#"><i class="fa-brands fa-facebook"></i></a>
      <a href="#"><i class="fa-brands fa-tiktok"></i></a>
    </div>
    <p>© 2025 Ceria Bakery. Semua Hak Dilindungi.</p>
  </footer>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>

<script>
  // localStorage.clear()
document.addEventListener("DOMContentLoaded", () => {
  const navLinks = document.querySelectorAll(".nav-link");
  const sections = document.querySelectorAll("section");

  window.addEventListener("scroll", () => {
    let current = "";
    sections.forEach(section => {
      const sectionTop = section.offsetTop - 90;
      if (scrollY >= sectionTop) current = section.getAttribute("id");
    });

    navLinks.forEach(link => {
      link.classList.remove("active");
      if (link.getAttribute("href").includes(current)) {
        link.classList.add("active");
      }
    });
  });
});
</script>

<script>
document.addEventListener("DOMContentLoaded", () => {
  // Paksa hapus bullet
  document.querySelectorAll(".nav-menu").forEach(ul => {
    ul.style.listStyle = "none";
    ul.style.display = "flex";
    ul.style.justifyContent = "center";
    ul.style.alignItems = "center";
    ul.style.gap = "40px";
  });
});
</script>

<script>
window.addEventListener("scroll", () => {
  const navbar = document.querySelector(".navbar");
  if (window.scrollY > 50) {
    navbar.classList.add("scrolled");
  } else {
    navbar.classList.remove("scrolled");
  }
});
</script>


<script>
document.addEventListener("DOMContentLoaded", () => {
  const uploadLink = document.querySelector(".avatar-upload-link");
  const inputFoto  = document.getElementById("inputFotoProfil");
  const uploadForm = document.getElementById("uploadFotoForm");

  if (uploadLink && inputFoto && uploadForm) {
    // Klik teks "Upload foto baru" => buka file picker
    uploadLink.addEventListener("click", function(e) {
      e.preventDefault();
      inputFoto.click();
    });

    // Begitu user pilih file => form auto-submit
    inputFoto.addEventListener("change", function() {
      if (inputFoto.files.length > 0) {
        uploadForm.submit();
      }
    });
  }
});
</script>



<script>
document.addEventListener("DOMContentLoaded", () => {
  const viewModal   = document.getElementById("viewPostModal");
  const imgEl       = document.getElementById("viewPostImage");
  const titleEl     = document.getElementById("viewPostTitle");
  const userEl      = document.getElementById("viewPostUser");
  const isiEl       = document.getElementById("viewPostIsi");
  const closeView   = document.querySelector(".close-view-post");

  // Delegasi click ke tombol "Lihat Postingan"
  document.addEventListener("click", function(e) {
    if (e.target.classList.contains("lihat-post-btn")) {
      const btn = e.target;

      const gambar = btn.getAttribute("data-gambar") || "";
      const judul  = btn.getAttribute("data-judul") || "";
      const user   = btn.getAttribute("data-user") || "";
      const isi    = btn.getAttribute("data-isi") || "";

      if (imgEl)   imgEl.src = gambar;
      if (titleEl) titleEl.textContent = judul;
      if (userEl)  userEl.textContent  = user;
      if (isiEl)   isiEl.innerHTML     = isi; // sudah di-escape dari PHP

      if (viewModal) viewModal.style.display = "flex";
    }
  });

  // Tutup modal
  if (closeView) {
    closeView.addEventListener("click", () => {
      viewModal.style.display = "none";
    });
  }

  window.addEventListener("click", (e) => {
    if (e.target === viewModal) {
      viewModal.style.display = "none";
    }
  });
});
</script>


  <!-- Dashboard Tabs & Edit Profil -->
  <script>
document.addEventListener("DOMContentLoaded", () => {
  const tabBtns = document.querySelectorAll(".tab-btn");
  const tabContents = document.querySelectorAll(".tab-content");
  const editBtn = document.getElementById("editProfilBtn");
  const editForm = document.getElementById("editProfilForm");

  tabBtns.forEach(btn => {
    btn.addEventListener("click", () => {
      tabBtns.forEach(b => b.classList.remove("active"));
      btn.classList.add("active");
      tabContents.forEach(c => c.classList.remove("active"));
      document.getElementById(btn.dataset.tab).classList.add("active");
    });
  });

  if (editBtn && editForm) {
    editBtn.addEventListener("click", () => {
      const formVisible = editForm.style.display === "flex";
      editForm.style.display = formVisible ? "none" : "flex";
    });
  }
});

  </script>


<!-- dashboard resep love yang bisa dihapus -->
<script>
// =============== LINK HALAMAN RESEP (GLOBAL) ===============
const resepLinks = {
    coklatlumer: "resep/resep-coklatlumer.php",
    bolupandan: "resep/resep-bolupandan.php",
    cheesecakepanggang: "resep/resep-cheesecake.php"
};


document.addEventListener("DOMContentLoaded", () => {

    // --- FUNGSI UTAMA ---

    // Ambil data favorit dari LocalStorage
    function getFavorites() {
        const favorites = localStorage.getItem('ceriaFavorites');
        return favorites ? JSON.parse(favorites) : {};
    }

    // Simpan data favorit
    function saveFavorites(favorites) {
        localStorage.setItem('ceriaFavorites', JSON.stringify(favorites));
    }

    // Render daftar favorit ke dashboard
    function renderFavoritesDashboard() {
        const favorites = getFavorites();
        const container = document.querySelector('#favorit .menu-grid');
        if (!container) return;

        container.innerHTML = '';

        // Jika tidak ada favorit
        if (Object.keys(favorites).length === 0) {
            container.innerHTML =
                `<p style="grid-column: 1/-1; text-align: center; padding: 20px;">
                    Anda belum menambahkan resep favorit. Tambahkan sekarang!
                 </p>`;
            return;
        }

        // Generate card favorit
        for (const id in favorites) {
            const resep = favorites[id];
            const cardHtml = `
                <div class="menu-card" data-resep-id="${id}">
                    <img src="image/${id}.jpg" alt="${resep.title}">
                    <div class="card-body">
                        <h5>${resep.title}</h5>
                        <p>Ditambahkan sebagai favorit Anda. 😊</p>

                        <div style="display:flex; gap:10px; margin-top:10px;">
                            <button class="btn-hero lihat-resep-btn" data-resep-id="${id}">
                                Lihat Resep
                            </button>

                            <button class="btn-hero delete-fav-btn" data-resep-id="${id}">
                                Hapus
                            </button>
                        </div>
                    </div>
                </div>
            `;
            container.innerHTML += cardHtml;
        }
    }

    // Toggle tambah / hapus favorit
    function toggleFavorite(id, isDeletion = false) {
        const favorites = getFavorites();
        const icon = document.querySelector(`.favorite-icon[data-resep-id="${id}"]`);

        let shouldBeFavorite = !favorites[id]; 

        if (isDeletion) shouldBeFavorite = false;

        if (shouldBeFavorite) {
            const title = icon ? icon.getAttribute('data-title') : "Tanpa Judul";
            favorites[id] = { id: id, title: title };
            if (icon) icon.style.color = 'red';
            alert(`"${title}" berhasil ditambahkan ke Favorit!`);
        } else {
            const title = favorites[id] ? favorites[id].title : "Resep";
            delete favorites[id];
            if (icon) icon.style.color = '#8e1913';
            alert(`"${title}" berhasil dihapus dari Favorit.`);
        }

        saveFavorites(favorites);
        renderFavoritesDashboard();
        updateIconVisuals();
    }

    // Update ikon love di halaman resep
    function updateIconVisuals() {
        const favorites = getFavorites();
        document.querySelectorAll('.favorite-icon').forEach(icon => {
            const id = icon.getAttribute('data-resep-id');
            icon.style.color = favorites[id] ? 'red' : '#8e1913';
        });
    }

    // ================= EVENT DELEGATION =================
    // 1. Klik ikon love di section RESEP
    document.addEventListener("click", function(e) {
        if (e.target.classList.contains("favorite-icon")) {
            const id = e.target.getAttribute("data-resep-id");
            toggleFavorite(id);
        }
    });

    // 2. Klik tombol "Hapus" di dashboard
    document.addEventListener("click", function(e) {
        if (e.target.classList.contains("delete-fav-btn")) {
            const id = e.target.getAttribute("data-resep-id");
            toggleFavorite(id, true);
        }
    });

    // 3. Klik tombol "Lihat Resep"
    document.addEventListener("click", function(e) {
        if (e.target.classList.contains("lihat-resep-btn")) {
            const id = e.target.getAttribute("data-resep-id");
            console.log("Lihat Resep:", id);

            if (resepLinks[id]) {
                window.location.href = resepLinks[id];
            } else {
                alert("Halaman resep belum tersedia.");
            }
        }
    });

    // ================= INISIALISASI AWAL =================
    updateIconVisuals();
    renderFavoritesDashboard();
});
</script>


  <!-- Modal Upload Postingan -->
  <script>
document.addEventListener("DOMContentLoaded", () => {
  const uploadModal = document.getElementById("uploadModal");
  const tambahPostBtn = document.getElementById("tambahPostBtn");
  const closeBtn = uploadModal.querySelector(".close-btn");

  if (tambahPostBtn) {
    tambahPostBtn.addEventListener("click", () => uploadModal.style.display = "flex");
  }
  if (closeBtn) {
    closeBtn.addEventListener("click", () => uploadModal.style.display = "none");
  }

  window.addEventListener("click", e => { 
    if (e.target === uploadModal) uploadModal.style.display = "none"; 
  });
});
  </script>

<?php if ($editPost): ?>
<script>
  document.addEventListener("DOMContentLoaded", () => {
    const uploadModal = document.getElementById("uploadModal");
    if (uploadModal) uploadModal.style.display = "flex";
  });
</script>
<?php endif; ?>



</body>
</html>
