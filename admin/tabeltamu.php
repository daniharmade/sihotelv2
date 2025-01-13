<h2>Tabel Tamu</h2>
<div class="alert alert-info">TABEL DATA TAMU</div>
<A href="index.php?module=inputtamu" class="btn btn-primary">Tambah Data</a>
<table width="100%" border="1" class="table table-bordered table-striped">

  <tr>
    <th>No</th>
    <th>No Id</th>
    <th>Nama</th>
    <th>Alamat</th>
    <th>Asal</th>
    <th>No Telpon</th>
    <th>Jenis Kelamin</th>
    <th>Aksi</th>
  </tr>


  <?php
  include "koneksi.php";
  $sql = mysqli_query($con, "select * from tamu");
  $no = 1;
  while ($row = mysqli_fetch_array($sql)) {

  ?>

    <tr>
      <td align="center"><?php echo $no; ?></td>
      <td align="center"><?php echo $row['id_pelanggan'] ?> </td>
      <td align="center"><?php echo $row['Nama'] ?> </td>
      <td align="center"><?php echo $row['Alamat'] ?> </td>
      <td align="center"><?php echo $row['Asal'] ?> </td>
      <td align="center"><?php echo $row['NoTlp'] ?> </td>
      <td align="center"><?php echo $row['jk'] ?> </td>


      <td align="center">
        <a href="index.php?module=edittamu&id_pelanggan=<?php echo $row['id_pelanggan']; ?> " class="btn btn-success">Edit</a>
        <a href="index.php?module=hapustamu&id_pelanggan=<?php echo $row['id_pelanggan']; ?>" class="btn btn-danger">Hapus</a>
      </td>
    </tr>

  <?php
    $no++;
  }
  ?>
</table>