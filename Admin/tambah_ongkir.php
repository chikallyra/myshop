<h2 class="text-center"> Tambah Produk </h2>

<form method="POST" enctype="multipart/form-data">
	<div class="form-group">
		<label for="Nama"> Nama Ekspedisi </label>
		<input type="text" class="form-control"name="nama">
	</div>
	<div class="form-group">
		<label for="Harga"> Harga (Rp) </label>
		<input type="number" class="form-control"name="harga">
	</div>
	<a href="index.php?halaman=produk" class="btn btn"> Kembali </a>
	<button class="btn btn-primary" name="save"> Simpan</button>
	
</form>

<?php

if(isset($_POST['save'])) { 
	$nama = $_POST['nama'];
	$harga = $_POST['harga'];

	$koneksi->query("INSERT INTO ongkir (nama_kota, tarif) 
					VALUES ('$nama', '$harga')");
  
  echo "<script>
  alert('Data berhasil disimpan!');
  window.location.href = 'index.php?halaman=ongkir';
  </script>";
  exit;
  
  } 
?>

