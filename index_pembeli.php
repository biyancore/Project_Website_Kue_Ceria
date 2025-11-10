<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Ceria Bakery | Opening Page</title>

  <!-- Bootstrap & Icons -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" rel="stylesheet">

  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css2?family=Lobster&display=swap" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css2?family=Caprasimo&display=swap" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@100..900&display=swap" rel="stylesheet">

  <!-- Custom CSS -->
  <link rel="stylesheet" href="stylelama.css">
</head>

<body>
  <!-- NAVBAR -->
  <nav class="navbar navbar-expand-lg">
    <div class="logo">
      <img class="logo" src="Ceria.png" alt="Logo Ceria Bakery">
    </div>

    <div class="hamburger-menu">
      <i class="bi bi-list"></i>
    </div>

    <div class="navbar-container">
      <ul class="nav nav-underline">
        <li class="nav-item"><a class="nav-link poppins-semibold active" href="#">Home</a></li>
        <li class="nav-item"><a class="nav-link poppins-semibold" href="#menu">Menu</a></li>
        <li class="nav-item"><a class="nav-link poppins-semibold" href="#about">About</a></li>
        <li class="nav-item"><a class="nav-link poppins-semibold" href="#">Contact</a></li>
      </ul>

      <div class="nav-icons">
        <a href="#"><i class="bi bi-search"></i></a>
        <a href="#"><i class="bi bi-person"></i></a>
        <a href="#"><i class="bi bi-cart"></i></a>
      </div>
    </div>
  </nav>

  <!-- HERO SECTION START -->
<section id="hero">
  <div class="container-utama">
    <!-- KIRI: TEKS + BUTTON -->
    <div class="hero-content card-body">
      <h1>Selamat Datang di <span class="ceria-gradient">Ceria Bakery</span></h1>
      <p class="poppins-bold">
        Ceria Bakery adalah toko roti berkualitas premium yang menyajikan roti, kue, dan aneka pudding yang lezat dan bergizi. 
        Ceria Bakery berdiri sejak tahun 2016 dan terus berkembang memajukan kualitas roti kami.
        <br><br>
        Nikmati aroma roti hangat yang baru keluar dari oven setiap hari. 
        Dibuat dengan cinta dan bahan terbaik untuk senyum manismu! 🍞💛
      </p>
      <button class="btn-hero">Pesan Sekarang!</button>
    </div>

    <!-- KANAN: GAMBAR -->
    <div class="hero-image">
      <img src="element1.png" alt="Kue Ceria Bakery">
    </div>
  </div>
</section>
<!-- HERO SECTION END -->


  <!-- ABOUT SECTION START -->
   <section id="about" class="about">

   <div class="container-about">
    <div class="card-body about-title">
  <h2><span>About</span> Us</h2>
