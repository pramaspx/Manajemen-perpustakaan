<?php
include 'koneksi.php';

// Total buku
$q_buku = mysqli_query($conn, "SELECT COUNT(*) as total FROM buku");
$total_buku = mysqli_fetch_assoc($q_buku)['total'];

// Total anggota
$q_anggota = mysqli_query($conn, "SELECT COUNT(*) as total FROM anggota");
$total_anggota = mysqli_fetch_assoc($q_anggota)['total'];

// Total peminjaman (masih dipinjam)
$q_pinjam = mysqli_query($conn, "SELECT COUNT(*) as total FROM peminjaman WHERE status='dipinjam'");
$total_pinjam = mysqli_fetch_assoc($q_pinjam)['total'];

?>
    
<!DOCTYPE html>
<html lang="id">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Perpustakaan</title>

<!-- Bootstrap -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">

<style>
body {
    font-family: 'Segoe UI', sans-serif;
    background-color: #f4f6f9;
}

/* Sidebar */
.sidebar {
    height: 100vh;
    background-color: #0b3c78;
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
    background-color: #1456a0;
}

/* Content */
.content {
    padding: 20px;
}

/* Card Dashboard */
.card-dashboard {
    border-radius: 15px;
    padding: 20px;
    color: white;
}
.bg-buku { background: #007bff; }
.bg-anggota { background: #28a745; }
.bg-pinjam { background: #ffc107; color: black; }
.bg-kembali { background: #dc3545; }

/* Quick menu */
.quick-menu {
    border-radius: 15px;
    padding: 20px;
    background: white;
    text-align: center;
    transition: 0.3s;
}
.quick-menu:hover {
    transform: translateY(-5px);
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

        <a href="index.php">Dashboard</a>
        <a href="buku/buku.php">Data Buku</a>
        <a href="anggota/anggota.php">Data Anggota</a>
        <a href="peminjaman">Peminjaman</a>
        <a href="pengembalian">Pengembalian</a>
        <a href="laporan">Laporan</a>
    </div>

    <!-- Content -->
    <div class="col-md-10 content">

        <h3>Dashboard Pegawai</h3>
        <p>Selamat datang, Admin 👋</p>

        <!-- Statistik -->
    <div class="row g-4 mt-2">

        <div class="col-md-3">
            <div class="card-dashboard bg-buku">
                <h5>Total Buku</h5>
                <h3><?=$total_buku?></h3>
            </div>
        </div>

        <div class="col-md-3">
            <div class="card-dashboard bg-anggota">
                <h5>Total Anggota</h5>
                <h3><?= $total_anggota ?></h3>
            </div>
        </div>

        <div class="col-md-3">
            <div class="card-dashboard bg-pinjam">
                <h5>Dipinjam</h5>
                <h3><?= $total_pinjam ?></h3>
            </div>
        </div>

    </div>

        <!-- Menu Cepat -->
        <h4 class="mt-5">Akses Cepat</h4>

        <div class="row g-4 mt-2">

            <div class="col-md-3">
                <div class="quick-menu">
                    <h5>📚 Buku</h5>
                    <a href="buku/buku.php" class="btn btn-primary btn-sm mt-2">Kelola</a>
                </div>
            </div>

            <div class="col-md-3">
                <div class="quick-menu">
                    <h5>👤 Anggota</h5>
                    <a href="anggota/anggota.php" class="btn btn-success btn-sm mt-2">Kelola</a>
                </div>
            </div>

            <div class="col-md-3">
                <div class="quick-menu">
                    <h5>🔄 Pinjam</h5>
                    <a href="peminjaman/peminjaman.php" class="btn btn-warning btn-sm mt-2">Proses</a>
                </div>
            </div>

            <div class="col-md-3">
                <div class="quick-menu">
                    <h5>🔁 Kembali</h5>
                    <a href="pengembalian/pengembalian.php" class="btn btn-danger btn-sm mt-2">Proses</a>
                </div>
            </div>

        </div>

    </div>

</div>
</div>

</body>
</html>
