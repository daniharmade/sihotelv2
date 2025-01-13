<?php
include "koneksi.php";

// Sanitize and validate the input
if (isset($_GET['No_Kamar']) && !empty($_GET['No_Kamar'])) {
  $No_Kamar = mysqli_real_escape_string($con, $_GET['No_Kamar']);

  // Check if the record exists
  $result = mysqli_query($con, "SELECT gambar, video FROM kamar WHERE No_Kamar='$No_Kamar'");
  if (mysqli_num_rows($result) > 0) {
    $data = mysqli_fetch_assoc($result);

    // Delete files associated with the record
    if (!empty($data['gambar']) && file_exists($data['gambar'])) {
      unlink($data['gambar']);
    }
    if (!empty($data['video']) && file_exists($data['video'])) {
      unlink($data['video']);
    }

    // Delete the record from the database
    $sqlb = mysqli_query($con, "DELETE FROM kamar WHERE No_Kamar='$No_Kamar'");

    if ($sqlb) {
      echo "<script>alert('Data Berhasil Dihapus');
                  window.location.href='index.php?module=tabelkamar';</script>";
    } else {
      echo "<script>alert('Gagal Menghapus Data: " . mysqli_error($con) . "');
                  window.location.href='index.php?module=tabelkamar';</script>";
    }
  } else {
    echo "<script>alert('Data Tidak Ditemukan');
              window.location.href='index.php?module=tabelkamar';</script>";
  }
} else {
  echo "<script>alert('No Kamar Tidak Valid');
          window.location.href='index.php?module=tabelkamar';</script>";
}
