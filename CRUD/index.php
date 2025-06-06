<?php
include 'koneksi.php';

$result = $conn->query("SELECT * FROM makanan");
?>

<!DOCTYPE html>
<html lang="id">
<head> 
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <title>Website Pemesanan Kantin</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/css/bootstrap.min.css" rel="stylesheet" />
</head>
<body>
<nav class="navbar navbar-expand-lg bg-body-tertiary">
  <div class="container-fluid">
    <a class="navbar-brand" href="#">Kantin SMK Telkom</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNav">
      <ul class="navbar-nav">
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="#about">About Kantin</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#cafelist">Cafetaria List</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#buy">HowToBuy</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#contact">Contact Me</a>
        </li>
      </ul>
    </div>
  </div>
</nav>

<section id="about" class="py-5 bg-light">
  <div class="container">
    <h2 class="mb-4">About Kantin</h2>
    <div class="row align-items-center">
      <div class="col-md-6">
        <p>Kantin sekolah kami menyediakan makanan sehat dan bergizi dengan berbagai pilihan menu favorit siswa.</p>
      </div>
      <div class="col-md-6">
        <img src="kantin.jpg" alt="Kantin" class="img-fluid rounded mb-3" style="max-width: 800px; height: auto;"  />
      </div>
    </div>
  </div>
</section>

<section id="cafelist" class="py-5">
  <div class="text-center mt-4">
  <a href="pesan.php" class="btn btn-success btn-lg">Pesan Sekarang</a>
</div>
  <div class="container">
    <h2 class="mb-4">Cafetaria List</h2>
    <div class="row row-cols-1 row-cols-md-4 g-4">
      <?php while ($row = $result->fetch_assoc()): ?>
      <div class="col">
        <div class="card h-100 shadow-sm">
          <img src="gambar/<?php echo htmlspecialchars($row['gambar']); ?>" class="card-img-top" alt="<?php echo htmlspecialchars($row['nama']); ?>" />
          <div class="card-body">
            <h5 class="card-title"><?php echo htmlspecialchars($row['nama']); ?></h5>
            <p class="card-text">
              <strong>Kantin:</strong> <?php echo htmlspecialchars($row['kantin']); ?><br />
              <strong>Harga:</strong> Rp<?php echo number_format($row['harga'], 0, ',', '.'); ?><br />
              <strong>Stok:</strong> <?php echo $row['stok']; ?>
            </p>
          </div>
        </div>
      </div>
      <?php endwhile; ?>
    </div>
  </div>
</section>

<section id="buy" class="py-5 bg-light">
  <div class="container">
    <h2 class="mb-4">How To Buy</h2>
    <ol>
      <li>Pilih makanan/minuman dari daftar di atas.</li>
      <li>Masukkan jumlah yang ingin dibeli.</li>
      <li>Silahkan Scan QR yang tersedia untuk pembayaran.</li>
    </ol>
    <div class="text-center">
      <img src="dummy.png" alt="QR Dummy" class="img-thumbnail" style="max-width: 200px;" />
    </div>
  </div>
</section>

<section id="contact" class="py-5">
  <div class="container">
    <h2 class="mb-4">Contact Us</h2>
    <form action="index.php" method="post" class="mx-auto" style="max-width: 500px;">
      <div class="mb-3">
        <label for="nama" class="form-label">Nama</label>
        <input type="text" class="form-control" id="nama" name="nama" placeholder="Nama Anda" required />
      </div>
      <div class="mb-3">
        <label for="email" class="form-label">Email</label>
        <input type="email" class="form-control" id="email" name="email" placeholder="Email Anda" required />
      </div>
      <div class="mb-3">
        <label for="pesan" class="form-label">Pesan</label>
        <textarea class="form-control" id="pesan" name="pesan" rows="4" placeholder="Tulis pesan Anda" required></textarea>
      </div>
      <button type="submit" class="btn btn-primary">Kirim</button>
    </form>
  </div>
</section>

<footer class="bg- text-white text-center py-3">
  &copy; 2025 Website Pemesanan Makanan  Dibuat oleh Pandita Amanu Adi
</footer>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.4.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
