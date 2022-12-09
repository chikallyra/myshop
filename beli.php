<?php
session_start();
//mendapatkan id_produk dari URL
$id_produk = $_GET['id'];

//jika produk sudah ada di keranjang, maka produk itu di tambah 1
if (isset($_SESSION['keranjang'][$id_produk])) {
	$_SESSION['keranjang'][$id_produk] += 1;

}else {
//selain itu (belum ada di keranjang),  maka produk itu di anggap di beli 1
	$_SESSION['keranjang'][$id_produk] = 1;
}	

// echo "<pre>";
// print_r($_SESSION);
// echo "</pre>";

//hubungkan ke keranjang.php
echo "<script>alert('Produk Telah Masuk Kedalam keranjang Belanja');</script>";
echo "<script>location='keranjang.php';</script>";
?>