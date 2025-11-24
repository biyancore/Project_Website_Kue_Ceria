<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Ceria Bakery | Komunitas Pecinta Kue</title>
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Caprasimo&family=Lobster&family=Poppins:wght@400;500;600;700&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css">
<link rel="stylesheet" href="stylebaru.css"> 
<script src="https://kit.fontawesome.com/5b43f676d3.js" crossorigin="anonymous"></script>
</head>

<body>
  <?php 
    include 'koneksi.php';
    $stmt = $koneksi->prepare("
    SELECT k.*, u.username 
    FROM komunitas k 
    LEFT JOIN users u ON k.id_user = u.id_user
    ORDER BY k.id_komunitas DESC
");
  $stmt->execute();
  $posts = $stmt->get_result();
  ?>
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

<section id="berita" class="carousel-section">
  <div class="featured-title">
    <h2>Berita Terkini Dunia Kue</h2>
  </div>

  <div class="carousel-container">
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

    
    <button class="carousel-btn prev">&#10094;</button>
    <button class="carousel-btn next">&#10095;</button>
  </div>
</section>


 
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

          <p style="text-align:center; margin-bottom:20px; max-width:700px; margin:0 auto 25px; font-size:16px;">
        Artikel terbaru seputar dunia kue, per-bakingan, dan berbagai inspirasi seputar kue akan
        ada semuanya disini. Kunjungi dan jelajahi untuk dapat lebih banyak berita tentang kue.
      </p>

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
  </div>
  </section>

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

          <p style="text-align:center; max-width:700px; margin:0 auto 25px; font-size:16px;">
        Jelajahi berbagai resep kue pilihan – dari kue tart ulang tahun, cupcake lucu,
        pudding lembut, hingga aneka kue tradisional favorit.
      </p>

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
  </div>
  </section>


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

    <p style="text-align:center; max-width:720px; margin:0 auto 25px; font-size:16px;">
      Lihat hasil kreasi dan cerita baking dari para member Ceria Bakery.
    </p>

    <div class="community-grid" id="komunitasList">

      <!-- 4 POSTINGAN STATIS -->
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
          </div>
          <button
            type="button"
            class="btn-hero community-btn lihat-post-btn"
            data-gambar="image/browniespandan.jpg"
            data-judul="Brownies Pandan Super Moist"
            data-user="@rina_bakes • Brownies"
            data-isi="Cobain resep brownies pandan ini, teksturnya lembut dan super moist! 😍"
          >
            Lihat Postingan
          </button>
        </div>
      </article>

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
          </div>
          <button
            type="button"
            class="btn-hero community-btn lihat-post-btn"
            data-gambar="image/tart.jpeg"
            data-judul="Tart Pastel Ulang Tahun"
            data-user="@cindy_cake • Cake Tart"
            data-isi="Tart buttercream warna pastel untuk ulang tahun adikku 🎂💗"
          >
            Lihat Postingan
          </button>
        </div>
      </article>

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
          </div>
          <button
            type="button"
            class="btn-hero community-btn lihat-post-btn"
            data-gambar="image/reseplembut.jpg"
            data-judul="Roti Susu Super Lembut"
            data-user="@andi_kitchen • Roti"
            data-isi="Sharing tips biar roti lembut tapi nggak bantet, cocok buat sarapan. 🥐"
          >
            Lihat Postingan
          </button>
        </div>
      </article>

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
          </div>
          <button
            type="button"
            class="btn-hero community-btn lihat-post-btn"
            data-gambar="image/cupcake.jpeg"
            data-judul="Cupcake Vanilla Pastel"
            data-user="@sweetcup • Cupcake"
            data-isi="Set cupcake pastel untuk gift box temen kantor, simple tapi cantik 💕"
          >
            Lihat Postingan
          </button>
        </div>
      </article>

      <!-- POSTINGAN DARI DATABASE -->
      <?php if ($posts->num_rows > 0): ?>
        <?php while ($post = $posts->fetch_assoc()): ?>
          <?php
            $foto = !empty($post['gambar'])
              ? 'uploads/' . htmlspecialchars($post['gambar'], ENT_QUOTES)
              : 'image/reseplembut.jpg';
          ?>
          <article class="community-card">
            <img src="<?= $foto ?>" class="community-img">
            <div class="community-body">
              <h5 class="community-title"><?= htmlspecialchars($post['judul']) ?></h5>

              <p class="community-user">
                @<?= htmlspecialchars($post['username'] ?? 'member') ?> • Komunitas
              </p>

              <p class="community-caption">
                <?= nl2br(htmlspecialchars($post['isi'])) ?>
              </p>

              <div class="community-meta">
                <span>❤️ suka</span>
              </div>

              <button
                type="button"
                class="btn-hero community-btn lihat-post-btn"
                data-gambar="<?= $foto ?>"
                data-judul="<?= htmlspecialchars($post['judul']) ?>"
                data-user="@<?= htmlspecialchars($post['username'] ?? 'member') ?> • Komunitas"
                data-isi="<?= nl2br(htmlspecialchars($post['isi'])) ?>"
              >
                Lihat Postingan
              </button>
            </div>
          </article>
        <?php endwhile; ?>
      <?php else: ?>
        <p style="grid-column:1/-1; text-align:center; padding:20px;">
          Belum ada postingan dari member. Yuk jadi yang pertama! ✨
        </p>
      <?php endif; ?>

    </div>

    <div style="text-align:center; margin-top:25px;">
      <a href="dashboard.php" class="btn-hero" style="max-width:260px;">Lihat Postingan Saya</a>
    </div>

  </div>
</section>

<div id="viewPostModal" class="auth-modal">
  <div class="auth-content" style="max-width:460px; padding:22px 22px 26px;">
    <span class="close-btn close-view-post">&times;</span>

    <article class="community-card" style="margin-bottom:0;">
      <img id="viewPostImage"
           src=""
           alt="Detail Postingan"
           class="community-img"
           style="width:100%; height:200px; object-fit:cover;">

      <div class="community-body">
        <h5 id="viewPostTitle" class="community-title"></h5>

        <p id="viewPostUser" class="community-user"></p>

        <p id="viewPostIsi"
           class="community-caption"
           style="height:auto; max-height:none; margin-bottom:10px;">
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
      <div class="toko-scroll-wrapper">
        <div class="menu-card toko-card">
          <img src="image/cupcakeShop.jpg" alt="Sweet Tart Studio">
          <div class="card-body">
            <h5>Sweet Tart Studio</h5>
            <p>Spesialis kue tart custom untuk ulang tahun, wedding, dan momen spesial.</p>
            <p class="price">📍 Jakarta Selatan</p>
            <button class="btn-hero btn-toko">Kunjungi Profil</button>
          </div>
        </div>

        <div class="menu-card toko-card">
          <img src="image/sweetTart.jpg" alt="Cupcake Corner">
          <div class="card-body">
            <h5>Cupcake Corner</h5>
            <p>Cupcake lucu dengan topping warna-warni, cocok untuk hampers dan pesta.</p>
            <p class="price">📍 Bandung</p>
            <button class="btn-hero btn-toko">Kunjungi Profil</button>
          </div>
        </div>

        <div class="menu-card toko-card">
          <img src="image/puddingShop.jpg" alt="Pudding & Jelly House">
          <div class="card-body">
            <h5>Pudding & Jelly House</h5>
            <p>Pudding susu, cokelat, dan jelly cantik dengan aneka rasa kekinian.</p>
            <p class="price">📍 Surabaya</p>
             <button class="btn-hero btn-toko">Kunjungi Profil</button>
          </div>
        </div>

        <div class="menu-card toko-card">
          <img src="image/dailyBread.jpg" alt="Daily Bread & Cake">
          <div class="card-body">
            <h5>Daily Bread & Cake</h5>
            <p>Roti lembut, sponge cake, dan snack manis yang pas untuk teman ngopi.</p>
            <p class="price">📍 Yogyakarta</p>
            <button class="btn-hero btn-toko">Kunjungi Profil</button>
          </div>
        </div>

        <div class="menu-card toko-card">
          <img src="image/nusantaraCake.jpg" alt="Nusantara Cake House">
          <div class="card-body">
            <h5>Nusantara Cake House</h5>
            <p>Kue tradisional Indonesia: nastar, lapis legit, klepon, dan banyak lagi.</p>
            <p class="price">📍 Bogor</p>
             <button class="btn-hero btn-toko">Kunjungi Profil</button>
          </div>
        </div>

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

<!-- MODAL DETAIL POSTINGAN -->



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

<script>
const resepLinks = {
    coklatlumer: "resep/resep-coklatlumer.php",
    bolupandan: "resep/resep-bolupandan.php",
    cheesecakepanggang: "resep/resep-cheesecake.php"
};

document.addEventListener("DOMContentLoaded", () => {

    function getFavorites() {
        const favorites = localStorage.getItem('ceriaFavorites');
        return favorites ? JSON.parse(favorites) : {};
    }

    function saveFavorites(favorites) {
        localStorage.setItem('ceriaFavorites', JSON.stringify(favorites));
    }

    function renderFavoritesDashboard() {
        const favorites = getFavorites();
        const container = document.querySelector('#favorit .menu-grid');

        if (!container) return;

        container.innerHTML = '';

        if (Object.keys(favorites).length === 0) {
            container.innerHTML =
                `<p style="grid-column: 1/-1; text-align: center; padding: 20px;">
                    Anda belum menambahkan resep favorit. Tambahkan sekarang!
                 </p>`;
            return;
        }

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

    function toggleFavorite(id, isDeletion = false) {
        const favorites = getFavorites();
        const icon = document.querySelector(`.favorite-icon[data-resep-id="${id}"]`);

        let shouldBeFavorite = !favorites[id]; 

        if (isDeletion) shouldBeFavorite = false;

        if (shouldBeFavorite) {
            const title = icon ? icon.getAttribute('data-title') || "Tanpa Judul" : "Tanpa Judul";
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

    
    function updateIconVisuals() {
        const favorites = getFavorites();
        document.querySelectorAll('.favorite-icon').forEach(icon => {
            const id = icon.getAttribute('data-resep-id');
            icon.style.color = favorites[id] ? 'red' : '#8e1913';
        });
    }

    

    
    document.addEventListener("click", function(e) {
        if (e.target.classList.contains("favorite-icon")) {
            const id = e.target.getAttribute("data-resep-id");
            toggleFavorite(id);
        }
    });

   
    document.addEventListener("click", function(e) {
        if (e.target.classList.contains("delete-fav-btn")) {
            const id = e.target.getAttribute("data-resep-id");
            toggleFavorite(id, true);
        }
    });

    
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

    
    updateIconVisuals();       
    renderFavoritesDashboard(); 
});
</script>

<script>
document.addEventListener("DOMContentLoaded", function () {
  const viewModal = document.getElementById("viewPostModal");
  const imgEl     = document.getElementById("viewPostImage");
  const titleEl   = document.getElementById("viewPostTitle");
  const userEl    = document.getElementById("viewPostUser");
  const isiEl     = document.getElementById("viewPostIsi");
  const closeEls  = document.querySelectorAll(".close-view-post");

  // Buka modal saat tombol "Lihat Postingan" diklik
  document.addEventListener("click", function (e) {
    const btn = e.target.closest(".lihat-post-btn");
    if (!btn) return;

    const gambar = btn.getAttribute("data-gambar") || "";
    const judul  = btn.getAttribute("data-judul") || "";
    const user   = btn.getAttribute("data-user") || "";
    const isi    = btn.getAttribute("data-isi") || "";

    if (imgEl)   imgEl.src = gambar;
    if (titleEl) titleEl.textContent = judul;
    if (userEl)  userEl.textContent  = user;
    if (isiEl)   isiEl.innerHTML     = isi;

    if (viewModal) viewModal.style.display = "flex";
  });

  // Tutup modal saat klik icon X
  closeEls.forEach(function (btn) {
    btn.addEventListener("click", function () {
      if (viewModal) viewModal.style.display = "none";
    });
  });

  // Tutup modal saat klik di luar konten modal
  window.addEventListener("click", function (e) {
    if (e.target === viewModal) {
      viewModal.style.display = "none";
    }
  });
});
</script>

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

  





<script>
document.addEventListener("click", function(e) {
  if (e.target.classList.contains("btn-toko")) {

    alert("Anda diarahkan ke WhatsApp toko untuk pemesanan dan lihat katalog produk");

  }
});
</script>



</body>
</html>
