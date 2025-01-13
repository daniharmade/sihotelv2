<?php
include 'koneksi.php';
?>
<html lang="en">

<head>
  <title>Form Entri Kamar</title>
</head>

<body>
  <table border="1" align="center" class="table table-bordered table-striped">
    <form action="" method="POST" enctype="multipart/form-data">
      <tr style="color: black;">
        <td>No.Kamar</td>
        <td>:</td>
        <td> <input type="text" name="No_Kamar" id=""> </td>
      </tr>
      <tr style="color: black;">
        <td>Video</td>
        <td>:</td>
        <td>
          <input type="file" name="video" id="video" accept="video/*">
        </td>
      </tr>
      <tr style="color: black;">
        <td>Gambar</td>
        <td>:</td>
        <td>
          <input type="file" name="gambar" id="gambar" accept="image/*">
        </td>
      </tr>
      <tr style="color: black;">
        <td>Jenis Kamar</td>
        <td>:</td>
        <td>
          <select name="Jenis" id="Jenis">
            <option value="">-pilih-</option>
            <option value="Super Presidents">Super Presidents</option>
            <option value="Super VIP">Super VIP</option>
            <option value="VIP">VIP</option>
            <option value="Deluxe">Deluxe</option>
            <option value="Standard Room">Standard Room</option>
            <option value="Family Room">Family Room</option>
          </select>
        </td>
      </tr>
      <tr style="color: black;">
        <td>Type</td>
        <td>:</td>
        <td>
          <select name="Type" id="Type">
            <option value="">-pilih-</option>
            <option value="Single">Single</option>
            <option value="Double">Double</option>
          </select>
        </td>
      </tr>
      <tr style="color: black;">
        <td>Tarif</td>
        <td>:</td>
        <td> <input type="text" name="Tarif" id=""> </td>
      </tr>
      <tr style="color: black;">
        <td>Deskripsi</td>
        <td>:</td>
        <td> <input type="text" name="deskripsi" id=""> </td>
      </tr>
      <tr style="color: black;">
        <td></td>
        <td></td>
        <td>
          <input type="submit" name="submit" id="" class="btn btn-success" value="SIMPAN">
          <input type="reset" name="reset" id="" class="btn btn-danger" value="RESET">
        </td>
      </tr>
    </form>
  </table>

  <?php
  include 'koneksi.php';
  if (isset($_POST['submit'])) {
    $No_Kamar = $_POST['No_Kamar'];
    $Jenis = $_POST['Jenis'];
    $Type = $_POST['Type'];
    $Tarif = $_POST['Tarif'];
    $deskripsi = $_POST['deskripsi'];

    $gambar = '';
    $video = '';

    // Handle image upload
    if (isset($_FILES['gambar']) && $_FILES['gambar']['error'] === UPLOAD_ERR_OK) {
      $gambarTmpPath = $_FILES['gambar']['tmp_name'];
      $gambarName = $_FILES['gambar']['name'];
      $gambarExtension = pathinfo($gambarName, PATHINFO_EXTENSION);
      $gambarNewName = uniqid('img_', true) . '.' . $gambarExtension;
      $gambarDir = 'images/';
      if (!is_dir($gambarDir)) {
        mkdir($gambarDir, 0755, true);
      }
      $gambar = $gambarDir . $gambarNewName;
      move_uploaded_file($gambarTmpPath, $gambar);
    }

    // Handle video upload
    if (isset($_FILES['video']) && $_FILES['video']['error'] === UPLOAD_ERR_OK) {
      $videoTmpPath = $_FILES['video']['tmp_name'];
      $videoName = $_FILES['video']['name'];
      $videoExtension = pathinfo($videoName, PATHINFO_EXTENSION);
      $videoNewName = uniqid('vid_', true) . '.' . $videoExtension;
      $videoDir = 'videos/';
      if (!is_dir($videoDir)) {
        mkdir($videoDir, 0755, true);
      }
      $video = $videoDir . $videoNewName;
      move_uploaded_file($videoTmpPath, $video);
    }

    // Insert into database
    $q = mysqli_query($con, "INSERT INTO Kamar(No_Kamar, Jenis, Type, Tarif, deskripsi, video, gambar) 
      VALUES('$No_Kamar', '$Jenis', '$Type', '$Tarif', '$deskripsi', '$video', '$gambar')");

    if ($q) {
      echo "<script>alert('Data Berhasil Disimpan');
      window.location.href='index.php?module=tabelkamar';</script>";
    } else {
      echo "<script>alert('Data Gagal Disimpan! " . mysqli_error($con) . "');
      window.location.href='index.php?module=tabelkamar';</script>";
    }
  }
  ?>

</body>

</html>