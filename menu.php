<!-- navbar -->
<nav class="navbar navbar-default">
		<div class="container">
		<ul class="nav navbar-nav">
			<li><a href="index.php">Home</a></li>
			<li><a href="keranjang.php">Keranjang</a></li>
			<li><a href="checkout.php">Checkout</a></li>
			<!-- Jika Sudah Login (ada session pelanggan) -->
			<?php if (isset($_SESSION['pelanggan'])); ?>
		<li><a href="logout.php" onclick="return confrim('apakah anda yakin ingin Logout')">Logout</a></li>	
			<!-- Jika Belum login (tidak ada session pelanggan) -->
			<li><a href="daftar.php">Daftar</a></li>
			<li><a href="login.php">Login</a></li>
			

		</ul>
		</div>
</nav>
