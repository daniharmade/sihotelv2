<div class="site-blocks-cover overlay" style="background-image: url(images/trivenazi1.jpg);" data-aos="fade" data-stellar-background-ratio="0.5">
  <div class="container">
    <div class="row align-items-center justify-content-center">
      <div class="col-md-7 text-center" data-aos="fade">
        <span class="caption mb-3">Dari Kami</span>
        <h1 class="mb-4">Events</h1>
      </div>
    </div>
  </div>
</div>

<div class="site-section">
  <div class="container">
    <div class="row">
	<!-- -->
     <?php
      // $sql=mysqli_query($conn,"SELECT galeri.*,kamar.* FROM galeri INNER JOIN kamar ON kamar.No_Kamar = galeri.No_Kamar");
      // while($data = mysqli_fetch_array($sql)){
      ?>
	  <!-- -->
      <div class="col-md-6 col-lg-4 mb-5">
        <div class="media-with-text">
          <div class="img-border-sm mb-4">
            <a href="#" class="popup-vimeo image-play">
              <img src="images/Ballroom nikah1.jpg" alt="" class="img-fluid">
            </a>
          </div>
          <h2 class="heading mb-0"><a href="#">Ballroom Pernikahan Standar</a></h2>
          <p>Hiasan Untuk Ballroom Yang Terbilang Cukup Mewah Untuk Ukuran Standard Bagi Penyewa Gedung Untuk Hari Pernikahan.</p>
        </div>
      </div>
	  <div class="col-md-6 col-lg-4 mb-5">
        <div class="media-with-text">
          <div class="img-border-sm mb-4">
            <a href="#" class="popup-vimeo image-play">
              <img src="images/grand-ballroom nikah 2.jpg" alt="" class="img-fluid">
            </a>
          </div>
          <h2 class="heading mb-0"><a href="#">Ballroom Pernikahan VIP</a></h2>
          <p>Menampilkan Keindahan Yang sangat Mewah Dengan Susunan Meja Dan Kursi Yang di Tata Sedemikian Rupa</p>
        </div>
      </div>
	  <div class="col-md-6 col-lg-4 mb-5">
        <div class="media-with-text">
          <div class="img-border-sm mb-4">
            <a href="#" class="popup-vimeo image-play">
              <img src="images/trivenazinikah.jpg" alt="" class="img-fluid">
            </a>
          </div>
          <h2 class="heading mb-0"><a href="#">Menawarkan Brosur</a></h2>
          <p>Hotel Trivenazi Menawarkan Brosur Pernikahan, Sehingga Jikalau klien Ingin Memesan Ballrom Untuk Pesta pernikahan yang Mereka Impikan Dan Pemesanannyapun dapat dilakukan secara online.</p>
        </div>
      </div>
	  <div class="col-md-6 col-lg-4 mb-5">
        <div class="media-with-text">
          <div class="img-border-sm mb-4">
            <a href="#" class="popup-vimeo image-play">
              <img src="images/mercurenikah1.jpg" alt="" class="img-fluid">
            </a>
          </div>
          <h2 class="heading mb-0"><a href="#">Super VIP Ballroom</a></h2>
          <p>Keindahan Interior Yang di Susun Sedemikian Rupa Di Tambah Dengan Hiasan Bunga Dengan Warna Yang Sangat Cantik Dengan Cahaya Ungu Yang Membuat Tampilan Dari Ballroom ini Menampilkan Kesan yang Elegan</p>
        </div>
      </div>
	  <!-- --> 
      <?php
      // }
      ?>
	  <!-- -->
    </div>    </div>
	
<div class="site-section block-14 bg-light">
  <div class="container">
</div>
</div>

<!---- Gallery<-- -->
<?php
if(!isset($_GET['id']))
{
?>
<div class="site-section bg-light">
	<div class="container">
		<div class="row">
			<div class="col-md-6 mx-auto text-center mb-5 section-heading">
				<h2 class="mb-5">Gallery Hotel Trivenazi</h2>
			</div>
		</div>
		
		<div class="row">
		<?php 
		include "koneksi.php";
		$galeri = mysqli_query ($conn,"select * from galeri2 order by id_galeri2");
		while($sql = mysqli_fetch_array($galeri)){
		 
		?>
			<div class="col-md-4 col-lg-4 mb-6">
				<div class="hotel-room text-center">
					<a class="d-block mb-4 thumbnail"> 
					<a href="images/<?php echo$sql['gambar'] ?>"> 
					<img src="images/<?php echo $sql['gambar'] ?>" alt="Image" class="img-fluid"> </a>
					<div class="p-4">
						<h3 class="heading mb-3"><a href="?page=gallery&id=<?php echo $sql['id_galeri2'] ?>"> <?php echo $sql['nama'] ?></a></h3>
					</div>
				</div>
			</div>
			<?php 
		    } 
		    ?>
		</div>
		
	</div>
</div>
<?php
}else{
?>
<?php
}
