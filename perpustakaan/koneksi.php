<?php
$host = "localhost";
$user = "root";
$pass = "";
$db   = "perpustakaan";

$conn = mysqli_connect($host, $user, $pass, $db);

if (!$conn) {
    echo "<h3>Koneksi database gagal!</h3>";
    exit;
}

mysqli_set_charset($conn, "utf8");
date_default_timezone_set("Asia/Jakarta");
?>