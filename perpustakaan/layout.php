<?php include 'koneksi.php'; ?>
<!DOCTYPE html>
<html lang="id">
<head>
<meta charset="UTF-8">
<title>Perpustakaan</title>

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">

<style>
body {
    background: #f4f6f9;
    font-family: 'Segoe UI';
}

/* Sidebar */
.sidebar {
    height: 100vh;
    background: #0b3c78;
    color: white;
    padding-top: 20px;
}
.sidebar a {
    color: white;
    display: block;
    padding: 12px 20px;
    text-decoration: none;
}
.sidebar a:hover {
    background: #1456a0;
}

/* Content */
.content {
    padding: 20px;
}

/* Card */
.card-box {
    border-radius: 15px;
    padding: 20px;
    background: white;
    box-shadow: 0 5px 10px rgba(0,0,0,0.1);
}
</style>
</head>

<body>

<div class="container-fluid">
<div class="row">

<!-- Sidebar -->
<div class="col-md-2 sidebar">
    <h4 class="text-center">📚 Perpus</h4>
    <hr>

    <a href="/perpustakaan/index.php">Dashboard</a>
    <a href="/perpustakaan/buku/buku.php">Data Buku</a>
    <a href="/perpustakaan/anggota/anggota.php">Data Anggota</a>
    <a href="/perpustakaan/peminjaman/peminjaman.php">Peminjaman</a>
    <a href="/perpustakaan/pengembalian/pengembalian.php">Pengembalian & Denda</a>
    <a href="/perpustakaan/laporan/laporan.php">Laporan</a>
</div>

<!-- Content -->
<div class="col-md-10 content">