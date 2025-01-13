<?php
    session_start();
?>
<?php
	if (isset($_POST['submit'])) {
    include 'koneksi.php';

    $kamar=$_POST['kamar'];
    $tarif=substr($_POST['tarif'],0,6);
    $nama=$_POST['nama'];
    $telpon=$_POST['nohp'];
    $email=$_POST['email'];
    $lama_menginap=$_POST['lama_menginap'];
    $pesan=$_POST['pesan'];
    $tgl_masuk=$_POST['checkin'];
    $tgl_keluar=$_POST['checkout'];
    $no_faktur = uniqid();
    $id_pelanggan =$_SESSION['id_pelanggan'];

    $sql = "INSERT INTO transaksi (No_Faktur,No_Kamar,id_pelanggan,tgl_masuk,tgl_keluar,lama_menginap,Tarif,Nama,Telpon,Email,pesan)
    VALUES ('$no_faktur','$kamar','$id_pelanggan','$tgl_masuk','$tgl_keluar','$lama_menginap','$tarif','$nama','$telpon','$email','$pesan')";


    if(mysqli_query($conn,$sql)){
        echo "<script>
    alert('Reservasi sukses!');
    window.location.href='index.php?page=reservasi';
    </script>";
    }else {
        echo "<script>
    alert('Reservasi gagal! Kesalahan Database!');
    window.location.href='index.php?page=reservasi';
    </script>";
    }
}
