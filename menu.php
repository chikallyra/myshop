<!-- navbar -->
<nav class="navbar navbar-default" style="background-color: #f8f2ed; border-bottom: 2px solid #e5d2b3;">
  <div class="container">
    <div class="navbar-header">
      <a class="navbar-brand" href="index.php" style="color: #7b3e19; font-weight: bold;">🍽 eUntamin</a>
    </div>
    <ul class="nav navbar-nav">
      <li><a href="index.php">Home</a></li>
      <li><a href="keranjang.php">Keranjang</a></li>
      <li><a href="checkout.php">Checkout</a></li>
    </ul>

    <ul class="nav navbar-nav navbar-right">
      <?php if (isset($_SESSION['pelanggan'])): ?>
        <li><a href="logout.php" onclick="return confirm('Apakah Anda yakin ingin logout?')">Logout</a></li>
      <?php else: ?>
        <li><a href="daftar.php">Daftar</a></li>
        <li><a href="login.php">Login</a></li>
      <?php endif; ?>
    </ul>
  </div>
</nav>
