<?php
  include "koneksi.php";
  $sqlb = mysqli_query($con, "delete from tamu where id_pelanggan='$_GET[id_pelanggan]'");
  
  if($sqlb){
  	echo "Data Berhasil Dihapus";
    header("Location: index.php?module=tabeltamu");
  }else{
  	echo "Gagal Menghapus";
    header("Location: index.php?module=tabeltamu");
  }
?>