<div class="slide-one-item home-slider owl-carousel">
  <?php
  $sql = mysqli_query($conn, "SELECT * FROM slider");
  foreach ($sql as $key => $value) {
  ?>
    <div class="site-blocks-cover overlay" style="background-image: url(images/<?= $value['gambar']; ?>);" data-aos="fade" data-stellar-background-ratio="0.5">
      <div class="container">
        <div class="row align-items-center justify-content-center">
          <div class="col-md-7 text-center" data-aos="fade">
            <h1 class="mb-2"><?= $value['deskripsi1'] ?></h1>
            <h2 class="caption"><?= $value['deskripsi2']; ?></h2>
          </div>
        </div>
      </div>
    </div>
  <?php
  }
  ?>
</div>
<div class="site-section block-15">
  <div class="container">
    <div class="row">
      <div class="col-md-6 mx-auto text-center mb-5 section-heading">
        <h2>Kamar Tersedia</h2>
      </div>
    </div>
    <div class="nonloop-block-15 owl-carousel">

      <?php
      $sql = mysqli_query($conn, "SELECT galeri.*,kamar.* FROM galeri INNER JOIN kamar ON kamar.No_Kamar = galeri.No_Kamar");
      foreach ($sql as $value) {
      ?>
        <div class="media-with-text p-md-5">
          <div class="img-border-sm mb-4">
            <a href="<?php echo "?page=kamar&jenis={$value['Jenis']}"; ?>" class="popup-vimeo image-play">
              <img src="admin/<?= $value['gambar']; ?>" alt="" class="img-fluid">
            </a>
          </div>
          <h2 class="heading mb-0">
            <a href="<?php echo "?page=kamar&jenis={$value['Jenis']}"; ?>"><?= $value['Jenis']; ?>
            </a>
          </h2>
          <p><?= $value['deskripsi']; ?></p>
        </div>
      <?php
      }
      ?>

    </div>
  </div>
</div>

<div class="site-section">
  <div class="container">
    <div class="row">
      <div class="col-md-6 mx-auto text-center mb-5 section-heading">
        <h2 class="mb-5">Fasilitas Tambahan Hotel</h2>
      </div>
    </div>
    <div class="row">
      <div class="col-sm-4 col-md-4 col-lg-4">
        <div class="text-center p-4 item">
          <span class="flaticon-pool display-3 mb-3 d-block text-primary"></span>
          <h2 class="h5">Kolam Renang</h2>
        </div>
      </div>
      <div class="col-sm-4 col-md-4 col-lg-4">
        <div class="text-center p-4 item">
          <span class="flaticon-desk display-3 mb-3 d-block text-primary"></span>
          <h2 class="h5">Resepsionis</h2>
        </div>
      </div>
      <div class="col-sm-4 col-md-4 col-lg-4">
        <div class="text-center p-4 item">
          <span class="flaticon-exit display-3 mb-3 d-block text-primary"></span>
          <h2 class="h5">Keluar</h2>
        </div>
      </div>
      <div class="col-sm-4 col-md-4 col-lg-4">
        <div class="text-center p-4 item">
          <span class="flaticon-parking display-3 mb-3 d-block text-primary"></span>
          <h2 class="h5">Parkir Mobil</h2>
        </div>
      </div>
      <div class="col-sm-4 col-md-4 col-lg-4">
        <div class="text-center p-4 item">
          <span class="flaticon-minibar display-3 mb-3 d-block text-primary"></span>
          <h2 class="h5">Minibar</h2>
        </div>
      </div>
      <div class="col-sm-4 col-md-4 col-lg-4">
        <div class="text-center p-4 item">
          <span class="flaticon-cab display-3 mb-3 d-block text-primary"></span>
          <h2 class="h5">Mobil Ke Bandara</h2>
        </div>
      </div>



    </div>
  </div>
</div>


<div class="site-section">
  <div class="container">
    <div class="row">
      <div class="col-md-6 mx-auto text-center mb-5 section-heading">
        <h2 class="mb-5">Galeri Lainnya</h2>
      </div>
    </div>
    <div class="row no-gutters">
      <?php
      $sql = mysqli_query($conn, "SELECT * FROM galeri");
      foreach ($sql as $value) {
      ?>
        <div class="col-md-6 col-lg-3">
          <a href="images/<?= $value['gambar']; ?>" class="image-popup img-opacity"><img src="images/<?= $value['gambar']; ?>" alt="Image" class="img-fluid"></a>
        </div>
      <?php
      }
      ?>
    </div>
  </div>
</div>
<div class="site-section block-14 bg-light">
  <div class="container">

    <div class="row">
      <div class="col-md-6 mx-auto text-center mb-5 section-heading">
        <h2>Komentar Pengunjung</h2>
      </div>
    </div>
    <div class="nonloop-block-14 owl-carousel">
      <?php
      include "koneksi.php";
      $sql = mysqli_query($conn, "select * from saran");
      foreach ($sql as $saran) {

      ?>

        <div class="p-4">
          <div class="d-flex block-testimony">
            <div class="person mr-3">
              <img src="images/<?= $saran['gambar'] ?>" alt="Images" class="img-fluid rounded">
            </div>
            <div>
              <h2 class="h5"><?= $saran['nama'] ?></h2>
              <blockquote><?= $saran['pesan']  ?></blockquote>
            </div>
          </div>
        </div>
      <?php

      }

      ?>

    </div>
  </div>
</div>
<!-- <div class="py-5 quick-contact-info">
<div class="container">
<div class="row">
<div class="col-md-4 text-center">
<div>
  <span class="icon-room text-white h2 d-block"></span>
  <h2>Location</h2>
  <p class="mb-0">New York - 2398 <br>  10 Hadson Carl Street</p>
</div>
</div>
<div class="col-md-4 text-center">
<div>
  <span class="icon-clock-o text-white h2 d-block"></span>
  <h2>Service Times</h2>
  <p class="mb-0">Wednesdays at 6:30PM - 7:30PM <br>
    Fridays at Sunset - 7:30PM <br>
  Saturdays at 8:00AM - Sunset</p>
</div>
</div>
<div class="col-md-4 text-center">
<div>
  <span class="icon-comments text-white h2 d-block"></span>
  <h2>Get In Touch</h2>
  <p class="mb-0">Email: info@yoursite.com <br>
  Phone: (123) 3240-345-9348 </p>
</div>
</div>
</div>
</div>
</div> -->