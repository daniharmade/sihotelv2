<?php
  if(@$_SESSION['username']!=""){
?>
<div class="site-blocks-cover overlay" style="background-image: url(images/trivenazi.jpg);" data-aos="fade" data-stellar-background-ratio="0.5">
	<div class="container">
		<div class="row align-items-center justify-content-center">
			<div class="col-md-7 text-center" data-aos="fade">
				<span class="caption mb-3">Silahkan Isi Untuk melakukan cetak Pembayaran Dibawah ini!!!</span>
				<h1 class="mb-4">Cetak Pembayaran</h1>
			</div>
		</div>
	</div>
</div>
<div class="site-section site-section-sm">
	<div class="container">
		<div class="row">
			
			<div class="col-md-12 col-lg-8 mb-5">
				
				
				
				<form enctype="multipart/form-data" action="" method="post" class="p-5 bg-white">
					<table width="100%" border="1" class="table table-bordered table-striped">
						<tr>
						<th>No</th> 
						<th>id konfirmasi</th>
						<th>id pelanggan</th>
						<th>bank</th>
						<th>Jumlah Transfer</th>
						<th>Aksi</th>
					</tr>
			<?php 
				include 'koneksi.php';
				$sql= mysqli_query($conn,"select * from konfirmasi where id_pelanggan='$_SESSION[id_pelanggan]' and status='Y'");
				$no=1;
				while($data=mysqli_fetch_array($sql)){
			?>
					<tr>
						<td align="center"><?php echo $no; ?></td>
						<td align="center"><?php echo $data['id_konfirmasi'] ?> </td>
						<td align="center"><?php echo $data['id_pelanggan'] ?> </td>
						<td align="center"><?php echo $data['bank'] ?> </td>
						<td align="center"><?php echo $data['jumlah_transfer'] ?> </td>
						<td align="center">
						<a  type="submit" href="cetakpembayaran.php?id_konfirmasi=<?php echo $data['id_konfirmasi'];?>" target="_blank" class="btn btn-success">Cetak Pembayaran</a>
			</td>
			</tr>
			<?php
				$no++; 
				}
			?>
		</table>

<?php
}else{

	 echo "<script>alert('Silahkan Login Terlebih Dahulu atau registrasi terlebih dahulu!');
           window.location='index.php?page=login';</script>";
}
?>
					
				</form>
			</div>
			<div class="col-lg-4">
				<div class="p-4 mb-3 bg-white">
					<h3 class="h5 text-black mb-3">Contact Info</h3>
					<p class="mb-0 font-weight-bold">Address</p>
					<p class="mb-4">Jl. Tuanku Tambusai, Delima, Kec. Tampan, Kota Pekanbaru, Riau 28290</p>
					<p class="mb-0 font-weight-bold">Phone</p>
					<p class="mb-4"><a href="#">(0751) 962177</a></p>
					<p class="mb-0 font-weight-bold">Email Address</p>
					<p class="mb-0"><a href="#">infotrivenazi@gmail.com</a></p>
				</div>
				
				
			</div>
		</div>
	</div>
</div>
