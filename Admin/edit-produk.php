<?php
include '../koneksi.php';

if(isset($_POST['submit'])) {
    $id = $_POST['id'];
    $nama = $_POST['nama'];
    $harga = $_POST['harga'];
    $kategori = $_POST['kategori'];
    $deskripsi = $_POST['deskripsi'];

    // Ambil data lama
    $ambil = $koneksi->query("SELECT foto_produk FROM produk WHERE id_produk = '$id'");
    $dataLama = $ambil->fetch_assoc();
    $fotoLama = $dataLama['foto_produk'];

    // Cek apakah ada file baru yang di-upload
    if(!empty($_FILES['gambar']['name'])) {
        $fotoBaru = $_FILES['gambar']['name'];
        $lokasi = $_FILES['gambar']['tmp_name'];
        move_uploaded_file($lokasi, "../foto_produk/". $fotoBaru);
    } else {
        $fotoBaru = $fotoLama;
    }

    // Update data
    $koneksi->query("UPDATE produk SET nama_produk = '$nama', harga_produk = '$harga', kategori = '$kategori',
                    foto_produk = '$fotoBaru', deskripsi_produk = '$deskripsi' 
                    WHERE id_produk = '$id'");
    echo "<script>
    alert('Data berhasil diubah!');
    window.location.href = 'index.php?halaman=produk';
    </script>";
    exit;
}
?>
