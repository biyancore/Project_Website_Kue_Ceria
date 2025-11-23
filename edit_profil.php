<?php
require 'cek_login.php';
require 'koneksi.php';

$id_user = $_SESSION['id_user'];

// Ambil data user sekarang
$stmt = $koneksi->prepare("
    SELECT nama_lengkap, username, email, alasan 
    FROM users 
    WHERE id_user = ?
    LIMIT 1
");
$stmt->bind_param("i", $id_user);
$stmt->execute();
$res = $stmt->get_result();
$user = $res->fetch_assoc();

// PROSES UPDATE
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nama     = trim($_POST['nama_lengkap'] ?? '');
    $username = trim($_POST['username'] ?? '');
    $email    = trim($_POST['email'] ?? '');
    $alasan   = trim($_POST['alasan'] ?? '');
    $password = $_POST['password'] ?? '';

    if ($nama === '' || $username === '' || $email === '') {
        $error = "Nama, username, dan email wajib diisi.";
    } else {
        // Cek username/email dipakai user lain
        $cek = $koneksi->prepare("
            SELECT id_user FROM users 
            WHERE (username = ? OR email = ?) AND id_user != ?
            LIMIT 1
        ");
        $cek->bind_param("ssi", $username, $email, $id_user);
        $cek->execute();
        $cekRes = $cek->get_result();

        if ($cekRes->num_rows > 0) {
            $error = "Username atau email sudah digunakan oleh akun lain.";
        } else {
            // Siapkan query update
            if ($password !== '') {
                $hash = password_hash($password, PASSWORD_DEFAULT);
                $upd = $koneksi->prepare("
                    UPDATE users
                    SET nama_lengkap=?, username=?, email=?, alasan=?, password=?
                    WHERE id_user=?
                ");
                $upd->bind_param("sssssi", $nama, $username, $email, $alasan, $hash, $id_user);
            } else {
                $upd = $koneksi->prepare("
                    UPDATE users
                    SET nama_lengkap=?, username=?, email=?, alasan=?
                    WHERE id_user=?
                ");
                $upd->bind_param("ssssi", $nama, $username, $email, $alasan, $id_user);
            }

            if ($upd->execute()) {
                // Update juga data di session
                $_SESSION['nama_lengkap'] = $nama;
                $_SESSION['username']     = $username;
                $_SESSION['email']        = $email;

                header("Location: dashboard.php#profil");
                exit;
            } else {
                $error = "Gagal menyimpan perubahan. Coba lagi.";
            }
        }
    }
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <title>Edit Profil | Ceria Bakery</title>
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
  <style>
    body {
      min-height: 100vh;
      margin: 0;
      padding: 0;
      font-family: "Poppins", sans-serif;
      background: linear-gradient(135deg, #ffeaa7, #fab1a0);
      display: flex;
      align-items: center;
      justify-content: center;
    }
    .edit-card {
      background: #fffdf5;
      border-radius: 24px;
      box-shadow: 0 15px 30px rgba(0,0,0,0.08);
      max-width: 500px;
      width: 100%;
      padding: 25px 25px 20px;
    }
    .edit-title {
      font-size: 1.3rem;
      font-weight: 600;
      color: #8e1913;
      margin-bottom: 5px;
      text-align: center;
    }
    .edit-subtitle {
      font-size: 0.85rem;
      color: #7f8c8d;
      text-align: center;
      margin-bottom: 15px;
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
      text-align: center;
      width: 100%;
    }
    .btn-hero:hover {
      filter: brightness(1.05);
    }
    .back-link {
      text-align: center;
      margin-top: 10px;
      font-size: 0.85rem;
    }
    .back-link a {
      color: #8e1913;
      text-decoration: none;
      font-weight: 600;
    }
    .back-link a:hover {
      text-decoration: underline;
    }
  </style>
</head>
<body>

  <div class="edit-card">
    <h2 class="edit-title">Edit Profil</h2>
    <p class="edit-subtitle">
      Ubah informasi dasar akun Ceria Bakery kamu.
    </p>

    <?php if (!empty($error)): ?>
      <div class="alert alert-danger" style="font-size:0.85rem; padding:8px 10px;">
        <?= htmlspecialchars($error); ?>
      </div>
    <?php endif; ?>

    <form method="post">
      <div class="mb-3">
        <label class="form-label">Nama Lengkap</label>
        <input type="text" name="nama_lengkap" class="form-control"
               value="<?= htmlspecialchars($user['nama_lengkap'] ?? ''); ?>" required>
      </div>

      <div class="mb-3">
        <label class="form-label">Username</label>
        <input type="text" name="username" class="form-control"
               value="<?= htmlspecialchars($user['username'] ?? ''); ?>" required>
      </div>

      <div class="mb-3">
        <label class="form-label">Email</label>
        <input type="email" name="email" class="form-control"
               value="<?= htmlspecialchars($user['email'] ?? ''); ?>" required>
      </div>

      <div class="mb-3">
        <label class="form-label">Kenapa tertarik join komunitas?</label>
        <textarea name="alasan" class="form-control" rows="3"><?= htmlspecialchars($user['alasan'] ?? ''); ?></textarea>
      </div>

      <div class="mb-3">
        <label class="form-label">Password Baru (opsional)</label>
        <input type="password" name="password" class="form-control"
               placeholder="Kosongkan jika tidak ingin mengganti password">
      </div>

      <button type="submit" class="btn-hero">Simpan Perubahan</button>
    </form>

    <div class="back-link">
      <a href="dashboard.php#profil"><i class="fa-solid fa-arrow-left"></i> Kembali ke Dashboard</a>
    </div>
  </div>

</body>
</html>
