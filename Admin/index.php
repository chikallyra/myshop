<?php include 'header.php';  ?>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">

    <!-- Main content -->
    <section class="content container-fluid">
<?php 
  
  if (isset($_GET['halaman'])) {
      if($_GET['halaman'] == "produk") {
        include 'produk.php';
      }elseif ($_GET['halaman'] == "pelanggan") {
        include 'pelanggan.php';
      }elseif ($_GET['halaman'] == "ongkir"){
        include 'ongkir.php';
      }elseif ($_GET['halaman'] == "pelanggan") {
        include 'pelanggan.php';
      }elseif ($_GET['halaman'] == "pembelian"){
        include 'pembelian.php';
      }elseif ($_GET['halaman'] == "detail") {
        include'detail.php'; 
      }elseif ($_GET['halaman'] == "tambah_produk") {
        include'tambah_produk.php'; 
      }elseif ($_GET['halaman'] == "hapus_produk") {
        include'hapus_produk.php'; 
      }elseif ($_GET['halaman'] == "ubah_produk") {
        include'ubah_produk.php'; 
      }elseif ($_GET['halaman'] == "tambah_ongkir") {
        include'tambah_ongkir.php'; 
      }elseif ($_GET['halaman'] == "hapus_ongkir") {
        include'hapus_ongkir.php'; 
      }elseif ($_GET['halaman'] == "ubah_ongkir") {
        include'ubah_ongkir.php'; 
      }elseif ($_GET['halaman'] == "logout") {
        include'logout.php'; }
        } else {
    include 'home.php'; }
 ?>

    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

  <!-- Main Footer -->
<?php include 'footer.php';  ?>  