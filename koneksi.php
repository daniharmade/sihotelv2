<?php

$server = 'localhost';
$user = 'root';
$password = '';
$db = 'dbhotel';

$conn = new mysqli($server, $user, $password, $db);
if ($conn->connect_error) {
    die('Koneksi Database gagal :' . $conn->connect_error);
}
?>