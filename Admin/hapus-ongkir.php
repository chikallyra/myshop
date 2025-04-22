<?php

$koneksi->query("DELETE FROM ongkir WHERE id_ongkir = '$_GET[id]'");

echo "<script> location='index.php?halaman=ongkir'; </script>";

?>