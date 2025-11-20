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
    <img src="image/ceria.png" alt="Logo Ceria Bakery" class="logo">
  </div>

  <ul class="nav-menu">
    <li><a href="#hero" class="nav-link active"><i class="fa-solid fa-house"></i> Home</a></li>
    <li><a href="#artikel" class="nav-link"><i class="fa-solid fa-newspaper"></i> Artikel</a></li>
    <li><a href="#resep" class="nav-link"><i class="fa-solid fa-cookie-bite"></i> Resep</a></li>
    <li><a href="#komunitas" class="nav-link"><i class="fa-solid fa-users"></i> Komunitas</a></li>
    <li><a href="#toko" class="nav-link"><i class="fa-solid fa-bag-shopping"></i> Shop</a></li>
  </ul>

  <div class="nav-icons">
    <a href=dashboard.php id="userIcon" title="Akun Saya"><i class="fa-solid fa-user-circle"></i></a>
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
        <img src="image/element1.png" alt="Kue Ceria">
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
        <img src="image/festivalkue.jpeg" alt="Berita 1">
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
        <img src="image/dessertasia.jpeg" alt="Berita 2">
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
        <img src="image/pastelcake.jpeg" alt="Berita 3">
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
  padding-bottom: 0px; 
  background: #fff9b4 url('image/bgArtikel.png') no-repeat center top / 100% auto;
  overflow: visible;">
  <div class="menu-section artikel-section">
    <div class="featured-title"><h2>Artikel Kuliner Terbaru</h2></div>
    <div class="menu-grid" style="display:grid; grid-template-columns:repeat(auto-fit, minmax(250px,1fr)); gap:20px;">
      <div class="menu-card">
        <img src="image/nastar.jpeg" alt="Artikel 1">
        <div class="card-body">
          <h5>Sejarah Kue Nastar yang Legendaris</h5>
          <p>Kue kecil berisi nanas ini punya cerita panjang dari masa kolonial hingga jadi favorit Lebaran.</p>
          <a href="artikel/artikel-nastar.php" class="btn-hero">Baca Selengkapnya</a>
        </div>
      </div>
      <div class="menu-card">
        <img src="image/softcake.jpeg" alt="Artikel 2">
        <div class="card-body">
          <h5>Rahasia Tekstur Kue Lembut dan Mengembang</h5>
          <p>Simak tips penting agar adonanmu selalu mengembang sempurna dan hasilnya lembut menggoda!</p>
          <a href="artikel/artikel-softcake.php" class="btn-hero">Baca Selengkapnya</a>
        </div>
      </div>
      <div class="menu-card">
        <img src="image/cupcake.jpeg" alt="Artikel 3">
        <div class="card-body">
          <h5>Inspirasi Dekorasi Cupcake untuk Pemula</h5>
          <p>Buat cupcake-mu jadi karya seni kecil yang lucu dan cantik dengan bahan sederhana.</p>
          <a href="artikel/artikel-cupcake.php" class="btn-hero">Baca Selengkapnya</a>
        </div>
      </div>
    </div>
        <div style="text-align:center; margin-top:20px;">
      <a href="#" class="btn-hero">Lihat Semua Artikel</a>
    </div>
  </div>
  </section>

  <!-- ================= RESEP ================= -->
  <section id="resep" 
  style="position: relative;
  width: 100%;
  margin-top: -10px;
  padding-top: 110px;
  padding-bottom: 10px; 
  background: #fff9b4 url('image/bgResep.png') no-repeat center bottom / 100% auto;
  overflow: visible;">
  <div class="menu-section resep-section">
    <div class="featured-title"><h2>Resep Kue Populer</h2></div>
    <div class="menu-grid" style="display:grid; grid-template-columns:repeat(auto-fit,minmax(250px,1fr)); gap:20px;">
      <div class="menu-card">
        <img src="image/coklatlumer.jpg" alt="Resep 1">
        <div class="card-body">
          <h5>Kue Cokelat Lumer</h5>
          <p>Kue lembut isi cokelat premium yang meleleh di setiap gigitan.</p>
          <p class="price">⏱️ 30 menit</p>
          <a href="resep/resep-coklatlumer.php" class="btn-hero">Lihat Resep</a>
          <i class="fa-solid fa-heart favorite-icon" data-resep-id="coklatlumer" data-title="Kue Cokelat Lumer" style="float:right; cursor:pointer;"></i>
        </div>
      </div>
      <div class="menu-card">
        <img src="image/bolupandan.jpg" alt="Resep 2">
        <div class="card-body">
          <h5>Bolu Pandan Santan</h5>
          <p>Aroma pandan dan gurihnya santan berpadu sempurna dalam bolu klasik ini.</p>
          <p class="price">⏱️ 45 menit</p>
          <a href="resep/resep-bolupandan.php" class="btn-hero">Lihat Resep</a>
          <i class="fa-solid fa-heart favorite-icon" data-resep-id="bolupandan" data-title="Bolu Pandan Santan" style="float:right; cursor:pointer;"></i>
        </div>
      </div>
      <div class="menu-card">
        <img src="image/cheesecakepanggang.jpg" alt="Resep 3">
        <div class="card-body">
          <h5>Cheesecake Panggang</h5>
          <p>Tekstur creamy dan rasa manis gurih yang pas bikin cheesecake ini favorit semua orang.</p>
          <p class="price">⏱️ 1 jam</p>
          <a href="resep/resep-cheesecake.php" class="btn-hero">Lihat Resep</a>
          <i class="fa-solid fa-heart favorite-icon" data-resep-id="cheesecakepanggang" data-title="Cheese Cake Panggang" style="float:right; cursor:pointer;"></i>
        </div>
      </div>
    </div>
        <div style="text-align:center; margin-top:20px;">
      <a href="#" class="btn-hero">Lihat Semua Resep</a>
    </div>
  </div>
  </section>

