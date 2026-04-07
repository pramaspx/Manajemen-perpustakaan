<?php include '../layout.php'; ?>
<?php include '../koneksi.php'; ?>

<div class="card-box">
<h3>Laporan Transaksi</h3>

<table class="table table-bordered">
<tr>
<th>No</th>
<th>Nama</th>
<th>Buku</th>
<th>Tanggal Pinjam</th>
<th>Jatuh Tempo</th>
<th>Status</th>
<th>Denda</th>
</tr>

<?php
$no=1;

$data = mysqli_query($conn,"
SELECT 
    p.*, 
    a.nama, 
    b.judul, 
    d.jumlah,
    k.denda
FROM peminjaman p
JOIN anggota a ON p.id_anggota=a.id_anggota
JOIN detail_pinjam d ON p.id_pinjam=d.id_pinjam
JOIN buku b ON d.id_buku=b.id_buku
LEFT JOIN pengembalian k ON p.id_pinjam=k.id_pinjam
ORDER BY p.id_pinjam DESC
");

while($row=mysqli_fetch_array($data)){
?>
<tr>
<td><?= $no++ ?></td>
<td><?= $row['nama'] ?></td>
<td><?= $row['judul'] ?></td>
<td><?= $row['tanggal_pinjam'] ?></td>
<td><?= $row['tanggal_kembali'] ?></td>

<td>
<?php if($row['status']=='dipinjam'){ ?>
    <span class="badge bg-warning">Dipinjam</span>
<?php } else { ?>
    <span class="badge bg-success">Kembali</span>
<?php } ?>
</td>

<td class="text-danger">
Rp <?= $row['denda'] ?? 0 ?>
</td>

</tr>
<?php } ?>
</table>
</div>
<?php
$total_denda = mysqli_fetch_assoc(mysqli_query($conn,"
SELECT SUM(denda) as total FROM pengembalian
"))['total'];
?>

<div class="alert alert-info">
Total Denda: <b>Rp <?= $total_denda ?? 0 ?></b>
</div>

<?php include '../footer.php'; ?>