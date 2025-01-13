<?php
	include 'koneksi.php';
    if(isset($_POST['submit'])){
	$nama = $_POST['nama'];
	$username = $_POST['username'];
	$password = $_POST['password'];
	$no_hp = $_POST['no_hp'];
	$jk = $_POST['jk'];
	$alamat = $_POST['alamat'];
	$email = $_POST['email'];
	$sqlsimpan = mysqli_query($conn,"insert into pelanggan(nama, username, password, no_hp, jk, alamat, email)values ('$nama','$username','$password','$no_hp','$jk','$alamat','$email')");
	if($sqlsimpan){
	   echo "<script>alert('Data Berhasil Disimpan');
					 window.location='index.php?page=register';
			</script>";
	 }else{
	   echo "<script>alert('Data Gagal Disimpan');
					
			</script>";
	  }
	}	
?>