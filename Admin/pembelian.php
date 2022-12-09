<h2>Data Pembelian</h2>

<table class="table table-bordered"> 
	<thead>
		<tr>
		<td>No</td>
		<td>Nama Pembeli</td>
		<td>Tanggal</td>
		<td>Total</td>
		<td>Opsi</td>
		</tr>
	</thead>
	<tbody>
		<?php  
		$no=1;
		$ambil = mysqli_query($koneksi, "SELECT * from pembelian join pelanggan on pembelian.id_pelanggan=pelanggan.id_pelanggan");
		while($d = mysqli_fetch_array($ambil)){
		?>
		<tr>
			<td><?php echo $no++; ?></td>
			<td><?php echo $d['nama_pelanggan']; ?></td>
			<td><?php echo $d['tanggal_pengembalian']; ?></td>
			<td><?php echo $d['total_pengembalian']; ?></td>
			<td>
				<a href="index.php?halaman=detail&id=<?php echo $d['id_pembelian'] ?>" class="btn btn-info">detail</a>
			</td>
		</tr>
		<?php } ?>
	</tbody>
</table>