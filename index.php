<!DOCTYPE html>
<html lang="id">
<head>
	<meta charset="UTF-8">
	<title>euntamin - Makanan Khas Nusantara</title>
	<link rel="stylesheet" href="admin/assets/bower_components/bootstrap/dist/css/bootstrap.min.css">
	<style>
		body {
			background: #fefcf9;
			font-family: 'Segoe UI', sans-serif;
		}
		h1 {
			margin-bottom: 30px;
			font-weight: bold;
			color: #7b3e19;
		}
		.kategori-title {
			margin-top: 40px;
			margin-bottom: 20px;
			border-bottom: 2px solid #ddd;
			padding-bottom: 5px;
			color: #5e320f;
		}
		.thumbnail {
			border-radius: 10px;
			overflow: hidden;
			box-shadow: 0 2px 8px rgba(0,0,0,0.05);
			transition: transform 0.3s ease;
		}
		.thumbnail:hover {
			transform: translateY(-5px);
		}
		.thumbnail img {
			height: 180px;
			object-fit: cover;
			width: 100%;
		}
		.caption h3 {
			font-size: 18px;
			margin: 10px 0 5px;
		}
		.caption h5 {
			color: #e67e22;
			margin-bottom: 10px;
		}
	</style>
</head>
<body>

<?php 
session_start();
include 'menu.php'; 
include 'koneksi.php';
if (!isset($_SESSION['pelanggan'])) {
    echo "<script>alert('Silahkan login terlebih dahulu.');</script>";
    echo "<script>location='login.php';</script>";
    exit;
}
?>

<section class="konten">
	<div class="container">
		<h1 class="text-center">Menu Khas Nusantara</h1>

		<h3 class="kategori-title">Makanan Berat</h3>
		<div class="row">
		<?php 
		$ambil = $koneksi->query("SELECT * FROM produk WHERE kategori='berat'");
		while($perproduk = $ambil->fetch_assoc()): ?>
			<div class="col-md-3 col-sm-6">
				<div class="thumbnail">
					<img src="foto_produk/<?php echo $perproduk['foto_produk']; ?>" alt="<?php echo $perproduk['nama_produk']; ?>">
					<div class="caption text-center">
						<h3><?php echo $perproduk['nama_produk']; ?></h3>
						<h5>Rp. <?php echo number_format($perproduk['harga_produk']); ?></h5>
						<a href="beli.php?id=<?php echo $perproduk['id_produk']; ?>" class="btn btn-success">Beli</a>
					</div>
				</div>
			</div>
		<?php endwhile; ?>
		</div>

		<h3 class="kategori-title">Makanan Ringan</h3>
		<div class="row">
		<?php 
		$ambil = $koneksi->query("SELECT * FROM produk WHERE kategori='ringan'");
		while($perproduk = $ambil->fetch_assoc()): ?>
			<div class="col-md-3 col-sm-6">
				<div class="thumbnail">
					<img src="foto_produk/<?php echo $perproduk['foto_produk']; ?>" alt="<?php echo $perproduk['nama_produk']; ?>">
					<div class="caption text-center">
						<h3><?php echo $perproduk['nama_produk']; ?></h3>
						<h5>Rp. <?php echo number_format($perproduk['harga_produk']); ?></h5>
						<a href="beli.php?id=<?php echo $perproduk['id_produk']; ?>" class="btn btn-success">Beli</a>
					</div>
				</div>
			</div>
		<?php endwhile; ?>
		</div>

	</div>
</section>

</body>
</html>
