<?php 
session_start();
// script koneksi
$koneksi = new mysqli("localhost","root","","tokoonline");
 ?>

<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
 <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>MYSHOPS | Log in</title>
<meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <link rel="stylesheet" href="assets/bower_components/bootstrap/dist/css/bootstrap.min.css">
  <link rel="stylesheet" href="assets/bower_components/font-awesome-4.7.0/css/font-awesome.min.css">
  <link rel="stylesheet" href="assets/bower_components/Ionicons/css/ionicons.min.css">
  <link rel="stylesheet" href="assets/dist/css/AdminLTE.min.css">
  <link rel="stylesheet" href="assets/plugins/iCheck/square/blue.css">
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
</head>
<body>
    <div class="hold-transition login-page">
        <div class="login-box">
            <div class="login-logo">

                <h2> MY | SHOP</h2>
               
                <h5>( Login untuk bisa masuk kehalaman MY | SHOP )</h5>
            </div>
        </div>
         <div class="row ">
               
                  <div class="col-md-4 col-md-offset-4 col-sm-6 col-sm-offset-3 col-xs-10 col-xs-offset-1">
                        <div class="panel panel-default">
                            <div class="panel-heading">
                        <strong><center>Login </center></strong>  
                            </div>
                            <div class="panel-body">
                                <form role="form" method="post">
                                       <br />
                                     <div class="form-group input-group">
                                            <span class="input-group-addon"><i class="fa fa-tag"  ></i></span>
                                            <input type="text" class="form-control" name="user" placeholder="username">
                                        </div>
                                                                              <div class="form-group input-group">
                                            <span class="input-group-addon"><i class="fa fa-lock"  ></i></span>
                                            <input type="password" class="form-control"  name="pass" placeholder="password">
                                        </div>
                                    <div class="form-group">
                                            <label class="checkbox-inline">
                                                <input type="checkbox" /> Simpan akun
                                            </label>
                                            <span class="pull-right">
                                                   <a href="#" >Lupa password ? </a> 
                                            </span>
                                        </div>
                                     
                                     <button class="btn btn-primary" name="login">Masuk</button>
                                    <hr />
                                    Belum punya akun ? <a href="registeration.html" >klik disini </a> 
                                    </form>
                                    <?php 
                                    if (isset($_POST['login'])) 
                                    {
                                      $ambil = $koneksi->query("SELECT * from admin where username='$_POST[user]'
                                        and password='$_POST[pass]'");
                                      $yangcocok = $ambil->num_rows;
                                      if ($yangcocok==1) {
                                        $_SESSION['admin']=$ambil->fetch_assoc();
                                        echo "<div class='alert alert-info'>Login success</div>";
                                        echo "<meta http-equiv='refresh' content='1;url=index.php'>";
                                      }
                                      else{
                                        echo "<div class='alert alert-danger'>Login failed</div>";
                                        echo "<meta http-equiv='refresh' content='1;url=login.php'>";
                                      }
                                    }
                                     ?>
                            </div>
                           
                        </div>
                    </div>
                
                
        </div>
    </div>


     <!-- SCRIPTS -AT THE BOTOM TO REDUCE THE LOAD TIME-->
    <!-- JQUERY SCRIPTS -->
    <script src="assets/js/jquery-1.10.2.js"></script>
      <!-- BOOTSTRAP SCRIPTS -->
    <script src="assets/js/bootstrap.min.js"></script>
    <!-- METISMENU SCRIPTS -->
    <script src="assets/js/jquery.metisMenu.js"></script>
      <!-- CUSTOM SCRIPTS -->
    <script src="assets/js/custom.js"></script>
   
</body>
</html>




