<?php
session_start();
include 'koneksi.php';
if ($_SESSION['username'] == "") {
  header("location:login.php");
}

// Ambil modul aktif dari URL
$module = isset($_GET['module']) ? $_GET['module'] : 'home';
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>ADMIN TRIVENAZI HOTEL</title>

  <link href="css/bootstrap.min.css" rel="stylesheet">
</head>

<body>
  <div class="container">

    <!-- Static navbar -->
    <div class="navbar navbar-inverse" role="navigation">
      <div class="container-fluid">
        <!--header saat mobile version-->
        <div class="navbar-header">
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target=".navbar-collapse">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href="#">SISTEM RESERVASI HOTEL</a>
        </div><!--end header saat mobile version-->

        <div class="navbar-collapse collapse">
          <ul class="nav navbar-nav">
            <li class="<?= $module == 'home' ? 'active' : '' ?>"><a href="index.php?module=home">HOME</a></li>
            <li class="<?= $module == 'tabelkamar' ? 'active' : '' ?>"><a href="index.php?module=tabelkamar">DATA KAMAR</a></li>
            <li class="<?= $module == 'tabeltamu' ? 'active' : '' ?>"><a href="index.php?module=tabeltamu">DATA TAMU</a></li>
            <li class="<?= $module == 'tabeltransaksi' ? 'active' : '' ?>"><a href="index.php?module=tabeltransaksi">DATA TRANSAKSI</a></li>
            <li class="<?= $module == 'konfirmasi' ? 'active' : '' ?>"><a href="index.php?module=konfirmasi">KONFIRMASI</a></li>
            <li class="dropdown <?= in_array($module, ['laporanperhari', 'laporanperbulan', 'laporanpertahun']) ? 'active' : '' ?>">
              <a href="#" class="dropdown-toggle" data-toggle="dropdown">LAPORAN <span class="caret"></span></a>
              <ul class="dropdown-menu" role="menu">
                <li class="<?= $module == 'laporanperhari' ? 'active' : '' ?>"><a href="index.php?module=laporanperhari">LAPORAN PERHARI</a></li>
                <li class="<?= $module == 'laporanperbulan' ? 'active' : '' ?>"><a href="index.php?module=laporanperbulan">LAPORAN PERBULAN</a></li>
                <li class="<?= $module == 'laporanpertahun' ? 'active' : '' ?>"><a href="index.php?module=laporanpertahun">LAPORAN PERTAHUN</a></li>
              </ul>
            </li>
            <!-- <li class="<?= $module == 'logout' ? 'active' : '' ?>"><a href="index.php?module=logout">LOGOUT</a></li> -->
          </ul>
        </div><!--/.nav-collapse -->
      </div><!--/.container-fluid -->
    </div>
    <?php
    include "content.php";
    ?>
  </div> <!-- /container -->
  <script src="js/jquery.js"></script>
  <script src="js/bootstrap.min.js"></script>
</body>

</html>
