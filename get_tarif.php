<?php
include 'koneksi.php';

if (isset($_GET['no_kamar'])) {
    $no_kamar = $_GET['no_kamar'];

    $sql = mysqli_query($conn, "SELECT Tarif FROM kamar WHERE No_Kamar = '$no_kamar'");
    $data = mysqli_fetch_assoc($sql);

    if ($data) {
        echo json_encode(['status' => 'success', 'tarif' => $data['Tarif']]);
    } else {
        echo json_encode(['status' => 'error', 'message' => 'Kamar tidak ditemukan.']);
    }
} else {
    echo json_encode(['status' => 'error', 'message' => 'No_Kamar tidak diberikan.']);
}
?>
