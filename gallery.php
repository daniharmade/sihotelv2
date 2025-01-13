<div class="site-blocks-cover overlay" style="background-image: url(images/trivenazi.jpg);" data-aos="fade" data-stellar-background-ratio="0.5">
	<div class="container">
		<div class="row align-items-center justify-content-center">
			<div class="col-md-7 text-center" data-aos="fade">
				<span class="caption mb-3">Trivenazi Hotel &amp; Resort</span>
				<h1 class="mb-4">Gallery</h1>
			</div>
		</div>
	</div>
</div>
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