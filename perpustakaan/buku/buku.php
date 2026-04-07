<?php include '../koneksi.php'; ?>
<?php include '../layout.php'; ?>

<h3>Data Buku</h3>
<a href="tambah.php" class="btn btn-primary mb-3">Tambah Buku</a>

<table class="table table-bordered">
<tr>
<th>No</th><th>Judul</th><th>Penulis</th><th>Stok</th><th>Aksi</th>
</tr>

<?php
$no=1;
$data=mysqli_query($conn,"SELECT * FROM buku");
while($d=mysqli_fetch_array($data)){
?>
<tr>
<td><?= $no++ ?></td>
<td><?= $d['judul'] ?></td>
<td><?= $d['penulis'] ?></td>
<td><?= $d['stok'] ?></td>
<td>
<a href="edit.php?id=<?= $d['id_buku'] ?>" class="btn btn-warning btn-sm">Edit</a>
<a href="hapus.php?id=<?= $d['id_buku'] ?>" class="btn btn-danger btn-sm">Hapus</a>
</td>
</tr>
<?php } ?>
</table>