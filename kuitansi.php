<?php 
include 'koneksi.php';
?>
<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <title>euntamin| Bukti Pengiriman</title>
  <link rel="stylesheet" href="admin/assets/bower_components/bootstrap/dist/css/bootstrap.min.css">
  <style>
    body {
      background-color: #fefcf9;
      font-family: 'Segoe UI', sans-serif;
    }
    h2, h3 {
      color: #7b3e19;
      font-weight: bold;
    }
    .table th {
      background-color: #f5e5cc;
      color: #5e320f;
    }
    .alert-info {
      background-color: #eaf2f1;
      border-color: #c8dedb;
      color: #3a5f5c;
    }
    .btn-finish {
      background-color: #7b3e19;
      color: #fff;
      border: none;
    }
    .btn-finish:hover {
      background-color: #5c2a0a;
    }
  </style>
</head>
<body>

<?php  
  session_start();
  include "menu.php"; 
?>

<section class="konten">
  <div class="container">
    <h2 class="text-center">Bukti Pengiriman</h2>
    <br>
    <?php
    $ambil = $koneksi->query("SELECT 
      p.id_pembelian,
      pl.telpon_pelanggan,
      pl.email_pelanggan,
      pl.nama_pelanggan,
      pl.alamat_pelanggan,
      o.nama_kota,
      o.tarif,
      p.tanggal_pengembalian,
      p.total_pengembalian,
      p.alamat_pengiriman
      FROM pembelian p
      JOIN pelanggan pl ON p.id_pelanggan = pl.id_pelanggan
      JOIN ongkir o ON p.id_ongkir = o.id_ongkir
      WHERE p.id_pembelian = '$_GET[id]'");
    $detail = $ambil->fetch_assoc();
    ?>

    <div class="alert alert-info text-center">
      <strong>📦 Pesanan sedang dalam perjalanan</strong><br>
      Pesanan Anda dengan nomor <strong>#<?php echo $detail['id_pembelian']; ?></strong> sedang dikirim ke:
      <br><br>
      <em><?php echo $detail['alamat_pengiriman']; ?></em>
    </div>

    <div class="row text-left">
      <div class="col-md-4">
        <h3>Data Pembelian</h3>
        <p>No. Pembelian: <strong><?php echo $detail['id_pembelian']; ?></strong><br>
        Tanggal: <?php echo $detail['tanggal_pengembalian']; ?><br>
        Total: Rp. <?php echo number_format($detail['total_pengembalian']); ?></p>
      </div>
      <div class="col-md-4">
        <h3>Penerima</h3>
        <p>Nama: <strong><?php echo $detail['nama_pelanggan']; ?></strong><br>
        Telepon: <?php echo $detail['telpon_pelanggan']; ?><br>
        Email: <?php echo $detail['email_pelanggan']; ?></p>
      </div>
      <div class="col-md-4">
        <h3>Alamat Pengiriman</h3>
        <p>Kota: <?php echo $detail['nama_kota']; ?><br>
        Ongkir: Rp. <?php echo number_format($detail['tarif']); ?><br>
        Alamat: <?php echo $detail['alamat_pengiriman']; ?></p>
      </div>
    </div>

    <hr>

    <table class="table table-bordered text-center">
      <thead>
        <tr>
          <th>No.</th>
          <th>Nama Produk</th>
          <th>Harga</th>
          <th>Jumlah</th>
          <th>Subharga</th>
        </tr>
      </thead>
      <tbody>
        <?php $nomor = 1; ?>
        <?php $ambil =  $koneksi->query("SELECT * FROM pembelian_produk WHERE id_pembelian = '$_GET[id]'"); ?>
        <?php while ($pecah = $ambil->fetch_assoc()) { ?>
        <tr>
          <td><?php echo $nomor++; ?></td>
          <td><?php echo $pecah['nama']; ?></td>
          <td>Rp. <?php echo number_format($pecah['harga']); ?></td>
          <td><?php echo $pecah['jumlah']; ?></td>
          <td>Rp. <?php echo number_format($pecah['subharga']); ?></td>
        </tr>
        <?php } ?>
      </tbody>
    </table>

    <div class="text-center">
        <button type="selesai" class="btn btn-finish btn-lg" onclick="document.getElementById('uploadModal').style.display='block'">
          ✅ Pesanan Selesai
        </button>
    </div>

    <!-- Modal -->
  <div id="uploadModal" style="display:none; position:fixed; top:0; left:0; width:100%; height:100%; background:rgba(0,0,0,0.5); z-index:9999;">
  <div style="background:#fefcf9; width:420px; max-width:90%; margin:100px auto; padding:25px 20px; border-radius:12px; box-shadow:0 5px 15px rgba(0,0,0,0.2); position:relative;">
    <h4 class="text-center" style="color:#7b3e19; font-weight:bold;">Apakah pesanan sudah sampai?</h4>
    <hr style="border-top: 1px solid #d6ba9c;">
    <form onsubmit="return goToHome()">
      <div class="text-center">
        <button type="submit" class="btn btn-success" style="margin-right:10px;">✅ Selesai</button>
        <button type="button" class="btn btn-danger" onclick="document.getElementById('uploadModal').style.display='none'">❌ Batal</button>
      </div>
    </form>
  </div>
</div>

  </div>
</section>
<script>
function goToHome() {
  alert('Terimakasih telah berbelanja!');
  window.location.href = `index.php`;
  return false; 
}
</script>
</body>
</html>
