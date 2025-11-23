<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

$success = $_SESSION['flash_success'] ?? null;
unset($_SESSION['flash_success']);
?>

<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Ceria Bakery | Login</title>

  <!-- FONT & ICONS -->
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Caprasimo&family=Lobster&family=Poppins:wght@400;500;600;700&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">

  <!-- BOOTSTRAP -->
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css">

  <!-- STYLE GLOBAL (boleh hapus kalau sudah ada di stylebaru.css) -->
  <style>
    body {
      min-height: 100vh;
      margin: 0;
      padding: 0;
      font-family: "Poppins", sans-serif;
      background: linear-gradient(135deg, #ffeaa7, #fab1a0);
      display: flex;
      flex-direction: column;
    }
    .auth-wrapper {
      flex: 1;
      display: flex;
      align-items: center;
      justify-content: center;
      padding: 40px 15px;
    }
    .auth-card {
      background: #fffdf5;
      border-radius: 24px;
      box-shadow: 0 15px 30px rgba(0,0,0,0.08);
      max-width: 950px;
      width: 100%;
      display: grid;
      grid-template-columns: minmax(0, 1.1fr) minmax(0, 0.9fr);
      overflow: hidden;
    }
    @media (max-width: 900px) {
      .auth-card {
        grid-template-columns: 1fr;
      }
      .auth-illustration {
        display: none;
      }
    }
    .auth-illustration {
      background: #fff9b4 url("image/bgMenu.png") no-repeat center/cover;
      padding: 40px 30px;
      display: flex;
      flex-direction: column;
      justify-content: space-between;
      color: #8e1913;
    }
    .auth-illustration h2 {
      font-family: "Lobster", cursive;
      font-size: 2rem;
      margin-bottom: 10px;
    }
    .auth-illustration p {
      font-size: 0.95rem;
    }
    .auth-illustration ul {
      padding-left: 18px;
      font-size: 0.9rem;
      margin-top: 10px;
    }
    .auth-illustration .mini-badge {
      display: inline-flex;
      align-items: center;
      gap: 6px;
      background: #8e1913;
      color: #fffdf5;
      padding: 6px 12px;
      border-radius: 999px;
      font-size: 0.75rem;
      margin-bottom: 15px;
    }
    .auth-illustration .mini-badge i {
      font-size: 0.8rem;
    }
    .auth-form-panel {
      padding: 35px 30px;
    }
    .auth-logo {
      display: flex;
      align-items: center;
      justify-content: center;
      margin-bottom: 15px;
      gap: 10px;
    }
    .auth-logo img {
      height: 40px;
    }
    .auth-logo span {
      font-family: "Lobster", cursive;
      font-size: 1.5rem;
      color: #8e1913;
    }
    .auth-title {
      text-align: center;
      margin-bottom: 3px;
      font-size: 1.1rem;
      font-weight: 600;
      color: #8e1913;
    }
    .auth-subtitle {
      text-align: center;
      font-size: 0.85rem;
      margin-bottom: 20px;
      color: #7f8c8d;
    }
    .form-floating > label {
      font-size: 0.85rem;
    }
    .auth-form .form-control {
      border-radius: 12px;
      border: 1px solid #f1c40f;
      font-size: 0.9rem;
    }
    .auth-form .form-control:focus {
      border-color: #8e1913;
      box-shadow: 0 0 0 0.15rem rgba(142,25,19,0.2);
    }
    .auth-extra {
      display: flex;
      justify-content: space-between;
      align-items: center;
      font-size: 0.85rem;
      margin-top: 5px;
      margin-bottom: 15px;
    }
    .auth-extra a {
      color: #8e1913;
      text-decoration: none;
      font-weight: 500;
    }
    .auth-extra a:hover {
      text-decoration: underline;
    }
    .btn-hero {
      display: inline-block;
      border-radius: 999px;
      border: none;
      padding: 10px 22px;
      font-size: 0.9rem;
      font-weight: 600;
      cursor: pointer;
      background: linear-gradient(135deg, #ff7675, #d63031);
      color: #fffdf5;
      box-shadow: 0 10px 20px rgba(0,0,0,0.15);
      transition: transform 0.15s ease, box-shadow 0.15s ease, filter 0.15s ease;
      text-decoration: none;
      text-align: center;
      width: 100%;
    }
    .btn-hero:hover {
      transform: translateY(-1px);
      filter: brightness(1.05);
      box-shadow: 0 14px 24px rgba(0,0,0,0.18);
    }
    .btn-hero:active {
      transform: translateY(0);
      box-shadow: 0 8px 16px rgba(0,0,0,0.15);
    }
    .password-toggle {
      position: absolute;
      right: 14px;
      top: 50%;
      transform: translateY(-50%);
      cursor: pointer;
      color: #bdc3c7;
      font-size: 0.9rem;
    }
    .small-note {
      font-size: 0.75rem;
      color: #95a5a6;
      margin-top: 6px;
    }
    .back-home {
      text-align: center;
      margin-top: 15px;
      font-size: 0.85rem;
    }
    .back-home a {
      color: #8e1913;
      text-decoration: none;
      font-weight: 600;
    }
    .back-home a:hover {
      text-decoration: underline;
    }
    footer {
      text-align: center;
      font-size: 0.8rem;
      padding: 10px 0 15px;
      color: #7f8c8d;
      background: transparent;
    }
  </style>
</head>
<body>

  <div class="auth-wrapper">
    <div class="auth-card">

      <!-- PANEL KIRI: ILUSTRASI -->
      <div class="auth-illustration">
        <div>
          <div class="mini-badge">
            <i class="fa-solid fa-cookie-bite"></i>
            Kembali lagi? Yuk login!
          </div>
          <h2>Selamat Datang Kembali</h2>
          <p>
            Login untuk melanjutkan jelajah resep, simpan favorit, dan lihat update terbaru dari komunitas Ceria Bakery.
          </p>
          <ul>
            <li>Akses dashboard pribadi</li>
            <li>Lihat resep dan toko favorit</li>
            <li>Ikut diskusi pecinta kue</li>
          </ul>
        </div>

        <div>
          <p style="font-size:0.8rem; margin-bottom:5px;">Belum punya akun?</p>
          <strong style="font-size:0.9rem;">
            <a href="register.php" style="color:#fffdf5; text-decoration:underline;">
              Daftar dulu di sini
            </a>
          </strong>
        </div>
      </div>

      <!-- PANEL KANAN: FORM LOGIN -->
      <div class="auth-form-panel">
        <div class="auth-logo">
          <img src="image/ceria.png" alt="Ceria Bakery Logo">
          <span>Ceria Bakery</span>
        </div>


        <h3 class="auth-title">Login Akun Ceria Bakery</h3>
        <p class="auth-subtitle">
          Masukkan username atau email dan password untuk masuk.
        </p>

<?php if (!empty($success)): ?>
  <div class="alert alert-success" role="alert" style="font-size:0.85rem; padding:8px 12px; margin-bottom:15px;">
    <?= htmlspecialchars($success); ?>
  </div>
<?php endif; ?>

        <form id="loginForm" class="auth-form" method="post" action="proses_login.php">
          <div class="mb-3 form-floating">
            <input type="text" class="form-control" id="loginUsername" name="username" placeholder="Username atau Email" required>
            <label for="loginUsername">Username atau Email</label>
          </div>

          <div class="mb-1 position-relative form-floating">
            <input type="password" class="form-control" id="loginPassword" name="password" placeholder="Password" required>
            <label for="loginPassword">Password</label>
            <span class="password-toggle" data-target="#loginPassword">
              <i class="fa-regular fa-eye"></i>
            </span>
          </div>

          <div class="auth-extra">
            <div class="form-check">
              <input class="form-check-input" type="checkbox" value="1" id="rememberMe">
              <label class="form-check-label" for="rememberMe">
                Ingat akun
              </label>
            </div>
            <!-- Optional: lupa password -->
            <a href="#">Lupa password?</a>
          </div>

          <button type="submit" class="btn-hero">Login</button>

          <p class="small-note">
            *Opsi "Ingat akun" akan menyimpan username/email di perangkat ini untuk memudahkan login berikutnya.
          </p>
        </form>

        <div class="back-home">
          <span>Belum punya akun? <a href="register.php">Daftar sekarang</a></span><br>
        </div>

      </div>
    </div>
  </div>

  <footer>
    © 2025 Ceria Bakery. Semua Hak Dilindungi.
  </footer>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>

  <script>
    document.addEventListener("DOMContentLoaded", () => {
      // Toggle show/hide password
      document.querySelectorAll(".password-toggle").forEach(toggle => {
        toggle.addEventListener("click", () => {
          const targetSelector = toggle.getAttribute("data-target");
          const input = document.querySelector(targetSelector);
          if (!input) return;

          if (input.type === "password") {
            input.type = "text";
            toggle.innerHTML = '<i class="fa-regular fa-eye-slash"></i>';
          } else {
            input.type = "password";
            toggle.innerHTML = '<i class="fa-regular fa-eye"></i>';
          }
        });
      });

      // ====== Fitur "Ingat Akun" pakai localStorage ======
      const rememberCheckbox = document.getElementById("rememberMe");
      const loginUsername = document.getElementById("loginUsername");
      const loginForm = document.getElementById("loginForm");

      // Saat halaman dibuka, cek apakah ada username yang di-remember
      const rememberedData = localStorage.getItem("ceriaRemember");
      if (rememberedData) {
        try {
          const data = JSON.parse(rememberedData);
          if (data && data.username) {
            loginUsername.value = data.username;
            if (rememberCheckbox) rememberCheckbox.checked = true;
          }
        } catch (e) {
          console.warn("Gagal parse ceriaRemember dari localStorage");
        }
      }

      // Saat login dikirim, simpan / hapus remember
      if (loginForm) {
        loginForm.addEventListener("submit", () => {
          if (!loginUsername) return;
          if (rememberCheckbox && rememberCheckbox.checked) {
            const data = { username: loginUsername.value };
            localStorage.setItem("ceriaRemember", JSON.stringify(data));
          } else {
            localStorage.removeItem("ceriaRemember");
          }
          // Biarkan form lanjut ke backend (proses_login.php)
        });
      }
    });
  </script>
</body>
</html>
