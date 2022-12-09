	<?php 
	include 'koneksi.php';
	?>
	<!DOCTYPE html>
	<html>
	<head>
		<meta charset="utf-8">
		<title>MY Shops | Nota </title>
		<link rel="stylesheet" href="admin/assets/bower_components/bootstrap/dist/css/bootstrap.min.css">
	</head>
	<body>

		
	<?php include "menu.php"; ?>



	<section class="konten">
		<div class="container">

			<h2> Nota Pembelian </h2>
	<?php
	$ambil = $koneksi->query("SELECT * FROM pembelian JOIN pelanggan ON pembelian.id_pelanggan = pelanggan.id_pelanggan WHERE pembelian.id_pembelian = '$_GET[id]'");
	$detail = $ambil->fetch_assoc(); 
	?>
	<pre><?php print_r($detail); ?></pre>	

	
	<p>
	 										<!-- typo lagi --> <!-- harusnya pembelian --> 
	</p>	
	<div class="row">
			<div class="col-md-4"></div>
			<h3>Pembelian</h3>
			<strong>No. Pembelian : <?php echo $detail['id_pembelian']; ?></strong><br>
											<!-- typo lagi --> <!-- harusnya pembelian --> 
			Tanggal : <?php echo $detail['tanggal_pengembalian'];?> <br>           <!-- typo lagi -->	 <!-- harusnya pembelian -->   
			Total : Rp.  <?php echo number_format($detail['total_pengembalian']);  ?> <br>
			<div class="col-md-4">

				<h3>Pelanggan</h3>
				<strong>Nama : <?php echo $detail['nama_pelanggan']; ?></strong> <br> <p>
		Telepon : <?php echo $detail['telpon_pelanggan']; ?> <br>
		Email : <?php echo $detail['email_pelanggan']; ?>
	</p>	

			</div>	
			<div class="col-md-4"> 
				<h3>Pengiriman</h3>
				<strong>Kab. / Kota : <?php echo $detail['nama_kota']; ?></strong> <br>
				Ongkir : <?php echo $detail['tarif'];  ?> <br>
				Alamat : <?php echo $detail['alamat_pengiriman']; ?> 
			</div>

	</div>




	<table class="table table-bordered text-center">
		<thead>
			<tr>
				<th class="text-center"> No. </th>
				<th class="text-center"> Nama Produk </th>	
				<th class="text-center"> Harga Produk </th>
				<th class="text-center"> Berat Produk </th>
				<th class="text-center"> Jumlah </th>
				<th class="text-center"> Subharga </th>
				<th class="text-center"> Subberat </th>
			</tr>	
		</thead>
		<tbody>
			<?php $nomor = 1; ?>
			<?php $ambil =  $koneksi->query("SELECT * FROM pembelian_produk WHERE id_pembelian = '$_GET[id]'");  ?>
			<?php while ($pecah = $ambil->fetch_assoc()) { ?>
			<tr>
				<td><?php echo $nomor; ?> </td>
				<td><?php echo $pecah['nama']; ?></td>
				<td> Rp. <?php echo number_format($pecah['harga']); ?></td>
				<td><?php echo $pecah['berat']; ?>Gr.</td>
				<td><?php echo $pecah['jumlah']; ?></td>
				<td> Rp. <?php echo number_format($pecah['subharga']);?></td>
				<td><?php echo $pecah['subberat']; ?>Gr. </td>

			</tr>
			<?php } ?>
			<?php $nomor++;  ?>
		</tbody>
	</table>
			
	<div class="row">
		<div class="col-md-6 alert alert-success">
			<p>Silahkan Lakukan Pembayaran Rp.  <?php echo number_format($detail['total_pengembalian']);  ?> Ke <br>
	<strong>1. ATM BCA 2831735998  an TRI PUTRA SATRIAWAN (foto bukti / struk) <br>

	2. VIA GOPAY CUSTOMER( ke alfamart- bilang kasir isi gopay customer - (kasih nomer 081563939538 an Putra - SELESAI - FOTO BUKTI)<br>

	3. VIA OVO CUSTOMER ( ke alfamart- bilang kasir isi ovo cutomer - (kasih nomer 081563939538 an Tri Putra Satriawan- SELESAI - FOTO BUKTI)
	</strong>
			</p>
		</div>
	</div>
		</div>
		
	</section>
	</body>
	</html>	
