<h2 class="text-center">Data Ongkir</h2>
<table class="table table-boardered text-center">
	<thead>
		<tr>
			<th> No </th>
			<th> Nama Kota </th>
			<th> Tarif </th>
			<th> Aksi </th>
		</tr>		
	</thead>
	<tbody>
		<?php $nomor =1;  ?>
		<?php $ambil = $koneksi->query("SELECT * FROM ongkir"); ?>
		<?php while ($pecah = $ambil->fetch_assoc()){  ?>
		<tr>
			<td><?php echo $nomor; ?></td>
			<td><?php echo $pecah['nama_kota'];?></td>	
			<td>Rp.<?php echo number_format($pecah['tarif']);?></td>
			<td>
				<a href="index.php?halaman=ubah_ongkir&id=<?php echo $pecah['id_ongkir'] ?>" class="btn btn-primary"> Ubah </a>
				<a href="index.php?halaman=hapus_ongkir&id=<?php echo $pecah['id_ongkir']?>"
					onclick="return confirm('apakah anda yakin menghapus data ini ? ')"
				 class="btn btn-danger"> Hapus </a>
			</td>
		</tr>
		<?php $nomor++; ?>
	<?php } ?>
	</tbody>
</table>
<a href="index.php?halaman=tambah_ongkir" class="btn btn-primary"> [+] Tambah Produk</a>