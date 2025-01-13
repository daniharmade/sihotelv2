<?php
include 'koneksi.php';
$id = $_GET['No_Kamar'];
$sql = mysqli_query($con, "SELECT * FROM kamar WHERE No_Kamar='$id'");
$data = mysqli_fetch_array($sql);
?>
<html lang="en">

<head>
  <title>Edit Kamar</title>
</head>

<body>
  <table border="1" align="center" class="table table-bordered table-striped">
    <form action="" method="POST" enctype="multipart/form-data">
      <tr style="color: black;">
        <td>No.Kamar</td>
        <td>:</td>
        <td><input type="text" name="No_Kamar" value="<?php echo $data['No_Kamar']; ?>" readonly></td>
      </tr>
      <tr style="color: black;">
        <td>Video</td>
        <td>:</td>
        <td>
          <input type="file" name="video" accept="video/*">
          <p>Current: <?php echo $data['video']; ?></p>
        </td>
      </tr>
      <tr style="color: black;">
        <td>Gambar</td>
        <td>:</td>
        <td>
          <input type="file" name="gambar" accept="image/*">
          <p>Current: <?php echo $data['gambar']; ?></p>
        </td>
      </tr>
      <tr style="color: black;">
        <td>Jenis Kamar</td>
        <td>:</td>
        <td>
          <select name="Jenis">
            <option value="<?php echo $data['Jenis']; ?>"><?php echo $data['Jenis']; ?></option>
            <option value="Super Presidents">Super Presidents</option>
            <option value="Super VIP">Super VIP</option>
            <option value="VIP">VIP</option>
            <option value="Deluxe">Deluxe</option>
            <option value="Superior">Superior</option>
            <option value="Standard">Standard</option>
            <option value="Ekonomi-1">Ekonomi Class 1</option>
            <option value="Ekonomi-2">Ekonomi Class 2</option>
          </select>
        </td>
      </tr>
      <tr style="color: black;">
        <td>Type</td>
        <td>:</td>
        <td>
          <select name="Type">
            <option value="<?php echo $data['Type']; ?>"><?php echo $data['Type']; ?></option>
            <option value="Single">Single</option>
            <option value="Double">Double</option>
          </select>
        </td>
      </tr>
      <tr style="color: black;">
        <td>Tarif</td>
        <td>:</td>
        <td><input type="text" name="Tarif" value="<?php echo $data['Tarif']; ?>"></td>
      </tr>
      <tr style="color: black;">
        <td>Deskripsi</td>
        <td>:</td>
        <td>
          <textarea name="deskripsi" rows="4" cols="50"><?php echo $data['deskripsi']; ?></textarea>
        </td>
      </tr>
      <tr>
        <td colspan="3" align="center">
          <input type="submit" name="submit" value="Update" class="btn btn-success">
          <input type="reset" value="Reset" class="btn btn-danger">
        </td>
      </tr>
    </form>
  </table>

  <?php
  if (isset($_POST['submit'])) {
    $No_Kamar = $_POST['No_Kamar'];
    $Jenis = $_POST['Jenis'];
    $Type = $_POST['Type'];
    $Tarif = $_POST['Tarif'];
    $deskripsi = $_POST['deskripsi'];

    // Retain current file paths
    $gambar = $data['gambar'];
    $video = $data['video'];

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

    // Update database
    $q = mysqli_query($con, "UPDATE Kamar 
      SET Jenis='$Jenis', Type='$Type', Tarif='$Tarif', deskripsi='$deskripsi', gambar='$gambar', video='$video' 
      WHERE No_Kamar='$No_Kamar'");

    if ($q) {
      echo "<script>alert('Data Berhasil Diperbarui');
      window.location.href='index.php?module=tabelkamar';</script>";
    } else {
      echo "<script>alert('Data Gagal Diperbarui! " . mysqli_error($con) . "');
      window.location.href='index.php?module=tabelkamar';</script>";
    }
  }
  ?>
</body>

</html>