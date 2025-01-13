<?php
  if(@$_SESSION['username']!=""){
?>
<div class="site-blocks-cover overlay" style="background-image: url(images/trivenazi.jpg);" data-aos="fade" data-stellar-background-ratio="0.5">
	<div class="container">
		<div class="row align-items-center justify-content-center">
			<div class="col-md-7 text-center" data-aos="fade">
				<span class="caption mb-3">pembayaran</span>
				<h1 class="mb-4">Form Pembayaran</h1>
			</div>
		</div>
	</div>
</div>
<div class="site-section site-section-sm">
	<div class="container">
		<div class="row">
			
			<div class="col-md-12 col-lg-8 mb-5">
<div class="row">
<div class="col-md-4"></div>
<div class="col-md-4">

		<form action="" method="post" enctype="multipart/form-data" name="form1" id="form1">
				<div class="form-group">
				<label >ID Pelanggan</label>
				<input type="text" class="form-control" name="id_pelanggan" value="<?php echo $_SESSION['id_pelanggan']; ?>"/>
				</div>
				<div class="form-group">
				<label >Nama</label>
				<input type="text" class="form-control" name="nama" value="<?php echo $_SESSION['nama']; ?>">
				</div>
				<div class="form-group">
				<label>Jumlah Transfer</label>
				<input type="text" class="form-control" name="jumlah_transfer">
				</div>
				<div class="form-group">
				<label>Bank</label>
				<input type="text" class="form-control" name="bank">
				<input type="hidden" class="form-control" name="status" value='T'>
				</div>
				<div class="form-group">
				<label>Gambar</label>
				<input type="file" class="form-control" name="gambar">
				

				</div>
				<div class="form-group">
				<input type="submit" name="submit" value="send konfirmasi" />
				</div>
				</form>
				</div>
			</div>
		</div>
	</div>
<div class="col-md-12"></div>
</div>

<?php
include "koneksi.php"; 
	 if(isset($_POST['submit'])){
		$nama=$_POST['id_pelanggan'];
		$jumlah_transfer=$_POST['jumlah_transfer'];
		$bank=$_POST['bank'];
		$status=$_POST['status'];
	
$nama_file = $_FILES['gambar']['name'];
$ukuran_file = $_FILES['gambar']['size'];
$tipe_file = $_FILES['gambar']['type'];
$tmp_file = $_FILES['gambar']['tmp_name'];
// Set path folder tempat menyimpan gambarnya
$path = "images/".$nama_file;
if($tipe_file == "image/jpeg" || $tipe_file == "image/png"){ // Cek apakah tipe file yang diupload adalah JPG / JPEG / PNG
  // Jika tipe file yang diupload JPG / JPEG / PNG, lakukan :
  if($ukuran_file <= 1000000){ // Cek apakah ukuran file yang diupload kurang dari sama dengan 1MB
    // Jika ukuran file kurang dari sama dengan 1MB, lakukan :
    // Proses upload
    if(move_uploaded_file($tmp_file, $path)){ // Cek apakah gambar berhasil diupload atau tidak
      // Jika gambar berhasil diupload, Lakukan :  
      // Proses simpan ke Database

	$sqlsimpan = mysqli_query($conn, "insert into konfirmasi (id_pelanggan,jumlah_transfer, bank, gambar,status)
	 values
	  ('$nama',
	  '$jumlah_transfer',
	  '$bank',
	  '$nama_file',
	  '$status')");

	if($sqlsimpan){ // Cek jika proses simpan ke database sukses atau tidak
        // Jika Sukses, Lakukan :
        echo "<script>alert('data berhasil disimpan!!!')</script>";
        header("location:index.php"); // Redirectke halaman index.php
      }else{
        // Jika Gagal, Lakukan :
        echo "<script>alert('Maaf, Terjadi kesalahan saat mencoba untuk menyimpan data ke database.!!!')</script>";
       header("location:?page=konfirmasi_pembayaran");
      }
    }else{
      // Jika gambar gagal diupload, Lakukan :
      echo "<script>alert('Maaf, Gambar gagal untuk diupload!!!')</script>";
      header("location:?page=konfirmasi_pembayaran");
}
  }else{
    // Jika ukuran file lebih dari 1MB, lakukan :
  	echo "<script>alert('Maaf, Ukuran gambar yang diupload tidak boleh lebih dari 1MB!!!')</script>";
   	header("location:?page=konfirmasi_pembayaran");
 }
}else{
  // Jika tipe file yang diupload bukan JPG / JPEG / PNG, lakukan :
  echo "<script>alert('Maaf, Tipe gambar yang diupload harus JPG / JPEG / PNG.!!!')</script>";
  header("location:?page=konfirmasi_pembayaran");
}
}
}else{
	 echo "<script>alert('Silahkan Login Terlebih Dahulu atau registrasi terlebih dahulu!');
           window.location='index.php?page=login';</script>";
}	
	?>