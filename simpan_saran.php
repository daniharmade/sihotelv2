<?php
include "koneksi.php";
include "fungsi_gambar.php";
 
 
	 if(isset($_POST['submit'])){
		$lokasi_file=$_FILES['gambar']['tmp_name'];
		$nama_file=$_FILES['gambar']['name'];
		$nama=$_POST['nama'];
		$email=$_POST['email'];
		$phone=$_POST['phone'];
		$pesan=$_POST['pesan'];
		
	 if(!empty($lokasi_file))
	 {
	 UploadFile($nama_file);
	$sqlsimpan = mysqli_query($conn, "insert into saran (gambar,nama, email, phone,pesan) values ('$nama_file','$nama', '$email', '$phone','$pesan')");
	} else { 
	$sqlsimpan = mysqli_query($conn, "insert into saran (gambar,nama, email, phone,pesan) values ('$nama_file','$nama', '$email', '$phone','$pesan')");
      }
	
	if($sqlsimpan){
	   echo "<script>alert('Data Berhasil Disimpan');
					 window.location='index.php?page=contact';</script>";
	 }else{
	 
	   echo "<script>alert('Data Gagal Disimpan');
					window.location='index.php?page=contact';</script>";
	  }
	}

?>