<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Ceria Bakery | Komunitas Pecinta Kue</title>

  <!-- CSS -->
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Caprasimo&family=Lobster&family=Poppins:wght@400;500;600;700&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css">
<link rel="stylesheet" href="stylebaru.css"> <!-- HARUS SETELAH Bootstrap -->
<script src="https://kit.fontawesome.com/5b43f676d3.js" crossorigin="anonymous"></script>
</head>

<body>

  <!-- ================= NAVBAR ================= -->
<nav class="navbar">
  <div class="navbar-left">
    <img src="ceria.png" alt="Logo Ceria Bakery" class="logo">
  </div>

  <ul class="nav-menu">
    <li><a href="#hero" class="nav-link active"><i class="fa-solid fa-house"></i> Home</a></li>
    <li><a href="#artikel" class="nav-link"><i class="fa-solid fa-newspaper"></i> Artikel</a></li>
    <li><a href="#resep" class="nav-link"><i class="fa-solid fa-cookie-bite"></i> Resep</a></li>
    <li><a href="#komunitas" class="nav-link"><i class="fa-solid fa-users"></i> Komunitas</a></li>
    <li><a href="#toko" class="nav-link"><i class="fa-solid fa-bag-shopping"></i> Shop</a></li>
  </ul>

  <div class="nav-icons">
    <a href="#" id="userIcon" title="Akun Saya"><i class="fa-solid fa-user-circle"></i></a>
  </div>
</nav>


  <!-- ================= HERO SECTION ================= -->
  <section id="hero">
    <div class="container-utama">
      <div class="hero-content">
        <h1>Selamat Datang di <span class="ceria-gradient">Ceria Bakery</span></h1>
        <p>
          Yuk jelajahi dunia kue bersama kami! Temukan berbagai artikel menarik, resep kue lezat,
          dan bergabung dengan komunitas pecinta kue yang penuh semangat.
        </p>
        <a href="#berita" class="btn-hero">Jelajahi Sekarang</a>
      </div>
      <div class="hero-image">
        <img src="element1.png" alt="Kue Ceria">
      </div>
    </div>
  </section>

  <!-- ================= BERITA TERKINI ================= -->
<section id="berita" class="carousel-section">
  <div class="featured-title">
    <h2>Berita Terkini Dunia Kue</h2>
  </div>

  <div class="carousel-container">

    <!-- SLIDE 1 -->
    <div class="carousel-slide active">
      <div class="carousel-media">
        <img src="festivalkue.jpeg" alt="Berita 1">
      </div>
      <div class="carousel-caption">
        <h3>Festival Kue Nusantara 2025 Resmi Dibuka!</h3>
        <p>Berbagai jenis kue tradisional dari seluruh Indonesia dipamerkan di Jakarta Culinary Expo.</p>
        <a href="beritaTerkini/berita-festival.php" class="btn-hero">Baca Selengkapnya</a>
      </div>
    </div>

    <!-- SLIDE 2 -->
    <div class="carousel-slide">
      <div class="carousel-media">
        <img src="dessertasia.jpeg" alt="Berita 2">
      </div>
      <div class="carousel-caption">
        <h3>Chef Lokal Menangkan Kompetisi Dessert Asia</h3>
        <p>Kreasi kue klepon modern berhasil membawa Chef Ayu meraih juara pertama di Bangkok.</p>
        <a href="beritaTerkini/berita-chef.php" class="btn-hero">Baca Selengkapnya</a>
      </div>
    </div>

    <!-- SLIDE 3 -->
    <div class="carousel-slide">
      <div class="carousel-media">
        <img src="pastelcake.jpeg" alt="Berita 3">
      </div>
      <div class="carousel-caption">
        <h3>Tren Warna Pastel Dominasi Dekorasi Kue 2025</h3>
        <p>Warna-warna lembut seperti peach dan mint jadi favorit para baker muda.</p>
        <a href="beritaTerkini/berita-tren-pastel.php" class="btn-hero">Baca Selengkapnya</a>
      </div>
    </div>

    <!-- TOMBOL -->
    <button class="carousel-btn prev">&#10094;</button>
    <button class="carousel-btn next">&#10095;</button>
  </div>
