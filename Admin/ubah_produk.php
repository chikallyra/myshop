<h2 class="text-center">Ubah Produk</h2>
<?php
$ambil = $koneksi->query("SELECT * FROM produk WHERE id_produk = '$_GET[id]'");
$pecah = $ambil->fetch_assoc();
?>
<pre><?php print_r($pecah); ?></pre>
<form method="POST" enctype="multipart/form-data" action="edit-produk.php">
	<div class="form-group">
		<input type="hidden" name="id" class="form-control" value="<?php echo $pecah['id_produk']?>">
		<label> Nama Produk </label>
		<input type="text" name="nama" class="form-control" value="<?php echo $pecah['nama_produk']?>">
		<label> Harga Produk </label>
		<input type="text" name="harga" class="form-control" value="<?php echo $pecah['harga_produk']?>">
		<label> Kategori </label>
		<select name="kategori" class="form-control" id="">
			<option value="berat">Makanan Berat</option>
			<option value="ringan">Makanan Ringan</option>
		</select>
		<label> Deskripsi Produk </label>
		<input type="text" name="deskripsi" class="form-control" value="<?php echo $pecah['deskripsi_produk']?>">
		<label> Gambar </label>
		<input type="file" name="gambar" class="form-control" value="<?php echo $pecah['foto_produk']?>">
		<img src="../foto_produk/<?php echo $pecah['foto_produk']; ?>">
		<input type="submit" name="submit" class="form-control">
	</div>
</form>

<?php

if(isset($_POST['submit'])) { 
	$id = $_POST['id_produk'];
	$foto = $_FILES['foto']['name'];
	$lokasi = $_FILES['foto']['tmp_name'];
	move_uploaded_file($lokasi, "../foto_produk/". $nama);
	$nama = $_POST['nama'];
	$harga = $_POST['harga'];
	$berat = $_POST['berat'];
	$deskripsi = $_POST['deskripsi'];

	$koneksi->query("UPDATE produk SET nama_produk = '$nama', harga_produk = '$harga', berat_produk = '$berat', 
									   foto_produk ='$foto', deskripsi_produk = '$deskripsi' WHERE id_produk = '$id'");
  
   echo "<br><div class='alert alert-success text-center'> Data Berhasil Di Simpan </div>";
   echo "<meta http-equiv='refresh' content='1;url=index.php?halaman=produk'>";
  
  } 
?>