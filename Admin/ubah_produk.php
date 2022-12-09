<h2 class="text-center">Ubah Produk </h2>
<?php
$ambil = $koneksi->query("SELECT * FROM produk WHERE id_produk = '$_GET[id]'");
$pecah = $ambil->fetch_assoc();
?>
<pre><?php print_r($pecah); ?></pre>
<form method="POST" enctype="multipart/form-data">
	<div class="form-group">
		<label> Nama Produk </label>
		<input type="text" name="nama" class="form-control" value="<?php echo $pecah['nama_produk']?>">
	</div>
</form>