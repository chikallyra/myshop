<?php include 'koneksi.php'; ?>
<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <title>euntamin | Daftar</title>
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
      padding: 15px;
      border-bottom: 1px solid #e2d3b3;
    }
    .panel-title {
      font-size: 20px;
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
    textarea.form-control {
      resize: none;
    }
  </style>
</head>
<body>
<?php include 'menu.php'; ?>

<div class="container" style="margin-top: 80px"> 
  <div class="row">
    <div class="col-md-8 col-md-offset-2">
      <div class="panel panel-default">
        <div class="panel-heading text-center">
          <h3 class="panel-title"><b>📝 Daftar Akun Pelanggan</b></h3>
        </div>
        <div class="panel-body">
          <form method="POST" class="form-horizontal">
            <div class="form-group">
              <label class="col-md-3 control-label">Nama</label>
              <div class="col-md-6">
                <input type="text" class="form-control" name="nama" required>
              </div>
            </div>
            <div class="form-group">
              <label class="col-md-3 control-label">Email</label>
              <div class="col-md-6">
                <input type="email" class="form-control" name="email" required>
              </div>
            </div>
            <div class="form-group">
              <label class="col-md-3 control-label">Password</label>
              <div class="col-md-6">
                <input type="password" class="form-control" name="password" required>
              </div>
            </div>
            <div class="form-group">
              <label class="col-md-3 control-label">Konfirmasi Password</label>
              <div class="col-md-6">
                <input type="password" class="form-control" name="password2" required>
              </div>
            </div>
            <div class="form-group">
              <label class="col-md-3 control-label">Alamat</label>
              <div class="col-md-6">
                <textarea name="alamat" rows="2" class="form-control" required></textarea>
              </div>
            </div>
            <div class="form-group">
              <label class="col-md-3 control-label">No. Telepon</label>
              <div class="col-md-6">
                <input type="text" class="form-control" name="telpon" required>
              </div>
            </div>
            <div class="form-group">
              <div class="col-md-6 col-md-offset-3">
                <button class="btn btn-primary btn-block btn-lg" name="daftar">Daftar Sekarang</button>
              </div>
            </div>
          </form>

          <?php
          if (isset($_POST['daftar'])) {
            $nama = $_POST['nama'];
            $email = $_POST['email'];
            $password = $_POST['password'];
            $password2 = $_POST['password2'];
            $telpon = $_POST['telpon'];
            $alamat = $_POST['alamat'];

            $ambil = $koneksi->query("SELECT * FROM pelanggan WHERE email_pelanggan = '$email'");
            $cocok = $ambil->num_rows;
            if ($cocok == 1) {
              echo "<script>alert('Pendaftaran gagal, email sudah digunakan.');</script>";
              echo "<script>location='daftar.php';</script>";
            } elseif ($password != $password2) {
              echo "<script>alert('Konfirmasi password tidak cocok.');</script>";
              echo "<script>location='daftar.php';</script>";
            } else {
              $koneksi->query("INSERT INTO pelanggan(email_pelanggan, password_pelanggan, nama_pelanggan, telpon_pelanggan, alamat_pelanggan) VALUES('$email', '$password','$nama', '$telpon' , '$alamat')");
              echo "<script>alert('Pendaftaran berhasil, silakan login.');</script>";
              echo "<script>location='login.php';</script>";
            }
          }
          ?>

        </div>
      </div>
    </div>
  </div>
</div>

</body>
</html>
