<?php
if (!isset($_GET['jenis'])) {
?>
  <div class="site-blocks-cover overlay" style="background-image: url(images/trivenazi.jpg);" data-aos="fade" data-stellar-background-ratio="0.5">
    <div class="container">
      <div class="row align-items-center justify-content-center">
        <div class="col-md-7 text-center" data-aos="fade">
          <span class="caption mb-3">Luxurious Rooms</span>
          <h1 class="mb-4">Semua Kamar</h1>
        </div>
      </div>
    </div>
  </div>
  <div class="site-section bg-light">
    <div class="container">
      <div class="row">
        <div class="col-md-12 mx-auto text-center mb-5 section-heading">
          <h2 class="mb-5">Kamar yang Tersedia</h2>
        </div>
      </div>
      <!-- Display Images -->
      <div class="row">
        <?php
        $sql = mysqli_query($conn, "SELECT galeri.*, kamar.* FROM galeri INNER JOIN kamar ON kamar.No_Kamar = galeri.No_Kamar");

        // Check if query returned results
        if ($sql && mysqli_num_rows($sql) > 0) {
          foreach ($sql as $value) {
            $imagePath = "admin/" . $value['gambar'];
        ?>
            <div class="col-md-6 col-lg-4 mb-5">
              <div class="hotel-room text-center">
                <a>
                  <img src=" <?= file_exists($imagePath) ? $imagePath : "admin/images/$value[gambar]"; ?>" alt="Image" class="img-fluid">
                </a>
                <div class="hotel-room-body">
                  <a href="<?php echo "?page=kamar&jenis={$value['Jenis']}"; ?>">
                    <h3 class="heading mb-0">
                      <?= $value['Jenis']; ?>
                    </h3>
                    <strong class="price">Rp.<?= $value['Tarif']; ?> / per malam</strong><br>
                    <strong class="price"><?= $value['deskripsi']; ?> </strong>
                  </a>
                </div>
              </div>
            </div>
        <?php
          }
        } else {
          echo "<p>No rooms available</p>";
        }
        ?>
      </div>
    </div>
  </div>
<?php
} else {
?>
  <div class="site-blocks-cover overlay" style="background-image: url(images/trivenazi.jpg);" data-aos="fade" data-stellar-background-ratio="0.5">
    <div class="container">
      <div class="row align-items-center justify-content-center">
        <div class="col-md-7 text-center" data-aos="fade">
          <span class="caption mb-3">Luxurious Rooms</span>
          <h1 class="mb-4">Kamar Hotel</h1>
        </div>
      </div>
    </div>
  </div>
  <div class="site-section bg-light">
    <div class="container">
      <div class="row">
        <div class="col-md-6 mx-auto text-center mb-5 section-heading">
          <h2 class="mb-5">Kamar yang Tersedia</h2>
        </div>
      </div>
      <!-- Display Videos -->
      <div class="row">
        <?php
        $sql = mysqli_query($conn, "SELECT galeri.*, kamar.* FROM galeri INNER JOIN kamar ON kamar.No_Kamar = galeri.No_Kamar WHERE Jenis='$_GET[jenis]'");

        // Check if query returned results
        if ($sql && mysqli_num_rows($sql) > 0) {
          foreach ($sql as $value) {
            $imagePath = "admin/" . $value['gambar'];
            // $videoPath = $value['video'];
            $videoPath = "admin/" . $value['video'];
        ?>
            <div class="col-md-12 col-lg-12 mb-12">
              <div class="hotel-room text-center">
                <div class=" d-flex flex-column align-items-center">
                  <a href="#" class="d-block mb-5 thumbnail">
                    <img src="<?= file_exists($imagePath) ? $imagePath : 'admin/images/default.jpg'; ?>" alt="Image" class="img-fluid">
                  </a>
                  <video controls autoplay loop muted width="640" height="360">
                    <?php if (file_exists($videoPath)) { ?>
                      <source src="<?= $videoPath; ?>" type="video/mp4">
                      <source src="<?= $videoPath; ?>" type="video/webm">
                    <?php } else { ?>
                      Your browser does not support the video tag.
                    <?php } ?>
                  </video>
                </div>
                <div class="hotel-room-body">
                  <h3 class="heading mb-0"><a href="#"><?= $value['Jenis']; ?></a></h3>
                  <strong class="price">Rp.<?= $value['Tarif']; ?> / per malam</strong><br>
                  <strong class="price"><?= $value['deskripsi']; ?> </strong>
                </div>
              </div>
            </div>
        <?php
          }
        } else {
          echo "<p>No rooms available for this type</p>";
        }
        ?>
      </div>
    </div>
  </div>
<?php
}
?>