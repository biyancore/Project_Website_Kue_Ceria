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
.community-grid {
  display: grid;
  grid-template-columns: repeat(auto-fit, minmax(230px, 1fr));
  gap: 20px;
}

.community-card {
  background: #ffffff;
  border-radius: 24px;
  box-shadow: 0 8px 20px rgba(0,0,0,0.12);
  overflow: hidden;
  display: flex;
  flex-direction: column;
  transition: transform .2s ease, box-shadow .2s ease;
}

.community-card:hover {
  transform: translateY(-4px);
  box-shadow: 0 12px 26px rgba(0,0,0,0.16);
}

.community-img {
  width: 100%;
  height: 150px;
  object-fit: cover;
}

.community-body {
  padding: 14px 18px 18px;
}

.community-title {
  margin: 0 0 4px;
  font-size: 1rem;
  font-weight: 700;
}

.community-user {
  margin: 0 0 8px;
  font-size: 0.85rem;
  color: #d75b63;
}

.community-caption {
  margin: 0 0 10px;
  font-size: 0.85rem;
  line-height: 1.35;
}

.community-meta {
  font-size: 0.8rem;
  color: #888;
  display: flex;
  gap: 4px;
  align-items: center;
  margin-bottom: 12px;
}

.community-btn {
  width: 100%;
  border-radius: 30px;
  padding: 8px 0;
  font-size: 0.9rem;
  font-weight: 600;
  background: linear-gradient(to right, #b79a55, #e3d48c);
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

      <div class="dashboard-content">
<!-- PROFIL (LAYOUT BARU) -->
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
          <img src="image/mitsuri.jpg" alt="Foto Profil" class="profil-img">
          <span class="avatar-icon">
            <i class="fa-solid fa-camera"></i>
          </span>
        </div>
        <div class="profile-avatar-text">
          <p class="avatar-label">Foto Profil</p>
          <p class="avatar-actions">
            <a href="#" class="avatar-upload-link">Upload foto baru</a>
            <span>·</span>
            <a href="#" class="avatar-remove-link">Hapus</a>
          </p>
          <p class="avatar-note">Format JPG/PNG, maks. 2MB.</p>
        </div>
      </div>

      <!-- Baris data basic info -->
      <div class="profile-rows">
        <div class="profile-row">
          <span class="profile-row-label">Nama</span>
          <span class="profile-row-value">Rina Bakes</span>
          <span class="profile-row-cta">
            <i class="fa-solid fa-chevron-right"></i>
          </span>
        </div>

        <div class="profile-row">
          <span class="profile-row-label">Tanggal Lahir</span>
          <span class="profile-row-value">24 Desember 1998</span>
          <span class="profile-row-cta">
            <i class="fa-solid fa-chevron-right"></i>
          </span>
        </div>

        <div class="profile-row">
          <span class="profile-row-label">Jenis Kelamin</span>
          <span class="profile-row-value">Perempuan</span>
          <span class="profile-row-cta">
            <i class="fa-solid fa-chevron-right"></i>
          </span>
        </div>

        <div class="profile-row">
          <span class="profile-row-label">Email</span>
          <span class="profile-row-value">rina@example.com</span>
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
          <span class="profile-row-value">@rina_bakes</span>
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

    <!-- FORM EDIT (dipakai script lama, cuma styling baru) -->
    <form id="editProfilForm" class="form-box">
      <h3>Edit Profil</h3>
      <input type="text" placeholder="Nama Lengkap" value="Rina Bakes">
      <input type="text" placeholder="Username" value="@rina_bakes">
      <input type="email" placeholder="Email" value="rina@example.com">
      <input type="date" placeholder="Tanggal Lahir">
      <select>
        <option value="">Pilih jenis kelamin</option>
        <option>Perempuan</option>
        <option>Laki-laki</option>
        <option>Lainnya</option>
      </select>
      <textarea rows="3" placeholder="Bio">Pecinta kue cokelat dan buttercream pastel 💕</textarea>
      <input type="text" placeholder="Kue Favorit" value="Red Velvet">
      <button type="submit" class="btn-hero">Simpan Perubahan</button>
    </form>

  </div>
</div>


<!-- POSTINGAN SAYA (DASHBOARD) -->
<div class="tab-content" id="posting">
      <div>
        <h3 class="profile-title">Postingan Saya</h3>
        <p class="profile-subtitle">
          Semua resep dan cerita baking yang sudah kamu upload akan muncul di sini. Kalau kamu tambah postingan baru, card-nya akan otomatis bertambah.
          <br><br>
        </p>
      </div>

  <!-- Grid postingan saya (nanti di-loop dari database) -->
  <div class="community-grid" id="postingSayaList">

    <!-- Contoh card 1 -->
    <article class="community-card">
      <img src="image/browniespandan.jpg" alt="Brownies Pandan" class="community-img">
      <div class="community-body">
        <h5 class="community-title">Brownies Pandan Super Moist</h5>
        <p class="community-user">@rina_bakes • Brownies</p>
        <p class="community-caption">
          Cobain resep brownies pandan ini, teksturnya lembut dan super moist! 😍
        </p>
        <div class="community-meta">
          <span>❤️ 120 suka</span>
          <span>•</span>
          <span>2 jam lalu</span>
        </div>
        <button class="btn-hero community-btn">Lihat Postingan</button>
      </div>
    </article>

    <!-- Contoh card 2 -->
    <article class="community-card">
      <img src="image/tart.jpeg" alt="Tart Pastel" class="community-img">
      <div class="community-body">
        <h5 class="community-title">Tart Pastel Ulang Tahun</h5>
        <p class="community-user">@cindy_cake • Cake Tart</p>
        <p class="community-caption">
          Tart buttercream warna pastel untuk ulang tahun adikku 🎂💗
        </p>
        <div class="community-meta">
          <span>❤️ 89 suka</span>
          <span>•</span>
          <span>kemarin</span>
        </div>
        <button class="btn-hero community-btn">Lihat Postingan</button>
      </div>
    </article>

    <!-- Contoh card 3 -->
    <article class="community-card">
      <img src="image/reseplembut.jpg" alt="Roti Lembut" class="community-img">
      <div class="community-body">
        <h5 class="community-title">Roti Susu Super Lembut</h5>
        <p class="community-user">@andi_kitchen • Roti</p>
        <p class="community-caption">
          Sharing tips biar roti lembut tapi nggak bantet, cocok buat sarapan. 🥐
        </p>
        <div class="community-meta">
          <span>❤️ 53 suka</span>
          <span>•</span>
          <span>3 hari lalu</span>
        </div>
        <button class="btn-hero community-btn">Lihat Postingan</button>
      </div>
    </article>

    <!-- Contoh card 4 -->
    <article class="community-card">
      <img src="image/cupcake.jpeg" alt="Cupcake Pastel" class="community-img">
      <div class="community-body">
        <h5 class="community-title">Cupcake Vanilla Pastel</h5>
        <p class="community-user">@sweetcup • Cupcake</p>
        <p class="community-caption">
          Set cupcake pastel untuk gift box temen kantor, simple tapi cantik 💕
        </p>
        <div class="community-meta">
          <span>❤️ 34 suka</span>
          <span>•</span>
          <span>1 minggu lalu</span>
        </div>
        <button class="btn-hero community-btn">Lihat Postingan</button>
      </div>
    </article>

    <!-- NANTI: postingan baru tinggal ditambah/di-loop di sini -->
    <!-- Contoh loop PHP / backend -->
    <!--
    <?php foreach ($myPosts as $post): ?>
      <article class="community-card">
        <?php if (!empty($post['gambar'])): ?>
          <img src="<?= htmlspecialchars($post['gambar']) ?>"
               alt="<?= htmlspecialchars($post['judul']) ?>"
               class="community-img">
        <?php endif; ?>
        <div class="community-body">
          <h5 class="community-title">
            <?= htmlspecialchars($post['judul']) ?>
          </h5>
          <p class="community-user">
            @<?= htmlspecialchars($post['username']) ?> •
            <?= htmlspecialchars($post['kategori']) ?>
          </p>
          <p class="community-caption">
            <?= htmlspecialchars($post['caption']) ?>
          </p>
          <div class="community-meta">
            <span>❤️ <?= (int)$post['likes'] ?> suka</span>
            <span>•</span>
            <span><?= htmlspecialchars($post['waktu_relative']) ?></span>
          </div>
          <button class="btn-hero community-btn"
                  data-id="<?= (int)$post['id'] ?>">
            Lihat Postingan
          </button>
        </div>
      </article>
    <?php endforeach; ?>
    -->
  </div>

  <div style="text-align:center; margin-top:25px;">
    <button id="tambahPostBtn" class="btn-hero" style="max-width:260px;">
      Tambah Postingan Baru
    </button>
  </div>
</div>



        <!-- RESEP FAVORIT -->
        <div class="tab-content" id="favorit">
           <div>
        <h3 class="profile-title">Resep Favorit Saya</h3>
        <p class="profile-subtitle">
          Semua resep kamu simpan akan muncul di sini. 
        </p>
        <br>
      </div>
          <div class="menu-grid" style="grid-template-columns: repeat(auto-fit, minmax(250px, 1fr)); gap:40px;">
          </div>
        </div>

      </div>
    </div>
  </section>
  

    <!-- ================= MODAL UPLOAD POSTINGAN ================= -->
  <div id="uploadModal" class="auth-modal">
    <div class="auth-content">
      <span class="close-btn">&times;</span>
      <form id="uploadForm" class="form-box active">
        <h2>Tambah Postingan Baru</h2>
        <input type="text" placeholder="Judul Postingan" required>
        <textarea placeholder="Isi Postingan" rows="5" required></textarea>
        <input type="file" accept="image/*">
        <button type="submit" class="btn-hero">Upload</button>
      </form>
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


  <!-- Carousel -->
 <script>
    document.addEventListener("DOMContentLoaded", () => {
        let slideIndex = 0;
        const slides = document.querySelectorAll(".carousel-slide");
        const prevBtn = document.querySelector(".prev");
        const nextBtn = document.querySelector(".next");

        // Fungsi yang hanya bertugas mengaktifkan slide yang benar
        function showSlide(i) {
            slides.forEach(s => { 
                s.classList.remove("active"); 
            });
            slides[i].classList.add("active");
            
            // Atur ulang posisi slide agar hanya yang aktif yang menjadi 'relative'
            slides.forEach((s, index) => {
                if (index === i) {
                    s.style.position = 'relative';
                } else {
                    s.style.position = 'absolute';
                }
            });
        }

        function changeSlide(n) {
            slideIndex = (slideIndex + n + slides.length) % slides.length;
            showSlide(slideIndex);
        }

        // Tampilkan slide pertama saat inisialisasi
        if (slides.length > 0) {
            showSlide(slideIndex); 
            
            // Tambahkan event listener untuk tombol navigasi
            prevBtn.addEventListener("click", () => changeSlide(-1));
            nextBtn.addEventListener("click", () => changeSlide(1));

            // Auto-play (geser otomatis)
            setInterval(() => changeSlide(1), 5000); 
        }
    });
</script>

  <!-- Modal Auth -->
  <script>
   document.addEventListener("DOMContentLoaded", () => {
    const modal = document.getElementById("authModal");
    const loginForm = document.getElementById("loginForm");
    const registerForm = document.getElementById("registerForm");
    const closeBtn = document.querySelector(".close-btn");
    const userIcon = document.getElementById("userIcon");
    const loginSubmitBtn = document.getElementById("loginSubmitBtn"); 
    const dashboardSection = document.getElementById("dashboard");


    // --- SIMULASI STATUS LOGIN ---
    let isLoggedIn = false; // Status awal: belum login
    // ----------------------------

    // Fungsi untuk menampilkan modal atau navigasi
    function handleUserIconClick(e) {
        e.preventDefault();
        
        if (isLoggedIn) {
            // JIKA SUDAH LOGIN: Gulir ke Dashboard
            if (dashboardSection) {
                // Gunakan scrollIntoView untuk navigasi smooth
                dashboardSection.scrollIntoView({ behavior: 'smooth' });
                // Tambahkan class 'active' ke nav-link dashboard jika ada
                document.querySelectorAll(".nav-link").forEach(link => link.classList.remove("active"));
                document.querySelector('a[href="#dashboard"]') ? document.querySelector('a[href="#dashboard"]').classList.add("active") : null;
            }
        } else {
            // JIKA BELUM LOGIN: Tampilkan Modal Login
            modal.style.display = "flex";
            loginForm.classList.add("active");
            registerForm.classList.remove("active");
        }
    }

    // Pasang fungsi ke ikon profil
    userIcon.addEventListener("click", handleUserIconClick);

    // --- LOGIC LOGIN/SUBMIT SIMULASI ---
    if (loginSubmitBtn) {
        loginForm.addEventListener("submit", function(e) {
            e.preventDefault(); // Mencegah form refresh halaman
            
            // Lakukan validasi/kirim data (INI HANYA SIMULASI BERHASIL)
            
            // 1. Ubah status login
            isLoggedIn = true;
            
            // 2. Tutup Modal
            modal.style.display = "none";
            
            // 3. (Opsional) Langsung gulir ke dashboard
            // dashboardSection.scrollIntoView({ behavior: 'smooth' }); 
            
            alert("Login Berhasil! Ikon profil sekarang mengarah ke Dashboard.");
            
            // Di sini Anda bisa mengubah ikon profil menjadi ikon "logged-in" jika mau
        });
    }

    // LOGIC LAIN UNTUK MODAL
    closeBtn.addEventListener("click", () => modal.style.display = "none");
    window.addEventListener("click", e => { if (e.target === modal) modal.style.display = "none"; });

    // Switch antara Login dan Register
    const showRegister = document.getElementById("showRegister");
    const showLogin = document.getElementById("showLogin");

    if (showRegister) showRegister.addEventListener("click", e => {
        e.preventDefault();
        loginForm.classList.remove("active");
        registerForm.classList.add("active");
    });

    if (showLogin) showLogin.addEventListener("click", e => {
        e.preventDefault();
        registerForm.classList.remove("active");
        loginForm.classList.add("active");
    });
});

    //   if (!modal || !userIcon || !closeBtn) return;

    //   userIcon.addEventListener("click", e => {
    //     e.preventDefault();
    //     modal.style.display = "flex";
    //     loginForm.classList.add("active");
    //     registerForm.classList.remove("active");
    //   });

    //   closeBtn.addEventListener("click", () => modal.style.display = "none");
    //   window.addEventListener("click", e => { if (e.target === modal) modal.style.display = "none"; });

    //   if (showRegister) showRegister.addEventListener("click", e => {
    //     e.preventDefault();
    //     loginForm.classList.remove("active");
    //     registerForm.classList.add("active");
    //   });

    //   if (showLogin) showLogin.addEventListener("click", e => {
    //     e.preventDefault();
    //     registerForm.classList.remove("active");
    //     loginForm.classList.add("active");
    //   });
    // });
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

      tambahPostBtn.addEventListener("click", () => uploadModal.style.display = "flex");
      closeBtn.addEventListener("click", () => uploadModal.style.display = "none");
      window.addEventListener("click", e => { if (e.target === uploadModal) uploadModal.style.display = "none"; });

      // Dummy edit & delete alert
      document.querySelectorAll(".editBtn").forEach(btn => btn.addEventListener("click", () => alert("Fungsi edit nanti akan terhubung ke backend.")));
      document.querySelectorAll(".deleteBtn").forEach(btn => btn.addEventListener("click", () => alert("Fungsi delete nanti akan terhubung ke backend.")));
    });
  </script>




</body>
</html>
