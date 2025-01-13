<?php
$servername = "localhost";
$username = "root";
$password = "";
$db="dbhotel";

// Create connection
$conn = new mysqli($servername, $username, $password,$db);

// Check connection
if ($conn->connect_error) {
    die("Koneksi ke database gagal!: " . $conn->connect_error);
}
?>