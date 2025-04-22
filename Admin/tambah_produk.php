<h2 class="text-center"> Tambah Produk </h2>

<form method="POST" enctype="multipart/form-data">
	<div class="form-group">
		<label for="Nama"> Nama </label>
		<input type="text" class="form-control"name="nama">
	</div>
	<div class="form-group">
		<label for="Harga"> Harga (Rp) </label>
		<input type="number" class="form-control"name="harga">
	</div>
	<div class="form-group">
		<label for="Berat"> Kategori </label>
		<select name="kategori" class="form-control" id="">
			<option value="berat">Makanan Berat</option>
			<option value="ringan">Makanan Ringan</option>
		</select>
	</div>
	<div class="form-group">
		<label for="Deskripsi"> Deskripsi </label>
		<textarea name="deskripsi" id="deskripsi" cols="30" rows="5" class="form-control"></textarea>
	</div>
	<div class="form-group">
		<label for="foto"> Foto </label>
		<input type="file" class="form-control" name="foto">
	</div>
	<a href="index.php?halaman=produk" class="btn btn"> Kembali </a>
	<button class="btn btn-primary" name="save"> Simpan</button>
	
</form>

<?php

if(isset($_POST['save'])) { 
	$foto = $_FILES['foto']['name'];
	$lokasi = $_FILES['foto']['tmp_name'];
	move_uploaded_file($lokasi, "../foto_produk/". $foto);
	$nama = $_POST['nama'];
	$harga = $_POST['harga'];
	$kategori = $_POST['kategori'];
	$deskripsi = $_POST['deskripsi'];

	$koneksi->query("INSERT INTO produk (nama_produk, harga_produk, kategori, deskripsi_produk, foto_produk) 
					VALUES ('$nama', '$harga', '$kategori', '$deskripsi', '$foto')");
  
  echo "<script>
  alert('Data berhasil disimpan!');
  window.location.href = 'index.php?halaman=produk';
  </script>";
  exit;
  
  } 
?>

