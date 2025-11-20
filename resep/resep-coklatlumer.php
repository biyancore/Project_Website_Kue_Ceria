<!DOCTYPE html>
<html lang="id">
<head>
<meta charset="UTF-8">
<title>Resep Kue Cokelat Lumer</title>
<link href="https://fonts.googleapis.com/css2?family=Caprasimo&family=Poppins:wght@300;400;600&display=swap" rel="stylesheet">

<style>
body {
  margin:0; padding:0;
  background:#fff9b4;
  font-family:"Poppins",sans-serif;
}
.recipe-wrapper {
  max-width:1100px; margin:120px auto 80px; padding:30px;
  background:#fffaf0; border-radius:26px;
  box-shadow:0 10px 28px rgba(0,0,0,0.15);
}
.recipe-header h1 {
    font-weight: lighter; margin-bottom : 20px; margin-top:30px;
  font-family:"Caprasimo",cursive; font-size:2.3rem;
  color:#8e1913; margin-bottom:10px;
}
.recipe-meta { color:#9a7d52; font-size:0.9rem; margin-bottom:20px; }
.recipe-main {
  display:grid; grid-template-columns:1.4fr 1fr; gap:26px;
}
.recipe-main img {
  width:100%; height:380px; object-fit:cover;
  border-radius:22px; box-shadow:0 8px 22px rgba(0,0,0,0.18);
  margin-top:50px;
}
.recipe-content h3 {
    font-weight: lighter; margin-bottom : 20px; margin-top:30px;
  font-family:"Caprasimo"; color:#8e1913; margin-bottom:6px;
}
.recipe-content ul {
  padding-left:20px; margin-bottom:18px;
}
.recipe-content li {
  margin-bottom:6px; color:#553c28; font-size:0.95rem;
}
.back-btn {
  display:inline-block; margin-top:26px;
  padding:10px 20px; border-radius:999px;
  background:linear-gradient(135deg,#fff9b4,#caa340);
  color:#8e1913; font-weight:600; text-decoration:none;
  box-shadow:0 6px 16px rgba(0,0,0,0.18);
}
.back-btn:hover { transform:translateY(-2px); }
@media(max-width:900px){
  .recipe-main { grid-template-columns:1fr; }
  .recipe-main img { height:260px; }
}
</style>
</head>
<body>

<div class="recipe-wrapper">
  <div class="recipe-header">
    <h1>Kue Cokelat Lumer</h1>
    <div class="recipe-meta">⏱️ 30 menit · Tingkat: Mudah</div>
  </div>

  <div class="recipe-main">
    <img src="../image/coklatlumer.jpg" alt="Kue Cokelat Lumer">

    <div class="recipe-content">
      <h3>Bahan:</h3>
      <ul>
        <li>120 gr dark chocolate</li>
        <li>100 gr mentega</li>
        <li>2 butir telur</li>
        <li>50 gr gula pasir</li>
        <li>35 gr tepung terigu</li>
        <li>1 sdt vanila</li>
      </ul>

      <h3>Cara Membuat:</h3>
      <ul>
        <li>Lelehkan cokelat dan mentega bersama.</li>
        <li>Kocok telur dan gula hingga sedikit mengembang.</li>
        <li>Masukkan campuran cokelat, aduk rata.</li>
        <li>Tambahkan tepung dan vanila, aduk lipat.</li>
        <li>Tuang ke cup, panggang 10–12 menit hingga bagian dalam tetap lumer.</li>
      </ul>
    </div>
  </div>

  <a href="../index_baru.php#resep" class="back-btn">← Kembali ke Resep</a>
</div>

</body>
</html>
