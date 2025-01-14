<?php
if (@$_SESSION['username'] != "") {
?>
<div class="site-blocks-cover overlay" style="background-image: url(images/trivenazi.jpg);" data-aos="fade" data-stellar-background-ratio="0.5">
    <div class="container">
        <div class="row align-items-center justify-content-center">
            <div class="col-md-7 text-center" data-aos="fade">
                <span class="caption mb-3">pembayaran</span>
                <h1 class="mb-4">Form Pembayaran</h1>
            </div>
        </div>
    </div>
</div>
<div class="site-section site-section-sm">
    <div class="container">
        <div class="row">
            <div class="col-md-12 col-lg-8 mb-5">
                <div class="row">
                    <div class="col-md-4"></div>
                    <div class="col-md-4">
                        <?php
                        include "koneksi.php";

                        // Ambil tarif dari tabel transaksi berdasarkan id_pelanggan
                        $id_pelanggan = $_SESSION['id_pelanggan'];
                        $query = mysqli_query($conn, "SELECT Tarif FROM transaksi WHERE id_pelanggan = '$id_pelanggan' LIMIT 1");
                        $data = mysqli_fetch_assoc($query);
                        $tarif = $data['Tarif'] ?? 0; // Jika tidak ada data, tarif default 0
                        ?>

                        <form action="" method="post" enctype="multipart/form-data" name="form1" id="form1">
                            <div class="form-group">
                                <label>ID Pelanggan</label>
                                <input type="text" class="form-control" name="id_pelanggan" value="<?php echo $_SESSION['id_pelanggan']; ?>" readonly />
                            </div>
                            <div class="form-group">
                                <label>Nama</label>
                                <input type="text" class="form-control" name="nama" value="<?php echo $_SESSION['nama']; ?>" readonly />
                            </div>
                            <div class="form-group">
                                <label>Tarif</label>
                                <input type="text" class="form-control" name="tarif" value="<?php echo number_format($tarif, 0, ',', '.'); ?>" readonly />
                            </div>
                            <div class="form-group">
                                <label>Jumlah Transfer</label>
                                <input type="text" class="form-control" name="jumlah_transfer">
                            </div>
                            <div class="form-group">
                                <label>Bank</label>
                                <input type="text" class="form-control" name="bank">
                                <input type="hidden" class="form-control" name="status" value='T'>
                            </div>
                            <div class="form-group">
                                <label>Gambar</label>
                                <input type="file" class="form-control" name="gambar">
                            </div>
                            <div class="form-group">
                                <input type="submit" name="submit" value="Send Konfirmasi" />
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-12"></div>
    </div>
</div>

<?php
if (isset($_POST['submit'])) {
    $id_pelanggan = $_POST['id_pelanggan'];
    $jumlah_transfer = $_POST['jumlah_transfer'];
    $bank = $_POST['bank'];
    $status = $_POST['status'];

    $nama_file = $_FILES['gambar']['name'];
    $ukuran_file = $_FILES['gambar']['size'];
    $tipe_file = $_FILES['gambar']['type'];
    $tmp_file = $_FILES['gambar']['tmp_name'];
    $path = "images/" . $nama_file;

    if ($tipe_file == "image/jpeg" || $tipe_file == "image/png") {
        if ($ukuran_file <= 1000000) {
            if (move_uploaded_file($tmp_file, $path)) {
                $sqlsimpan = mysqli_query($conn, "INSERT INTO konfirmasi (id_pelanggan, jumlah_transfer, bank, gambar, status) VALUES ('$id_pelanggan', '$jumlah_transfer', '$bank', '$nama_file', '$status')");

                if ($sqlsimpan) {
                    echo "<script>alert('Data berhasil disimpan!')</script>";
                    header("Location: index.php");
                } else {
                    echo "<script>alert('Gagal menyimpan data ke database.')</script>";
                    header("Location: ?page=konfirmasi_pembayaran");
                }
            } else {
                echo "<script>alert('Gambar gagal diupload!')</script>";
                header("Location: ?page=konfirmasi_pembayaran");
            }
        } else {
            echo "<script>alert('Ukuran gambar tidak boleh lebih dari 1MB!')</script>";
            header("Location: ?page=konfirmasi_pembayaran");
        }
    } else {
        echo "<script>alert('Tipe gambar harus JPG/JPEG/PNG!')</script>";
        header("Location: ?page=konfirmasi_pembayaran");
    }
}
} else {
    echo "<script>alert('Silahkan login atau registrasi terlebih dahulu!'); window.location='index.php?page=login';</script>";
}
?>
