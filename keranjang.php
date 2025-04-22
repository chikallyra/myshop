<?php
session_start();
include 'koneksi.php';

// Jika keranjang kosong, redirect
if (empty($_SESSION['keranjang']) || !isset($_SESSION['keranjang'])) {
    echo "<script>alert('Keranjang kosong, silakan belanja dulu.');</script>";
    echo "<script>location='index.php';</script>";
    exit;
}
?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <title>euntamin | Keranjang</title>
  <link rel="stylesheet" href="admin/assets/bower_components/bootstrap/dist/css/bootstrap.min.css">
  <style>
    body {
      background: #fefcf9;
      font-family: 'Segoe UI', sans-serif;
    }
    h1 {
      color: #7b3e19;
      font-weight: bold;
    }
    table th {
      background-color: #f5e5cc;
      color: #5e320f;
    }
    .btn-default:hover {
      background-color: #f2e6d9;
    }
    .btn-success {
      background-color: #7b3e19;
      border-color: #7b3e19;
    }
    .btn-success:hover {
      background-color: #5c2a0a;
      border-color: #5c2a0a;
    }
  </style>
</head>
<body>

<?php include 'menu.php'; ?>

<section class="konten">
  <div class="container">
    <h1 class="text-center">Keranjang Belanja</h1><br>

    <table class="table table-bordered text-center">
      <thead>
        <tr>
          <th>No</th>
          <th>Produk</th>
          <th>Harga</th>
          <th>Jumlah</th>
          <th>Subharga</th>
          <th>Aksi</th>
        </tr>
      </thead>
      <tbody>
        <?php $nomor = 1; ?>
        <?php foreach ($_SESSION['keranjang'] as $id_produk => $jumlah): ?>
          <?php
          $ambil = $koneksi->query("SELECT * FROM produk WHERE id_produk = '$id_produk'");
          $pecah = $ambil->fetch_assoc();
          $subharga = $pecah['harga_produk'] * $jumlah;
          ?>
          <tr>
            <td><?php echo $nomor; ?></td>
            <td><?php echo $pecah['nama_produk']; ?></td>
            <td>Rp. <?php echo number_format($pecah['harga_produk']); ?></td>
            <td><?php echo $jumlah; ?></td>
            <td>Rp. <?php echo number_format($subharga); ?></td>
            <td>
              <a href="hapus_keranjang.php?id=<?php echo $id_produk; ?>" class="btn btn-danger btn-xs"
                 onclick="return confirm('Apakah anda yakin ingin menghapus produk ini?')">Hapus</a>
            </td>
          </tr>
          <?php $nomor++; ?>
        <?php endforeach; ?>
      </tbody>
    </table>

    <div class="text-right">
      <a href="index.php" class="btn btn-default">⏪ Lanjutkan Belanja</a>
      <a href="checkout.php" class="btn btn-success">✅ Checkout</a>
    </div>
  </div>
</section>

</body>
</html>