<!-- ================= KOMUNITAS ================= -->
<section id="komunitas"
  style="
    position: relative;
    width: 100%;
    margin-top: -20px;
    padding-top: 110px;
    padding-bottom: 140px;
    background: #fff9b4 url('image/bgMenu.png') no-repeat center top / 100% auto;
    overflow: visible;">
  <div class="menu-section komunitas-section">
    
    <div class="featured-title">
      <h2>Komunitas Pecinta Kue</h2>
    </div>

    <p style="text-align:center; max-width:720px; margin:0 auto 25px; font-size:0.95rem;">
      Lihat hasil kreasi dan cerita baking dari para member Ceria Bakery.
      Postingan terbaru akan tampil otomatis di sini.
    </p>

    <!-- Grid postingan komunitas (nanti bisa di-loop dari database) -->
    <div class="community-grid" id="komunitasList">
      <!-- Contoh card 1 -->
      <article class="community-card">
        <img src="image/browniespandan.jpg" alt="Brownies Pandan @rina_bakes" class="community-img">
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
        <img src="image/tart.jpeg" alt="Pastel Tart by @cindy_cake" class="community-img">
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
        <img src="image/reseplembut.jpg" alt="Roti Lembut by @andi_kitchen" class="community-img">
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
        <img src="image/cupcake.jpeg" alt="Cupcake @sweetcup" class="community-img">
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
      <!-- Contoh struktur untuk loop PHP:
      <?php foreach ($posts as $post): ?>
        <article class="community-card">
          <img src="<?= htmlspecialchars($post['gambar']) ?>" alt="<?= htmlspecialchars($post['judul']) ?>" class="community-img">
          <div class="community-body">
            <h5 class="community-title"><?= htmlspecialchars($post['judul']) ?></h5>
            <p class="community-user">@<?= htmlspecialchars($post['username']) ?> • <?= htmlspecialchars($post['kategori']) ?></p>
            <p class="community-caption"><?= htmlspecialchars($post['caption']) ?></p>
            <div class="community-meta">
              <span>❤️ <?= (int)$post['likes'] ?> suka</span>
              <span>•</span>
              <span><?= htmlspecialchars($post['waktu_relative']) ?></span>
            </div>
            <button class="btn-hero community-btn">Lihat Postingan</button>
          </div>
        </article>
      <?php endforeach; ?>
      -->
    </div>

    <div style="text-align:center; margin-top:25px;">
      <a href="#" class="btn-hero" style="max-width:260px;">Lihat Semua Postingan</a>
    </div>
  </div>
