<?php 
include "koneksi.php" ;

?>
<body onLoad="javascript:print()"> 
<style type="text/css">
.style5 {font-size: 24px}
</style>

<div class="panel-heading">
    <table width="100%">
	<tr>
	<td><div align="center">
	<div align="center">Cetak Data Per-hari
</div>
	</td>
	</tr>
</table>
</div>
<table width="100%" border="1" class="table table-bordered table-striped">

<tr> 
<th>No</th>
<th>No Faktur</th>
<th>No Kamar</th>
<th>No ID</th>
<th>Nama</th>
<th>Tanggal Masuk</th>
<th>Tanggal Keluar</th>
<th>Lama Menginap</th>
<th>Tarif</th>
<th>Total</th>
</tr>


<?php  
include "koneksi.php";
$hari_ini = date("Y-m-d");
$sql = mysqli_query($con,"select transaksi.*,kamar.No_Kamar,kamar.Tarif,tamu.Nama from transaksi INNER JOIN kamar ON kamar.No_Kamar=transaksi.No_Kamar INNER JOIN tamu ON tamu.id_pelanggan=transaksi.id_pelanggan and transaksi.tgl_masuk= date('$_GET[hari_ini]')");
$no=1;
$total=0;
while($row=mysqli_fetch_array($sql)){
$total=$row['lama_menginap'] * $row['Tarif'];
?>

<tr>
<td align="center"><?php echo $no; ?></td>
<td align="center"><?php echo $row['No_Faktur'] ?> </td>
<td align="center"><?php echo $row['No_Kamar'] ?> </td>
<td align="center"><?php echo $row['id_pelanggan'] ?> </td>
<td align="center"><?php echo $row['Nama'] ?></td>
<td align="center"><?php echo $row['tgl_masuk'] ?> </td>
<td align="center"><?php echo $row['tgl_keluar'] ?> </td>
<td align="center"><?php echo $row['lama_menginap'] ?> </td>
<td align="center">Rp.<?php echo $row['Tarif'] ?> </td>
<td align="center">Rp.<?php echo $total?></td>

</tr>

<?php 
$no++;
}
?>
</table> 
<table width="100%" border="0" align="center" cellpadding="3" cellspacing="1" bgcolor="FFFFFF">
<tr>
 <td width="63%" bgcolor="#FFFFFF">
 <p align ="right"></p><br/>
 </td></tr>

 
 <td width="37%" bgcolor="#FFFFFF">
 <div align="right"> <?php $tanggal= date('d M Y');
 echo " $tanggal";?><br/>
 Pemilik
 <br></br>
 <br></br>
 (Afri Yulianti)
 </br>
 </td>
 </tr>
 </div>