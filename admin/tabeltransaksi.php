<h2>Tabel Transaksi</h2>
<div class="alert alert-info">TABEL DATA TRANSAKSI</div>
<a href="index.php?module=inputtransaksi" class="btn btn-primary">Tambah Data</a>
<div id="message" style="display: none; margin-top: 10px;"></div> <!-- Area pesan -->
<table width="100%" border="1" class="table table-bordered table-striped">
    <tr>
        <form method="POST" action="">
            <td>-Pilih Tanggal-</td>
            <td><input type="date" name="hari_ini"></td>
            <td><button type="submit" name="cari" style="background-color: red;">Cari</button></td>
        </tr>
        </form>

    <tr> 
        <th>No</th>
        <th>No Faktur</th>
        <th>No Kamar</th>
        <th>ID Pelanggan</th>
        <th>Tanggal Masuk</th>
        <th>Tanggal Keluar</th>
        <th>Lama Menginap</th>
        <th>Tarif</th>
        <th>Identitas</th>
        <th>Aksi</th>
    </tr>

<?php  
include "koneksi.php";

if (isset($_POST['cari'])) {
    $hari_ini = $_POST['hari_ini'];
    $sql = mysqli_query($con, "SELECT * FROM transaksi WHERE transaksi.tgl_masuk='$hari_ini'");
} else {
    $sql = mysqli_query($con, "SELECT * FROM transaksi");
}
$no = 1;

while ($row = mysqli_fetch_array($sql)) {
    $total = $row['lama_menginap'] * $row['Tarif'];
?>

<tr>
    <td align="center"><?php echo $no; ?></td>
    <td align="center"><?php echo $row['No_Faktur']; ?></td>
    <td align="center"><?php echo $row['No_Kamar']; ?></td>
    <td align="center"><?php echo $row['id_pelanggan']; ?></td>
    <td align="center"><?php echo $row['tgl_masuk']; ?></td>
    <td align="center"><?php echo $row['tgl_keluar']; ?></td>
    <td align="center"><?php echo $row['lama_menginap']; ?></td>
    <td align="center"><?php echo $row['Tarif']; ?></td>
    <td align="center">
        <img src="../images/pesanan/<?php echo $row['ktp_file']; ?>" alt="" width="100px" height="100px">
    </td>
    <td align="center">
        <a href="index.php?module=edittransaksi&No_Faktur=<?php echo $row['No_Faktur']; ?>" class="btn btn-success">Edit</a>
        <button class="btn btn-danger" onclick="confirmDeletion('<?php echo $row['No_Faktur']; ?>')">Hapus</button>
    </td>
</tr>

<?php 
    $no++;
}
?>
</table>

<script>
    // Konfirmasi dan hapus data
    function confirmDeletion(noFaktur) {
        if (confirm("Apakah Anda yakin ingin menghapus transaksi dengan No Faktur: " + noFaktur + "?")) {
            // Kirim permintaan penghapusan menggunakan fetch API
            fetch('hapustransaksi.php?No_Faktur=' + noFaktur)
                .then(response => response.text())
                .then(data => {
                    if (data.trim() === "success") {
                        document.getElementById("message").style.display = "block";
                        document.getElementById("message").innerHTML = `
                            <div class="alert alert-success">Data dengan No Faktur ${noFaktur} berhasil dihapus.</div>
                        `;
                        setTimeout(() => {
                            location.reload(); // Muat ulang halaman
                        }, 2000);
                    } else {
                        document.getElementById("message").style.display = "block";
                        document.getElementById("message").innerHTML = `
                            <div class="alert alert-danger">Gagal menghapus data. Silakan coba lagi.</div>
                        `;
                    }
                });
        }
    }
</script>
