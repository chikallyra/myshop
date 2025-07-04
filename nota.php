<?php 
include 'koneksi.php';
?>
<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <title>euntamin| Nota</title>
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
    .alert-success {
      background-color: #f2e6d9;
      border-color: #e2d3b3;
      color: #5c3d1c;
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
    <h2 class="text-center">Nota Pembelian</h2>
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

    <div class="row text-left">
      <div class="col-md-4">
        <h3>Pembelian</h3>
        <p>No. Pembelian: EU - <strong><?php echo $detail['id_pembelian']; ?></strong><br>
        Tanggal: <?php echo $detail['tanggal_pengembalian']; ?><br>
        Total: Rp. <?php echo number_format($detail['total_pengembalian']); ?></p>
      </div>
      <div class="col-md-4">
        <h3>Pelanggan</h3>
        <p>Nama: <strong><?php echo $detail['nama_pelanggan']; ?></strong><br>
        Telepon: <?php echo $detail['telpon_pelanggan']; ?><br>
        Email: <?php echo $detail['email_pelanggan']; ?></p>
      </div>
      <div class="col-md-4">
        <h3>Pengiriman</h3>
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

    <div class="row">
  <div class="col-md-6 col-md-offset-3 alert alert-success text-center">
    <p>
      Silakan lakukan pembayaran sebesar <strong>Rp. <?php echo number_format($detail['total_pengembalian']); ?></strong><br><br>
      <strong>Metode Pembayaran:</strong><br>
      1. Rekening BCA a.n. Euntamin Shop – Upload bukti transfer saat konfirmasi<br>
      2. GoPay – Kirim ke nomor 0812-1111-2222 lalu upload bukti transfer<br>
      3. OVO – Kirim ke nomor 0821-3333-4464 lalu upload bukti transfer
    </p>
  </div>
</div>

	<!-- Tombol Upload -->
	<div class="row">
	<div class="col-md-6 col-md-offset-3 text-center">
	<button class="btn btn-warning" style="color: #fff; font-weight: bold;" onclick="document.getElementById('uploadModal').style.display='block'">
	📤 Upload Bukti Pembayaran
	</button>
	</div>
	</div>

<!-- Modal Upload Bukti -->
<div id="uploadModal" style="display:none; position:fixed; top:0; left:0; width:100%; height:100%; background:rgba(0,0,0,0.5); z-index:9999;">
  <div style="background:#fefcf9; width:420px; max-width:90%; margin:100px auto; padding:25px 20px; border-radius:12px; box-shadow:0 5px 15px rgba(0,0,0,0.2); position:relative;">
    <h4 class="text-center" style="color:#7b3e19; font-weight:bold;">Upload Bukti Pembayaran</h4>
    <hr style="border-top: 1px solid #d6ba9c;">
    <form onsubmit="return goToKuitansi()">
      <div class="form-group">
        <label style="color:#5c3d1c;">Pilih File Bukti Transfer:</label>
        <input type="file" id="bukti" class="form-control" required style="border: 1px solid #e2d3b3;">
      </div>
      <input type="hidden" id="idPembelian" value="<?php echo $detail['id_pembelian']; ?>">
      <div class="text-center">
        <button type="submit" class="btn btn-success" style="margin-right:10px;">✅ Kirim</button>
        <button type="button" class="btn btn-danger" onclick="document.getElementById('uploadModal').style.display='none'">❌ Batal</button>
      </div>
    </form>
  </div>
</div>


  </div>
</section>

<script>
function goToKuitansi() {
  const id = document.getElementById('idPembelian').value;
  // bisa validasi file di sini kalau perlu
  window.location.href = `kuitansi.php?id=${id}`;
  return false; // mencegah form submit default
}
</script>
</body>
</html>