</div>

    

    <div class="row">
      <div class="about-img">
        <img src="bgbakery.jpg" alt="toko kue ceria bakery">
      </div>
      <div class="content">
        <h3>Kenapa memilih Ceria Bakery?</h3>
        <p>Di Ceria Bakery, setiap kue dibuat dengan cinta dan senyum. Kami menggunakan bahan terbaik, rasa yang selalu fresh, dan tampilan cantik untuk membuat harimu lebih manis. Karena bagi kami, kebahagiaanmu dimulai dari sepotong kue yang sempurna! 🍰</p>
      </div>
    </div>
   </div>


   </section>
  <!-- ABOUT SECTION END -->

  <!-- MENU SECTION START -->

  <h2 class="featured-title">✨ Featured Desserts of the Week ✨</h2>

  <section class="menu-section">
    <div class="row g-4">
      <!-- 1 -->
      <div class="col-md-3 col-sm-6">
        <div class="card menu-card">
          <img src="https://via.placeholder.com/300x180?text=Roti+Sobek+Cokelat+Lumer" alt="Roti Sobek Cokelat Lumer">
          <div class="card-body">
            <h5>Roti Sobek Cokelat Lumer</h5>
            <p>Roti lembut isi cokelat premium yang meleleh di setiap gigitan.</p>
            <div class="d-flex justify-content-between align-items-center">
              <span class="price">Rp10.000</span>
              <button class="btn">➜</button>
            </div>
          </div>
        </div>
      </div>

      <!-- 2 -->
      <div class="col-md-3 col-sm-6">
        <div class="card menu-card">
          <img src="https://via.placeholder.com/300x180?text=Roti+Keju+Susu" alt="Roti Keju Susu">
          <div class="card-body">
            <h5>Roti Keju Susu</h5>
            <p>Kombinasi gurih keju dan manis susu menciptakan rasa creamy yang pas.</p>
            <div class="d-flex justify-content-between align-items-center">
              <span class="price">Rp12.000</span>
              <button class="btn">➜</button>
            </div>
          </div>
        </div>
      </div>

      <!-- 3 -->
      <div class="col-md-3 col-sm-6">
        <div class="card menu-card">
          <img src="https://via.placeholder.com/300x180?text=Roti+Sosis+Mozarella" alt="Roti Sosis Mozarella">
          <div class="card-body">
            <h5>Roti Sosis Mozarella</h5>
            <p>Roti panggang empuk dengan sosis ayam dan lelehan keju mozarella.</p>
            <div class="d-flex justify-content-between align-items-center">
              <span class="price">Rp15.000</span>
              <button class="btn">➜</button>
            </div>
          </div>
        </div>
      </div>

      <!-- 4 -->
      <div class="col-md-3 col-sm-6">
        <div class="card menu-card">
          <img src="https://via.placeholder.com/300x180?text=Brownies+Fudgy" alt="Brownies Fudgy">
          <div class="card-body">
            <h5>Brownies Cokelat Fudgy</h5>
            <p>Teksturnya padat dan lembut, dengan aroma cokelat yang kuat dan legit.</p>
            <div class="d-flex justify-content-between align-items-center">
              <span class="price">Rp18.000</span>
              <button class="btn">➜</button>
            </div>
          </div>
        </div>
      </div>

      <!-- 5 -->
      <div class="col-md-3 col-sm-6">
        <div class="card menu-card">
          <img src="https://via.placeholder.com/300x180?text=Cheesecake+Stroberi" alt="Cheesecake Stroberi">
          <div class="card-body">
            <h5>Cheesecake Stroberi</h5>
            <p>Lapisan keju lembut berpadu dengan saus stroberi segar yang manis-asam.</p>
            <div class="d-flex justify-content-between align-items-center">
              <span class="price">Rp22.000</span>
              <button class="btn">➜</button>
            </div>
          </div>
        </div>
      </div>

      <!-- 6 -->
      <div class="col-md-3 col-sm-6">
        <div class="card menu-card">
          <img src="https://via.placeholder.com/300x180?text=Tiramisu+Cup" alt="Tiramisu Cup">
          <div class="card-body">
            <h5>Tiramisu Cup</h5>
            <p>Kue kopi klasik Italia dengan krim mascarpone dan taburan kakao.</p>
            <div class="d-flex justify-content-between align-items-center">
              <span class="price">Rp20.000</span>
              <button class="btn">➜</button>
            </div>
          </div>
        </div>
      </div>

      <!-- 7 -->
      <div class="col-md-3 col-sm-6">
        <div class="card menu-card">
          <img src="https://via.placeholder.com/300x180?text=Puding+Cokelat+Vla+Vanila" alt="Puding Cokelat Vla Vanila">
          <div class="card-body">
            <h5>Puding Cokelat Vla Vanila</h5>
            <p>Puding cokelat lembut disiram vla vanila yang manis dan wangi.</p>
            <div class="d-flex justify-content-between align-items-center">
              <span class="price">Rp8.000</span>
              <button class="btn">➜</button>
            </div>
          </div>
        </div>
      </div>

      <!-- 8 -->
      <div class="col-md-3 col-sm-6">
        <div class="card menu-card">
          <img src="https://via.placeholder.com/300x180?text=Puding+Lumut+Pandan" alt="Puding Lumut Pandan">
          <div class="card-body">
            <h5>Puding Lumut Pandan</h5>
            <p>Puding hijau alami dengan aroma pandan dan sensasi kenyal lembut.</p>
            <div class="d-flex justify-content-between align-items-center">
              <span class="price">Rp7.000</span>
              <button class="btn">➜</button>
            </div>
          </div>
        </div>
      </div>

    </div>
      </section>

  <!-- MENU SECTION END -->

  <!-- FOOTER -->
  <footer>
    <p class="poppins-medium">© 2025 Ceria Bakery | Made with love 🧁</p>
    <div class="social-icons">
      <a href="#"><i class="bi bi-instagram"></i></a>
      <a href="#"><i class="bi bi-facebook"></i></a>
      <a href="#"><i class="bi bi-twitter-x"></i></a>
    </div>
  </footer>

  <!-- Scripts -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
  <script>
    const hamburger = document.querySelector('.hamburger-menu');
    const navMenu = document.querySelector('.nav');

    hamburger.addEventListener('click', () => {
      navMenu.classList.toggle('active');
    });
  </script>
</body>
</html>