</section>


  <!-- ================= ARTIKEL ================= -->
  <section id="artikel" 
  style="position: relative;
  width: 100%;
  margin-top: -10px;
  padding-top: 100px;
  padding-bottom: 150px; 
  background: #fff9b4 url('bgArtikel.png') no-repeat center top / 100% auto;
  overflow: visible;">
  <div class="menu-section artikel-section">
    <div class="featured-title"><h2>Artikel Kuliner Terbaru</h2></div>
    <div class="menu-grid" style="display:grid; grid-template-columns:repeat(auto-fit, minmax(250px,1fr)); gap:20px;">
      <div class="menu-card">
        <img src="nastar.jpeg" alt="Artikel 1">
        <div class="card-body">
          <h5>Sejarah Kue Nastar yang Legendaris</h5>
          <p>Kue kecil berisi nanas ini punya cerita panjang dari masa kolonial hingga jadi favorit Lebaran.</p>
          <a href="artikel/artikel-nastar.php" class="btn-hero">Baca Selengkapnya</a>
        </div>
      </div>
      <div class="menu-card">
        <img src="softcake.jpeg" alt="Artikel 2">
        <div class="card-body">
          <h5>Rahasia Tekstur Kue Lembut dan Mengembang</h5>
          <p>Simak tips penting agar adonanmu selalu mengembang sempurna dan hasilnya lembut menggoda!</p>
          <a href="artikel/artikel-softcake.php" class="btn-hero">Baca Selengkapnya</a>
        </div>
      </div>
      <div class="menu-card">
        <img src="cupcake.jpeg" alt="Artikel 3">
        <div class="card-body">
          <h5>Inspirasi Dekorasi Cupcake untuk Pemula</h5>
          <p>Buat cupcake-mu jadi karya seni kecil yang lucu dan cantik dengan bahan sederhana.</p>
          <a href="artikel/artikel-cupcake.php" class="btn-hero">Baca Selengkapnya</a>
        </div>
      </div>
    </div>
  </div>
  </section>

  <!-- ================= RESEP ================= -->
  <section id="resep" 
  style="position: relative;
  width: 100%;
  margin-top: -10px;
  padding-top: 100px;
  padding-bottom: 150px; 
  background: #fff9b4 url('bgResep.png') no-repeat center top / 100% auto;
  overflow: visible;">
  <div class="menu-section resep-section">
    <div class="featured-title"><h2>Resep Kue Populer</h2></div>
    <div class="menu-grid" style="display:grid; grid-template-columns:repeat(auto-fit,minmax(250px,1fr)); gap:20px;">
      <div class="menu-card">
        <img src="coklatlumer.jpg" alt="Resep 1">
        <div class="card-body">
          <h5>Kue Cokelat Lumer</h5>
          <p>Kue lembut isi cokelat premium yang meleleh di setiap gigitan.</p>
          <p class="price">⏱️ 30 menit</p>
          <a href="#" class="btn-hero">Lihat Resep</a>
          <i class="fa-solid fa-heart favorite-icon" data-resep-id="resep1" data-title="Kue Cokelat Lumer" style="float:right; cursor:pointer;"></i>
        </div>
      </div>
      <div class="menu-card">
        <img src="bolupandan.jpg" alt="Resep 2">
        <div class="card-body">
          <h5>Bolu Pandan Santan</h5>
          <p>Aroma pandan dan gurihnya santan berpadu sempurna dalam bolu klasik ini.</p>
          <p class="price">⏱️ 45 menit</p>
          <a href="#" class="btn-hero">Lihat Resep</a>
          <i class="fa-solid fa-heart favorite-icon" data-resep-id="resep1" data-title="Kue Cokelat Lumer" style="float:right; cursor:pointer;"></i>
        </div>
      </div>
      <div class="menu-card">
        <img src="cheesecakepanggang.jpeg" alt="Resep 3">
        <div class="card-body">
          <h5>Cheesecake Panggang</h5>
          <p>Tekstur creamy dan rasa manis gurih yang pas bikin cheesecake ini favorit semua orang.</p>
          <p class="price">⏱️ 1 jam</p>
          <a href="#" class="btn-hero">Lihat Resep</a>
          <i class="fa-solid fa-heart favorite-icon" data-resep-id="resep1" data-title="Kue Cokelat Lumer" style="float:right; cursor:pointer;"></i>
        </div>
      </div>
    </div>
  </div>
  </section>

  <!-- ================= KOMUNITAS ================= -->
  <section id="komunitas" 
  style="position: relative;
  width: 100%;
  margin-top: -130px;
  padding-top: 100px;
  padding-bottom: 200px; 
  background: #fff9b4 url('bgMenu.png') no-repeat center top / 100% auto;
  overflow: visible;">
  <div class="menu-section komunitas-section">
 <div class="featured-title"><h2>Komunitas Pecinta Kue</h2></div>
    <div class="menu-grid" style="display:grid; grid-template-columns:repeat(auto-fit,minmax(250px,1fr)); gap:20px;">
      <div class="menu-card">
        <img src="browniespandan.jpg" alt="User 1">
        <div class="card-body">
          <h5>@rina_bakes</h5>
          <p>"Cobain resep brownies ini, super moist! 😍"</p>
        </div>
      </div>
      <div class="menu-card">
        <img src="tart.jpeg" alt="User 2">
        <div class="card-body">
          <h5>@cindy_cake</h5>
          <p>"Aku suka banget bikin tart dengan buttercream warna pastel 💕"</p>
        </div>
      </div>
      <div class="menu-card">
        <img src="reseplembut.jpg" alt="User 3">
        <div class="card-body">
          <h5>@andi_kitchen</h5>
          <p>"Sharing tips biar roti lembut tapi gak bantet, yuk!"</p>
        </div>
      </div>
    </div>
    <div style="text-align:center; margin-top:30px;">
      <a href="#" class="btn-hero">Lihat Semua Postingan</a>
    </div>
  </div> 
  </section>

  <!-- ================= LOGIN / REGISTER MODAL ================= -->
  <div id="authModal" class="auth-modal">
    <div class="auth-content">
      <span class="close-btn">&times;</span>

      <!-- LOGIN FORM -->
      <form id="loginForm" class="form-box active">
        <h2>Login Akun</h2>
        <input type="text" placeholder="Username" required>
        <input type="password" placeholder="Password" required>
        <button type="submit" class="btn-hero" id="loginSubmitBtn">Masuk</button>
        <p class="switch-form">Belum punya akun? <a href="#" id="showRegister">Daftar di sini</a></p>
      </form>

      <!-- REGISTER FORM -->
      <form id="registerForm" class="form-box">
        <h2>Daftar Komunitas</h2>
        <input type="text" placeholder="Nama Lengkap" required>
        <input type="text" placeholder="Username" required>
        <input type="password" placeholder="Password" required>
        <input type="email" placeholder="Email" required>
        <textarea placeholder="Alasan join club" rows="2"></textarea>
        <select>
          <option value="">Tau komunitas ini dari mana?</option>
          <option>Dari teman</option>
          <option>Media sosial</option>
          <option>Website Ceria Bakery</option>
          <option>Lainnya</option>
        </select>
        <button type="submit" class="btn-hero">Daftar Sekarang</button>
        <p class="switch-form">Sudah punya akun? <a href="#" id="showLogin">Login</a></p>
      </form>
    </div>
  </div>

  <!-- ================= DASHBOARD MEMBER ================= -->
  <section id="dashboard" class="dashboard-section">
    <div class="featured-title"><h2>Dashboard Member</h2></div>
    <div class="dashboard-container">

      <!-- Tabs -->
      <div class="dashboard-tabs">
        <button class="tab-btn active" data-tab="profil">Profil Saya</button>
        <button class="tab-btn" data-tab="posting">Postingan Saya</button>
        <button class="tab-btn" data-tab="favorit">Resep Favorit</button>
      </div>

      <div class="dashboard-content">
        <!-- PROFIL -->
        <div class="tab-content active" id="profil">
          <div class="profil-card">
            <img src="mitsuri.jpg" alt="Foto Profil" class="profil-img">
            <h3 class="profil-nama">Rina Bakes</h3>
            <p class="profil-username">@rina_bakes</p>
            <p class="profil-email">rina@example.com</p>
            <p class="profil-bio">Pecinta kue cokelat dan buttercream pastel 💕</p>
            <p class="profil-fav">🍪 Kue Favorit: Red Velvet</p>
            <button class="btn-hero edit-btn" id="editProfilBtn">Edit Profil</button>
          </div>

          <form id="editProfilForm" class="form-box" style="display:none;">
            <h3>Edit Profil</h3>
            <input type="text" placeholder="Nama Lengkap" value="Rina Bakes">
            <input type="text" placeholder="Username" value="@rina_bakes">
            <input type="email" placeholder="Email" value="rina@example.com">
            <textarea rows="3" placeholder="Bio">Pecinta kue cokelat dan buttercream pastel 💕</textarea>
            <input type="text" placeholder="Kue Favorit" value="Red Velvet">
            <button type="submit" class="btn-hero">Simpan Perubahan</button>
          </form>
        </div>

        <!-- POSTINGAN -->
        <div class="tab-content" id="posting">
          <h3>Postingan Saya</h3>
          <div class="menu-grid" style="grid-template-columns: repeat(auto-fit, minmax(250px, 1fr)); gap:20px;">
            <div class="menu-card">
              <img src="post1.jpg" alt="Post 1">
              <div class="card-body">
                <h5>Brownies Fudge Super Lembut</h5>
                <p>Postinganku tentang resep brownies yang lumer banget!</p>
                <div style="display:flex; justify-content:space-between; margin-top:10px;">
                  <button class="btn-hero editBtn">Edit</button>
                  <button class="btn-hero deleteBtn">Hapus</button>
                </div>
              </div>
            </div>

            <div class="menu-card">
              <img src="post2.jpg" alt="Post 2">
              <div class="card-body">
                <h5>Hiasan Buttercream Pastel</h5>
                <p>Tips bikin gradasi warna lembut di buttercream 💕</p>
                <div style="display:flex; justify-content:space-between; margin-top:10px;">
                  <button class="btn-hero editBtn">Edit</button>
                  <button class="btn-hero deleteBtn">Hapus</button>
                </div>
              </div>
            </div>
          </div>

          <div style="text-align:center; margin-top:20px;">
            <button id="tambahPostBtn" class="btn-hero">Tambah Postingan Baru</button>
          </div>
        </div>

        <!-- RESEP FAVORIT -->
        <div class="tab-content" id="favorit">
          <h3>Resep Favorit Saya</h3>
          <div class="menu-grid" style="grid-template-columns: repeat(auto-fit, minmax(250px, 1fr)); gap:20px;">
            <div class="menu-card">
              <img src="resep1.jpg" alt="Resep 1">
              <div class="card-body">
                <h5>Kue Cokelat Lumer</h5>
                <p>Favorit banget buat ngemil sore 💖</p>
              </div>
            </div>

            <div class="menu-card">
              <img src="resep2.jpg" alt="Resep 2">
              <div class="card-body">
                <h5>Cheesecake Panggang</h5>
                <p>Tekstur creamy-nya bikin nagih!</p>
              </div>
            </div>
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

  <!-- ================= SCRIPT ================= -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>

