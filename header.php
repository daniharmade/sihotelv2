<?php
session_start();
include('koneksi.php'); // Koneksi database
$page = isset($_GET['page']) ? $_GET['page'] : 'home';
?>

<div class="site-navbar-wrap js-site-navbar bg-white">
  <div class="container">
    <div class="site-navbar bg-black">
      <div class="py-1">
        <div class="row align-items-center">
          <div class="col-2">
            <h2 class="mb-0 site-logo"><a href="index.php"><img src="images/logo_trivenazi.png" width="150" height="75"></a></h2>
          </div>
          <div class="col-10">
            <nav class="site-navigation text-right" role="navigation">
              <div class="container">
                <div class="d-inline-block d-lg-none ml-md-0 mr-auto py-3"><a href="#" class="site-menu-toggle js-menu-toggle"><span class="icon-menu h3"></span></a></div>
                <ul class="site-menu js-clone-nav d-none d-lg-block">
                  <li class="<?= ($page == 'home') ? 'active' : ''; ?>"><a href="index.php">Home</a></li>
                  <li class="<?= ($page == 'about') ? 'active' : ''; ?>"><a href="?page=about">About</a></li>
                  <li class="has-children <?= ($page == 'fasilitas') ? 'active' : ''; ?>">
                    <a href="?page=fasilitas">Facilities</a>
                    <ul class="dropdown arrow-top">
                      <?php
                      $result = mysqli_query($conn, "SELECT * FROM fasilitas");
                      if (mysqli_num_rows($result) > 0) {
                        while ($value = mysqli_fetch_assoc($result)) {
                          echo "<li><a href='?page=fasilitas&jenis={$value['jenis']}'>{$value['jenis']}</a></li>";
                        }
                      } else {
                        echo "<li>No facilities available</li>";
                      }
                      ?>
                    </ul>
                  </li>
                  <li class="has-children <?= ($page == 'kamar') ? 'active' : ''; ?>">
                    <a href="?page=kamar">Room</a>
                    <ul class="dropdown arrow-top">
                      <?php
                      $result = mysqli_query($conn, "SELECT Jenis FROM kamar");
                      while ($value = mysqli_fetch_assoc($result)) {
                        echo "<li><a href='?page=kamar&jenis={$value['Jenis']}'>{$value['Jenis']}</a></li>";
                      }
                      ?>
                    </ul>
                  </li>
                  <li class="has-children <?= ($page == 'reservasi') ? 'active' : ''; ?>">
                    <a href="?page=reservasi">Pesan</a>
                    <ul class="dropdown arrow-top">
                      <li class="<?= ($page == 'reservasi') ? 'active' : ''; ?>"><a href="?page=reservasi">Booking</a></li>
                      <li class="<?= ($page == 'konfirmasi_pembayaran') ? 'active' : ''; ?>"><a href="?page=konfirmasi_pembayaran">Konfirmasi Pembayaran</a></li>
                      <li class="<?= ($page == 'cetak') ? 'active' : ''; ?>"><a href="?page=cetak">Cetak Pembayaran</a></li>
                    </ul>
                  </li>
                  <li class="has-children <?= ($page == 'kegiatan') ? 'active' : ''; ?>">
                    <a href="?page=kegiatan">Kegiatan</a>
                    <ul class="dropdown arrow-top">
                      <li class="<?= ($page == 'event') ? 'active' : ''; ?>"><a href="?page=event">Event</a></li>
                      <li class="<?= ($page == 'gallery') ? 'active' : ''; ?>"><a href="?page=gallery">Gallery</a></li>
                    </ul>
                  </li>
                  <li class="<?= ($page == 'contact') ? 'active' : ''; ?>"><a href="?page=contact">saran</a></li>
                  <?php if (!isset($_SESSION["username"]) || $_SESSION["username"] == "") { ?>
                    <li class="has-children <?= ($page == 'kegiatan') ? 'active' : ''; ?>">
                      <a href="?page=kegiatan">Daftar/Login</a>
                      <ul class="dropdown arrow-top">
                        <li class="<?= ($page == 'login') ? 'active' : ''; ?>"><a href="?page=login">Login</a></li>
                        <li class="<?= ($page == 'register') ? 'active' : ''; ?>"><a href="?page=register">Register</a></li>
                      </ul>
                    </li>
                  <?php } else { ?>
                    <li><a href="logout.php">Logout</a></li>
                  <?php } ?>
                </ul>
              </div>
            </nav>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>