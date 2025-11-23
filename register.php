<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Ceria Bakery | Daftar Akun</title>
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Caprasimo&family=Lobster&family=Poppins:wght@400;500;600;700&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css">

  
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

     
      <div class="auth-illustration">
        <div>
          <div class="mini-badge">
            <i class="fa-solid fa-cookie-bite"></i>
            Daftar Akun Baru
          </div>
          <h2>Yuk Gabung Komunitas</h2>
          <p>
            Dengan akun Ceria Bakery, kamu bisa menyimpan resep favorit, berbagi tips baking,
            dan terhubung dengan pecinta kue lainnya.
          </p>
          <ul>
            <li>Simpan resep dan toko favorit</li>
            <li>Bergabung di komunitas pecinta kue</li>
            <li>Dapat info event & promo menarik</li>
          </ul>
        </div>

        <div>
          <p style="font-size:0.8rem; margin-bottom:5px;">Sudah punya akun?</p>
          <strong style="font-size:0.9rem;">
            <a href="login.php" style="color:#fffdf5; text-decoration:underline;">
              Login di sini
            </a>
          </strong>
        </div>
      </div>

      
      <div class="auth-form-panel">
        <div class="auth-logo">
          <img src="image/ceria.png" alt="Ceria Bakery Logo">
          <span>Ceria Bakery</span>
        </div>

        <h3 class="auth-title">Daftar Akun Ceria Bakery</h3>
        <p class="auth-subtitle">
          Isi data singkat di bawah ini untuk mulai gabung ke komunitas Ceria Bakery.
        </p>

        <form id="registerForm" class="auth-form" method="post" action="proses_register.php">
          <div class="mb-3 form-floating">
            <input type="text" class="form-control" id="regNama" name="nama" placeholder="Nama Lengkap" required>
            <label for="regNama">Nama Lengkap</label>
          </div>

          <div class="mb-3 form-floating">
            <input type="text" class="form-control" id="regUsername" name="username" placeholder="Username" required>
            <label for="regUsername">Username</label>
          </div>

          <div class="mb-3 form-floating">
            <input type="email" class="form-control" id="regEmail" name="email" placeholder="Email" required>
            <label for="regEmail">Email</label>
          </div>

          <div class="mb-1 position-relative form-floating">
            <input type="password" class="form-control" id="regPassword" name="password" placeholder="Password" required>
            <label for="regPassword">Password</label>
            <span class="password-toggle" data-target="#regPassword">
              <i class="fa-regular fa-eye"></i>
            </span>
          </div>

                <div class="mb-3 position-relative form-floating">
        <input type="password" class="form-control" id="regConfirmPassword" name="confirm_password" placeholder="Konfirmasi Password" required>
        <label for="regConfirmPassword">Konfirmasi Password</label>
        <span class="password-toggle" data-target="#regConfirmPassword">
            <i class="fa-regular fa-eye"></i>
        </span>
        </div>

          <div class="mb-3 form-floating">
            <textarea class="form-control" id="regAlasan" name="alasan" style="height:90px;" placeholder="Ceritakan sedikit tentang hobi baking-mu"></textarea>
            <label for="regAlasan">Kenapa tertarik join komunitas?</label>
          </div>

          <button type="submit" class="btn-hero">Daftar Sekarang</button>

          <p class="small-note">
            Dengan mendaftar, kamu setuju untuk mengikuti aturan komunitas Ceria Bakery dan menjaga suasana tetap hangat & positif. 💛
          </p>
        </form>

        <div class="back-home">
          <span>Sudah punya akun? <a href="login.php">Login sekarang</a></span><br>
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

      document.addEventListener("DOMContentLoaded", () => {
 
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

  
  const registerForm = document.getElementById("registerForm");
  const passInput = document.getElementById("regPassword");
  const confirmInput = document.getElementById("regConfirmPassword");

  if (registerForm && passInput && confirmInput) {
    registerForm.addEventListener("submit", function(e) {
      if (passInput.value !== confirmInput.value) {
        e.preventDefault(); 
        alert("Password dan konfirmasi password tidak sama. Silakan cek lagi.");
        confirmInput.focus();
      }
    });
  }
});


    });
  </script>
</body>
</html>