</section>


    <!-- ================= TOKO ================= -->
  <section id="toko"
    style="
      position: relative;
      width: 100%;
      margin-top: -10px;
      padding-top: 110px;
      padding-bottom: 80px;
      background: #fff9b4;
      overflow: hidden;
    ">
    <div class="menu-section toko-section">
      <div class="featured-title"><h2>Toko Kue Rekomendasi</h2></div>

      <p style="text-align:center; max-width:700px; margin:0 auto 25px; font-size:0.95rem;">
        Jelajahi berbagai toko kue pilihan – dari kue tart ulang tahun, cupcake lucu,
        pudding lembut, hingga aneka kue tradisional favorit.
      </p>

      <!-- Wrapper scroll horizontal -->
      <div class="toko-scroll-wrapper">
        <!-- 1. Toko Tart -->
        <div class="menu-card toko-card">
          <img src="image/cupcakeShop.jpg" alt="Sweet Tart Studio">
          <div class="card-body">
            <h5>Sweet Tart Studio</h5>
            <p>Spesialis kue tart custom untuk ulang tahun, wedding, dan momen spesial.</p>
            <p class="price">📍 Jakarta Selatan</p>
            <button class="btn-hero btn-toko">Kunjungi Profil</button>
          </div>
        </div>

        <!-- 2. Toko Cupcake -->
        <div class="menu-card toko-card">
          <img src="image/sweetTart.jpg" alt="Cupcake Corner">
          <div class="card-body">
            <h5>Cupcake Corner</h5>
            <p>Cupcake lucu dengan topping warna-warni, cocok untuk hampers dan pesta.</p>
            <p class="price">📍 Bandung</p>
            <button class="btn-hero btn-toko">Kunjungi Profil</button>
          </div>
        </div>

        <!-- 3. Toko Pudding -->
        <div class="menu-card toko-card">
          <img src="image/puddingShop.jpg" alt="Pudding & Jelly House">
          <div class="card-body">
            <h5>Pudding & Jelly House</h5>
            <p>Pudding susu, cokelat, dan jelly cantik dengan aneka rasa kekinian.</p>
            <p class="price">📍 Surabaya</p>
             <button class="btn-hero btn-toko">Kunjungi Profil</button>
          </div>
        </div>

        <!-- 4. Toko Roti & Kue Harian -->
        <div class="menu-card toko-card">
          <img src="image/dailyBread.jpg" alt="Daily Bread & Cake">
          <div class="card-body">
            <h5>Daily Bread & Cake</h5>
            <p>Roti lembut, sponge cake, dan snack manis yang pas untuk teman ngopi.</p>
            <p class="price">📍 Yogyakarta</p>
            <button class="btn-hero btn-toko">Kunjungi Profil</button>
          </div>
        </div>

        <!-- 5. Toko Kue Tradisional -->
        <div class="menu-card toko-card">
          <img src="image/nusantaraCake.jpg" alt="Nusantara Cake House">
          <div class="card-body">
            <h5>Nusantara Cake House</h5>
            <p>Kue tradisional Indonesia: nastar, lapis legit, klepon, dan banyak lagi.</p>
            <p class="price">📍 Bogor</p>
             <button class="btn-hero btn-toko">Kunjungi Profil</button>
          </div>
        </div>

        <!-- 6. Toko Cookies -->
        <div class="menu-card toko-card">
          <img src="image/cookieJar.jpg" alt="Cookie Jar Bakery">
          <div class="card-body">
            <h5>Cookie Jar Bakery</h5>
            <p>Aneka cookies crunchy & chewy dengan choco chips melimpah.</p>
            <p class="price">📍 Tangerang</p>
             <button class="btn-hero btn-toko">Kunjungi Profil</button>
          </div>
        </div>
      </div>

      <div style="text-align:center; margin-top:20px;">
        <small>Geser ke kanan untuk melihat lebih banyak toko ➜</small>
      </div>
    </div>
  </section>



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

  <!-- Nav-link aktif sesuai scroll + styling nav-menu -->
  <script>
    document.addEventListener("DOMContentLoaded", () => {
      const navLinks = document.querySelectorAll(".nav-link");
      const sections = document.querySelectorAll("section");

      window.addEventListener("scroll", () => {
        let current = "";
        sections.forEach(section => {
          const sectionTop = section.offsetTop - 90;
          if (window.scrollY >= sectionTop) current = section.getAttribute("id");
        });

        navLinks.forEach(link => {
          link.classList.remove("active");
          if (link.getAttribute("href").includes(current)) {
            link.classList.add("active");
          }
        });
      });

      // styling nav-menu (kalau mau, ini bisa dipindah ke CSS)
      document.querySelectorAll(".nav-menu").forEach(ul => {
        ul.style.listStyle = "none";
        ul.style.display = "flex";
        ul.style.justifyContent = "center";
        ul.style.alignItems = "center";
        ul.style.gap = "40px";
      });
    });
  </script>

  <!-- Navbar berubah saat discroll -->
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

  <!-- Carousel Berita -->
  <script>
    document.addEventListener("DOMContentLoaded", () => {
      let slideIndex = 0;
      const slides = document.querySelectorAll(".carousel-slide");
      const prevBtn = document.querySelector(".prev");
      const nextBtn = document.querySelector(".next");

      function showSlide(i) {
        slides.forEach((s, index) => {
          s.classList.remove("active");
          s.style.position = "absolute";
          if (index === i) {
            s.classList.add("active");
            s.style.position = "relative";
          }
        });
      }

      function changeSlide(n) {
        slideIndex = (slideIndex + n + slides.length) % slides.length;
        showSlide(slideIndex);
      }

      if (slides.length > 0) {
        showSlide(slideIndex);

        if (prevBtn && nextBtn) {
          prevBtn.addEventListener("click", () => changeSlide(-1));
          nextBtn.addEventListener("click", () => changeSlide(1));
        }

        setInterval(() => changeSlide(1), 5000);
      }
    });
  </script>

  <!-- Favorit Resep (localStorage) -->
  <script>
    // Link halaman resep (dipakai saat klik "Lihat Resep")
    const resepLinks = {
      coklatlumer: "resep/resep-coklatlumer.php",
      bolupandan: "resep/resep-bolupandan.php",
      cheesecakepanggang: "resep/resep-cheesecake.php"
    };

    // Ambil data favorit dari localStorage
    function getFavorites() {
      const favorites = localStorage.getItem("ceriaFavorites");
      return favorites ? JSON.parse(favorites) : {};
    }

    // Simpan data favorit ke localStorage
    function saveFavorites(favorites) {
      localStorage.setItem("ceriaFavorites", JSON.stringify(favorites));
    }

    // Render daftar favorit di dashboard (#favorit .menu-grid)
    function renderFavoritesDashboard() {
      const favorites = getFavorites();
      const container = document.querySelector("#favorit .menu-grid");
      if (!container) return; // Kalau bukan di dashboard.php, langsung keluar

      container.innerHTML = "";

      if (Object.keys(favorites).length === 0) {
        container.innerHTML = `
          <p style="grid-column: 1/-1; text-align: center; padding: 20px;">
            Anda belum menambahkan resep favorit. Tambahkan sekarang!
          </p>`;
        return;
      }

      Object.keys(favorites).forEach(id => {
        const resep = favorites[id];
        container.innerHTML += `
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
      });
    }

    // Update warna ikon love di halaman resep
    function updateIconVisuals() {
      const favorites = getFavorites();
      document.querySelectorAll(".favorite-icon").forEach(icon => {
        const id = icon.getAttribute("data-resep-id");
        icon.style.color = favorites[id] ? "red" : "#8e1913";
      });
    }

    // Tambah / hapus favorit
    function toggleFavorite(id, isDeletion = false) {
      const favorites = getFavorites();
      const icon = document.querySelector(`.favorite-icon[data-resep-id="${id}"]`);
      let shouldBeFavorite = !favorites[id];

      if (isDeletion) shouldBeFavorite = false;

      if (shouldBeFavorite) {
        const title = icon ? icon.getAttribute("data-title") : "Tanpa Judul";
        favorites[id] = { id, title };
        if (icon) icon.style.color = "red";
        alert(`"${title}" berhasil ditambahkan ke Favorit!`);
      } else {
        const title = favorites[id] ? favorites[id].title : "Resep";
        delete favorites[id];
        if (icon) icon.style.color = "#8e1913";
        alert(`"${title}" berhasil dihapus dari Favorit.`);
      }

      saveFavorites(favorites);
      renderFavoritesDashboard();
      updateIconVisuals();
    }

    // Inisialisasi setelah DOM siap
    document.addEventListener("DOMContentLoaded", () => {
      // Untuk halaman yang punya icon love
      updateIconVisuals();

      // Untuk halaman dashboard.php yang punya #favorit
      renderFavoritesDashboard();

      // Delegasi event klik (love, hapus, lihat resep)
      document.addEventListener("click", e => {
        // Klik ikon love di section RESEP
        if (e.target.classList.contains("favorite-icon")) {
          const id = e.target.getAttribute("data-resep-id");
          toggleFavorite(id);
        }

        // Klik tombol "Hapus" di dashboard favorit
        if (e.target.classList.contains("delete-fav-btn")) {
          const id = e.target.getAttribute("data-resep-id");
          toggleFavorite(id, true);
        }

        // Klik tombol "Lihat Resep"
        if (e.target.classList.contains("lihat-resep-btn")) {
          const id = e.target.getAttribute("data-resep-id");
          if (resepLinks[id]) {
            window.location.href = resepLinks[id];
          } else {
            alert("Halaman resep belum tersedia.");
          }
        }
      });
    });
  </script>

<!-- alert kunjungi toko -->
  <script>
document.addEventListener("click", function(e) {
  if (e.target.classList.contains("btn-toko")) {

    alert("Anda diarahkan ke WhatsApp toko untuk pemesanan dan lihat katalog produk");

    // Tidak ada redirect → hanya alert
  }
});
</script>



</body>
</html>
