<h2>Tabel Konfirmasi Pembayaran</h2>
<div class="alert alert-info">TABEL DATA KONFIRMASI PEMBAYARAN</div>
<table width="100%" border="1" class="table table-bordered table-striped">

<tr> 
<th>No</th>
<th>Id_Konfirmasi</th>
<th>Id_Pelanggan</th>
<th>Jumlah Transfer</th>
<th>Bank</th>
<th>Bukti Bayar</th>
<th>status Pembayaran</th>

<th>Aksi</th>
</tr>


<?php  
include "koneksi.php";
$sql = mysqli_query($con,"select * from konfirmasi order by id_konfirmasi DESC");
$no=1;
$total=0;
while($row=mysqli_fetch_array($sql)){
?>

<tr>
<td align="center"><?php echo $no; ?></td>
<td align="center"><?php echo $row['id_konfirmasi'] ?> </td>
<td align="center"><?php echo $row['id_pelanggan'] ?> </td>
<td align="center"><?php echo $row['jumlah_transfer'] ?> </td>
<td align="center"><?php echo $row['bank'] ?> </td>
<td align="center">
    <img src="../images/<?php echo $row['gambar'] ?>" alt="" width="100px" height="100px">
</td>
<td align="center"><?php echo $row['status'] ?> </td>




<td align="center">
<a href="index.php?module=editkonfirmasi&id_konfirmasi=<?php echo $row['id_konfirmasi'];?>"class="btn btn-success">konfirmasi</a>
<a href="index.php?module=hapuskonfirmasi&id_konfirmasi=<?php echo $row['id_konfirmasi'];?>"class="btn btn-danger">Hapus</a>
</td>
</tr>

<?php 
$no++;
}
?>
</table> 
