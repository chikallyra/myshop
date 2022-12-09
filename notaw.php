<?php 
	include 'koneksi.php';
	?>

<!DOCTYPE html>
<html>
<head>
	<title>MY SHOP | NOTA</title>
	<link rel="stylesheet" href="admin/assets/bower_components/bootstrap/dist/css/bootstrap.min.css">
</head>
<body>
	
<?php include "menu.php"; ?>

<section class="konten">
	<div class="container">
		


			<!---nota didisni copas saja yg ada di admin--->
				<h2>NOTA PEMBELIAN</h2>

<?php  
$ambil = $koneksi->query("SELECT * from pembelian join pelanggan 
	on pembelian.id_pelanggan=pelanggan.id_pelanggan
	where pembelian.id_pembelian='$_GET[id]'");
$detail = $ambil->fetch_assoc();
?>
<pre><?php print_r($detail); ?></pre>

<strong><?php  echo $detail['nama_pelanggan']; ?></strong>
<p>
	<?php echo $detail['telpon_pelanggan']; ?> <br>
	<?php echo $detail['email_pelanggan']; ?>
</p>

<p>
	tanggal : <?php echo $detail['tanggal_pengembalian']; ?> <br>
	total : <?php echo $detail['total_pengembalian']; ?>	
</p>

<table class="table table-bordered">
	<thead>
		<tr>
			<th>no</th>
			<th>nama produk</th>
			<th>harga</th>
			<th>jumlah</th>
			<th>subtotal</th>
		</tr>
	</thead>
	<tbody>
		<?php $no=1; ?>
		<?php $ambil = $koneksi->query("SELECT * from pembelian_produk join produk 
			on pembelian_produk.id_produk=produk.id_produk
			where pembelian_produk.id_pembelian='$_GET[id]'"); ?>
		<?php while($d = mysqli_fetch_array($ambil)){ ?>
			<tr>
				<td><?php echo $no++; ?></td>
				<td><?php echo $d['nama_produk']; ?></td>
				<td><?php echo $d['harga_produk']; ?></td>
				<td><?php echo $d['jumlah']; ?></td>
				<td>
					<?php echo $d['harga_produk']*$d['jumlah']; ?>
				</td>
			</tr>
		<?php } ?>
	</tbody>
</table>


	</div>
</section>

</body>
</html>