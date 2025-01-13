<h2>LAPORAN PERTAHUN</h2>
<div class="alert alert-info">LAPORAN DATA PERTAHUN</div>
<?php
$thn_ini = date("Y");
?>
<table width="100%" border="1" class="table table-bordered table-striped">
  <tr>
    <form method="POST" action="">
      <td>-Pilih Tanggal-</td>
      <td><input type="year" name="thn_ini" value="<?php echo $thn_ini; ?>"></td>
      <td><button type="submit" name="cari" style="background-color: red;">Cari</td>
  </tr>
  </form>


  <tr>
    <th>No</th>
    <th>No Faktur</th>
    <th>No Kamar</th>
    <th>No ID</th>
    <th>Tanggal Masuk</th>
    <th>Tanggal Keluar</th>
    <th>Lama Menginap</th>
    <th>Tarif</th>
  </tr>


  <?php
  include "koneksi.php";
  if (isset($_POST['cari'])) {
    $thn = $_POST['thn_ini'];
    $sql = mysqli_query($con, "select * from transaksi where transaksi.tgl_masuk LIKE '%$_POST[thn_ini]%'");
  } else {
    $sql = mysqli_query($con, "select * from transaksi");
  }
  $no = 1;
  $total = 0;
  while ($row = mysqli_fetch_array($sql)) {
    $total = $row['lama_menginap'] * $row['Tarif'];
  ?>

    <tr>
      <td align="center"><?php echo $no; ?></td>
      <td align="center"><?php echo $row['No_Faktur'] ?> </td>
      <td align="center"><?php echo $row['No_Kamar'] ?> </td>
      <td align="center"><?php echo $row['id_pelanggan'] ?> </td>
      <td align="center"><?php echo $row['tgl_masuk'] ?> </td>
      <td align="center"><?php echo $row['tgl_keluar'] ?> </td>
      <td align="center"><?php echo $row['lama_menginap'] ?> </td>
      <td align="center"><?php echo $row['Tarif'] ?> </td>

    </tr>

  <?php
    $no++;
  }
  ?>
</table>
<br>
<a href="index.php?module=cetakpertahun&thn_ini=<?php echo $_POST['thn_ini']; ?>">CETAK</a>
</br>