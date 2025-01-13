<div class="site-blocks-cover overlay" style="background-image: url(images/trivenazi.jpg);" data-aos="fade" data-stellar-background-ratio="0.5">
	<div class="container">
		<div class="row align-items-center justify-content-center">
			<div class="col-md-7 text-center" data-aos="fade">
				<span class="caption mb-3">About</span>
				<h1 class="mb-4">Detail Staff</h1>
			</div>
		</div>
	</div>
</div> 
  <div class="site-section">
	<div class="container">
	<?php 
						include "koneksi.php";
						$id=$_GET['id'];
						$about=mysqli_query($conn, "select * from staff where id_staff='$id'");
					    $sql=($about);
						$r=mysqli_fetch_array($sql)
					?>
		<div class="row align-items-center">
					
			<div class="col-md-6 mb-5 mb-md-0">
				
				<div class="img-border">
					<img src="images/<?php echo $r['gambar'] ?>" alt="" class="img-fluid">
				</div>
				
			</div>
			<div class="col-md-5 ml-auto">
				<div class="section-heading text-left"> 
				<div>
				     <h2 class="mb-5">Detail</h2>
				     <p>   <?php echo $r['nama'] ?>	</P>
			       	 <p> <?php echo $r['deskripsi'] ?>	</p>
			    </div>
			</div>
		</div>
	</div>
</div>
</div>
