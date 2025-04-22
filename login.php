<?php 
session_start();
include 'koneksi.php';

if (mysqli_connect_errno()) {
  echo "Koneksi database gagal : " . mysqli_connect_error();
}
?>
<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <title>Login Pelanggan | euntamin</title>
  <link rel="stylesheet" href="admin/assets/bower_components/bootstrap/dist/css/bootstrap.min.css">
  <style>
    body {
      background-color: #fefcf9;
      font-family: 'Segoe UI', sans-serif;
    }
    .panel {
      border: 1px solid #e2d3b3;
      border-radius: 12px;
      box-shadow: 0 2px 10px rgba(0,0,0,0.05);
    }
    .panel-heading {
      background-color: #f5e5cc;
      border-bottom: 1px solid #e2d3b3;
    }
    .panel-title {
      font-size: 20px;
      font-weight: bold;
      color: #7b3e19;
    }
    .btn-primary {
      background-color: #7b3e19;
      border-color: #7b3e19;
    }
    .btn-primary:hover {
      background-color: #5c2a0a;
      border-color: #5c2a0a;
    }
    .form-control {
      border: 1px solid #e2d3b3;
    }
    .container {
      margin-top: 120px;
    }
  </style>
</head>
<body>

<div class="container">
  <div class="row justify-content-center">
    <div class="col-md-4 col-md-offset-4">
      <div class="panel panel-default">
        <div class="panel-heading text-center">
          <label class="panel-title">🍽 eUtanmin | LOGIN PELANGGAN</label>
        </div>
        <div class="panel-body">
          <form method="post">
            <div class="form-group">
              <label>Email</label>
              <input type="email" class="form-control" name="email" required>
            </div>
            <div class="form-group">
              <label>Password</label>
              <input type="password" class="form-control" name="password" required>
            </div>
            <div class="form-group text-center">
              <button class="btn btn-primary btn-block" name="simpan">🔐 LOGIN</button>
            </div>
            <p class="text-center">Belum punya akun? <a href="daftar.php" style="text-decoration: none;"><b>Daftar Sekarang</b></a></p>
          </form>
        </div>
      </div>
    </div>
  </div>
</div>

<?php 
if (isset($_POST['simpan'])) {
  $email = $_POST['email'];
  $password = $_POST['password'];
  $ambil = $koneksi->query("SELECT * FROM pelanggan WHERE email_pelanggan='$email' AND password_pelanggan='$password'");
  $akunygcocok = $ambil->num_rows;

  if ($akunygcocok == 1) {
    $_SESSION["pelanggan"] = $ambil->fetch_assoc();
    echo "<script>alert('Anda berhasil login');</script>";
    echo "<script>location='index.php';</script>";
  } else {
    echo "<script>alert('Login gagal, periksa kembali email dan password Anda');</script>";
    echo "<script>location='login.php';</script>";
  }
}
?>

</body>
</html>