<script>
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
document.addEventListener("DOMContentLoaded", () => {
    
    // --- FUNGSI UTAMA ---

    // 1. Ambil data favorit dari LocalStorage
    function getFavorites() {
        const favorites = localStorage.getItem('ceriaFavorites');
        return favorites ? JSON.parse(favorites) : {};
    }

    // 2. Simpan data favorit ke LocalStorage
    function saveFavorites(favorites) {
        localStorage.setItem('ceriaFavorites', JSON.stringify(favorites));
    }

    // 3. Render (Tampilkan) Daftar Resep Favorit di Dashboard
    function renderFavoritesDashboard() {
        const favorites = getFavorites();
        const container = document.querySelector('#favorit .menu-grid');
        if (!container) return; // Pastikan kontainer ada

        container.innerHTML = ''; // Kosongkan kontainer

        if (Object.keys(favorites).length === 0) {
            container.innerHTML = '<p style="grid-column: 1/-1; text-align: center; padding: 20px;">Anda belum menambahkan resep favorit. Tambahkan sekarang!</p>';
            return;
        }

        // Buat kartu untuk setiap resep favorit
        for (const id in favorites) {
            const resep = favorites[id];
            const cardHtml = `
                <div class="menu-card" data-resep-id="${id}">
                    <img src="${id}.jpg" alt="${resep.title}">
                    <div class="card-body">
                        <h5>${resep.title}</h5>
                        <p>Ditambahkan sebagai favorit Anda. 😊</p>
                        <button class="btn-hero delete-fav-btn" data-resep-id="${id}">Hapus dari Favorit</button>
                    </div>
                </div>
            `;
            container.innerHTML += cardHtml;
        }

        // Pasang event listener untuk tombol hapus di dashboard
        document.querySelectorAll('.delete-fav-btn').forEach(button => {
            button.addEventListener('click', function() {
                const resepId = this.getAttribute('data-resep-id');
                toggleFavorite(resepId, true); // Panggil toggle untuk menghapus
            });
        });
    }


    // 4. Toggle/Ubah status favorit (Fungsi inti)
    function toggleFavorite(id, isDeletion = false) {
        const favorites = getFavorites();
        const icon = document.querySelector(`.favorite-icon[data-resep-id="${id}"]`);
        
        let shouldBeFavorite;

        if (isDeletion) {
             // Jika dipanggil dari tombol 'Hapus' di dashboard
            shouldBeFavorite = false;
        } else {
             // Jika dipanggil dari klik ikon di halaman #resep
            shouldBeFavorite = !favorites[id]; // Toggle status
        }


        if (shouldBeFavorite) {
            // Tambahkan ke Favorit
            const title = icon.getAttribute('data-title');
            favorites[id] = { id: id, title: title };
            icon.style.color = 'red'; // Beri warna merah untuk menandai disukai
            alert(`"${title}" berhasil ditambahkan ke Favorit!`);
        } else {
            // Hapus dari Favorit
            const title = favorites[id] ? favorites[id].title : 'Resep';
            delete favorites[id];
            if (icon) icon.style.color = '#8e1913'; // Kembalikan warna default ikon di halaman resep
            alert(`"${title}" berhasil dihapus dari Favorit.`);
        }

        saveFavorites(favorites);
        renderFavoritesDashboard(); // Render ulang dashboard setelah perubahan

        // Panggil kembali status visual ikon di halaman resep
        updateIconVisuals();
    }
    
    // 5. Update tampilan ikon di section #resep saat halaman dimuat
    function updateIconVisuals() {
        const favorites = getFavorites();
        document.querySelectorAll('.favorite-icon').forEach(icon => {
            const id = icon.getAttribute('data-resep-id');
            if (favorites[id]) {
                icon.style.color = 'red';
            } else {
                // Gunakan warna default (sesuai CSS Anda, mungkin #8e1913)
                icon.style.color = '#8e1913'; 
            }
        });
    }

    // --- INISIALISASI ---
    
    // Pasang Event Listener ke semua ikon hati di section #resep
    document.querySelectorAll('.favorite-icon').forEach(icon => {
        icon.addEventListener('click', function() {
            const resepId = this.getAttribute('data-resep-id');
            toggleFavorite(resepId);
        });
    });

    // Panggil fungsi untuk menampilkan ikon di #resep sesuai status
    updateIconVisuals(); 
    
    // Panggil fungsi untuk mengisi daftar favorit di dashboard saat halaman dimuat
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
