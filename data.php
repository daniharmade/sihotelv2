<?php

include 'config/koneksi.php';

$sql=mysqli_query($conn,"SELECT * FROM galeri WHERE id_kamar=");
foreach ($sql as $value) {
	echo $value['gambar'];
}