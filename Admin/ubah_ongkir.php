<h2 class="text-center">Ubah Ongkir</h2>
<?php
$ambil = $koneksi->query("SELECT * FROM ongkir WHERE id_ongkir = '$_GET[id]'");
$pecah = $ambil->fetch_assoc();
?>
<pre><?php print_r($pecah); ?></pre>
<form method="POST" enctype="multipart/form-data">
	<div class="form-group">
		<input type="hidden" name="id" class="form-control" value="<?php echo $pecah['id_ongkir']?>">
		<label> Nama Ekspedisi </label>
		<input type="text" name="nama" class="form-control" value="<?php echo $pecah['nama_kota']?>">
		<label> Tarif </label>
		<input type="text" name="tarif" class="form-control" value="<?php echo $pecah['tarif']?>">
		<input type="submit" name="submit" class="btn btn-primary">
	</div>
</form>

<?php

if(isset($_POST['submit'])) { 
	$id = $_POST['id'];
	$nama = $_POST['nama'];
	$tarif = $_POST['tarif'];

	$koneksi->query("UPDATE ongkir SET nama_kota = '$nama', tarif = '$tarif' WHERE id_ongkir = '$id'");
  
   echo "<br><div class='alert alert-success text-center'> Data Berhasil Di Simpan </div>";
   echo "<meta http-equiv='refresh' content='1;url=index.php?halaman=ongkir'>";
  
  } 
?>