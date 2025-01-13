<style>
  .description {
    max-width: 200px;
    /* Adjust as needed */
    word-wrap: break-word;
    /* Allow text to wrap to the next line */
    overflow-wrap: break-word;
    /* Ensures compatibility */
  }

  .mediaField {
    max-width: 100px;
    word-wrap: break-word;
    /* Allow text to wrap to the next line */
    overflow-wrap: break-word;
    /* Ensures compatibility */
  }

  .media {
    /* max-width: 100px; */
    height: 150px;
  }
</style>
<h2>Tabel Kamar</h2>
<div class="alert alert-info">TABEL DATA KAMAR</div>
<A href="index.php?module=inputkamar" class="btn btn-primary">Tambah Data</a>
<table width="100%" border="1" class="table table-bordered table-striped">

  <tr>
    <th>No</th>
    <th>No Kamar</th>
    <th>Jenis</th>
    <th>Type</th>
    <th>Tarif</th>
    <th>Deskripsi</th>
    <th>Video</th>
    <th>Gambar</th>
  </tr>


  <?php
  include "koneksi.php";
  $sql = mysqli_query($con, "select * from kamar");
  $no = 1;
  while ($row = mysqli_fetch_array($sql)) {

  ?>

    <tr>
      <td align="center"><?php echo $no; ?></td>
      <td align="center"><?php echo $row['No_Kamar'] ?> </td>
      <td align="center"><?php echo $row['Jenis'] ?> </td>
      <td align="center"><?php echo $row['Type'] ?> </td>
      <td align="center"><?php echo $row['Tarif'] ?> </td>
      <td class="description"><?php echo $row['deskripsi'] ?> </td>
      <td>
        <video controls autoplay loop muted height="150" poster="poster-image.jpg">
          <source src="<?= $row['video']; ?>" type="video/mp4">
          <source src="<?= $row['video']; ?>" type="video/webm">
          Your browser does not support the video tag.
        </video>
      </td>
      <td><img class="media" src="<?= $row['gambar']; ?>" alt="Image" class="img-fluid"></td>


      <td align="center">
        <a href="index.php?module=editkamar&No_Kamar=<?php echo $row['No_Kamar']; ?>" class="btn btn-success">Edit</a>
        <a href="index.php?module=hapuskamar&No_Kamar=<?php echo $row['No_Kamar']; ?>" onclick="return confirm('Apakah anda yakin ingin menghapus?');" class="btn btn-danger">Hapus</a>

      </td>
    </tr>

  <?php
    $no++;
  }
  ?>
</table>