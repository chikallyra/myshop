<?php 
session_start();
include 'koneksi.php';

if (!isset($_SESSION['pelanggan'])) {
    echo "<script>alert('Silahkan login terlebih dahulu.');</script>";
    echo "<script>location='login.php';</script>";
    exit;
}

if (empty($_SESSION['keranjang']) || !isset($_SESSION['keranjang'])) {
    echo "<script>alert('Keranjang kosong, silakan belanja dulu.');</script>";
    echo "<script>location='index.php';</script>";
    exit;
}
?>
<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <title>euntamin | Checkout</title>
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
    <h1 class="text-center">Checkout</h1><br>

    <table class="table table-bordered text-center">
      <thead>
        <tr>
          <th>No</th>
          <th>Produk</th>
          <th>Harga</th>
          <th>Jumlah</th>
          <th>Subharga</th>
        </tr>
      </thead>
      <tbody>
        <?php $nomor = 1; $total_belanja = 0; ?>
        <?php foreach ($_SESSION['keranjang'] as $id_produk => $jumlah): ?>
          <?php
          $ambil = $koneksi->query("SELECT * FROM produk WHERE id_produk = '$id_produk'");
          $pecah = $ambil->fetch_assoc();
          $subharga = $pecah['harga_produk'] * $jumlah;
          ?>
          <tr>
            <td><?php echo $nomor++; ?></td>
            <td><?php echo $pecah['nama_produk']; ?></td>
            <td>Rp. <?php echo number_format($pecah['harga_produk']); ?></td>
            <td><?php echo $jumlah; ?></td>
            <td>Rp. <?php echo number_format($subharga); ?></td>
          </tr>
          <?php $total_belanja += $subharga; ?>
        <?php endforeach; ?>
      </tbody>
      <tfoot>
        <tr>
          <th colspan="4" class="text-center">Total</th>
          <th class="text-center">Rp. <?php echo number_format($total_belanja); ?></th>
        </tr>
      </tfoot>
    </table>

    <form method="POST">
      <div class="row">
        <div class="col-md-4">
          <div class="form-group">
            <input type="text" readonly class="form-control text-center" value="<?php echo $_SESSION['pelanggan']['nama_pelanggan']; ?>">
          </div>
        </div>
        <div class="col-md-4">
          <div class="form-group">
            <input type="text" readonly class="form-control text-center" value="<?php echo $_SESSION['pelanggan']['telpon_pelanggan']; ?>">
          </div>
        </div>
        <div class="col-md-4">
          <div class="form-group">
            <select name="id_ongkir" class="form-control">
              <option value="">-- Pilih Ongkir --</option>
              <?php
              $ambil = $koneksi->query("SELECT * FROM ongkir");
              while ($perongkir = $ambil->fetch_assoc()): ?>
                <option value="<?php echo $perongkir['id_ongkir']; ?>">
                  <?php echo $perongkir['nama_kota']; ?> - Rp. <?php echo number_format($perongkir['tarif']); ?>
                </option>
              <?php endwhile; ?>
            </select>
          </div>
        </div>
      </div>

      <div class="form-group">
        <label>Alamat Pengiriman</label>
        <textarea name="alamat_pengiriman" rows="5" class="form-control" placeholder="Masukkan alamat lengkap, termasuk kode pos"></textarea>
      </div>

      <div class="text-right">
        <button class="btn btn-success" name="checkout">✅ Proses Checkout</button>
      </div>
    </form>

    <?php
    if (isset($_POST['checkout'])) {
      $id_pelanggan = $_SESSION['pelanggan']['id_pelanggan'];
      $id_ongkir = $_POST['id_ongkir'];
      $tanggal_pengembalian = date("Y-m-d");
      $alamat_pengiriman = $_POST['alamat_pengiriman'];

      $ambil = $koneksi->query("SELECT * FROM ongkir WHERE id_ongkir = '$id_ongkir'");
      $array_ongkir = $ambil->fetch_assoc();
      $nama_kota = $array_ongkir['nama_kota'];
      $tarif = $array_ongkir['tarif'];
      $total_pengembalian = $total_belanja + $tarif;

      $koneksi->query("INSERT INTO pembelian (id_pelanggan, id_ongkir, tanggal_pengembalian, total_pengembalian, alamat_pengiriman)
      VALUES ('$id_pelanggan', '$id_ongkir', '$tanggal_pengembalian', '$total_pengembalian', '$alamat_pengiriman')");

      $id_pembelian_barusan = $koneksi->insert_id;

      foreach ($_SESSION['keranjang'] as $id_produk => $jumlah) {
        $ambil = $koneksi->query("SELECT * FROM produk WHERE id_produk='$id_produk'");
        $perproduk = $ambil->fetch_assoc();

        $nama = $perproduk['nama_produk'];
        $harga = $perproduk['harga_produk'];
        $berat = $perproduk['berat_produk'];
        $subharga = $harga * $jumlah;
        $subberat = $berat * $jumlah;

        $koneksi->query("INSERT INTO pembelian_produk (id_pembelian, id_produk, nama, harga, berat, subharga, subberat, jumlah)
        VALUES ('$id_pembelian_barusan', '$id_produk', '$nama', '$harga', '$berat', '$subharga', '$subberat', '$jumlah')");
      }

      unset($_SESSION['keranjang']);

      echo "<script>alert('Pembelian sukses!');</script>";
      echo "<script>location='nota.php?id=$id_pembelian_barusan';</script>";
    }
    ?>

  </div>
</section>

</body>
</html>
