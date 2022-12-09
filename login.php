<?php 
session_start();
include 'koneksi.php';

//cek koneksi
if (mysqli_connect_errno()) {
	echo "Koneksi database gagal : " . mysqli_connect_error();
}
?>
<!DOCTYPE html>
<html>
<head>
	<title>Login pelanggan</title>
		<link rel="stylesheet" href="admin/assets/bower_components/bootstrap/dist/css/bootstrap.min.css">	
</head>
<body>
<br><br><br><br><br><br>
	<div class="container">
		<div class="row">
			<div class="col-md-4">
				<div class="panel panel-default">
					<div class="panel-heading">
						 <div class ="panel-title text-center">
						 <label>MY SHOP | LOGIN</label> 
					</div>
					<div class="panel-body">
						<form method="post">
							<div class="form-grup">
								<label>Email</label>
								<input type="email" class="form-control" name="email">
							</div>
							<div class="form-grup">
								<label>Password</label>
								<input type="password" class="form-control" name="password">
							</div><br>	
							<button class="btn btn-primary" name="simpan">LOGIN</button>
							<p>Daftar Sebagai Pelanggan? <a href="daftar.php" style="text-decoration: none; "><b>Daftar</b></a></p>
						</form>
					</div>
				</div>
			</div>
		</div>
	</div>


	<?php 
		//jk ada tombol simpan(tombol simpan ditekan)
	if (isset($_POST['simpan'])) 
	{
		$email = $_POST['email'];
		$password = $_POST['password'];
		// lakukan query ngecek akun di tabel pelanggan di db
		$ambil = $koneksi->query("SELECT * from pelanggan
			where email_pelanggan='$email' and password_pelanggan='$password'");

		//ngitung akun yg terambil
		$akunygcocok = $ambil->num_rows;

		// jk 1 akun yg cocok, maka dilogikakan
		if ($akunygcocok==1) 
		{
			// anda sudah login
			// mendapatkan akun dlm bentuk array
			$akun = $ambil->fetch_assoc();
			//simpan di session pelanggan
			$_SESSION["pelanggan"] = $akun;
			echo "<script>alert('anda sukses login');</script>";
			echo "<script>location='index.php'</script>";
		}
		else{
			//anda gagal login
			echo "<script>alert('anda gagal login, periksa kembali akun Anda');</script>";
			echo "<script>location='login.php'</script>";
		} 
	}
	 ?>

</body>
</html>