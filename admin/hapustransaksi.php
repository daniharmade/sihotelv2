<?php
include "koneksi.php";

if (isset($_GET['No_Faktur'])) {
    $no_faktur = $_GET['No_Faktur'];
    $sql = mysqli_query($con, "DELETE FROM transaksi WHERE No_Faktur='$no_faktur'");

    if ($sql) {
        echo "success";
    } else {
        echo "error";
    }
}
?>
