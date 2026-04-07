<?php include '../koneksi.php'; ?>
<?php include '../layout.php'; ?>

<h3>Data Anggota</h3>
<a href="tambah.php" class="btn btn-primary mb-3">Tambah Anggota</a>

<table class="table table-bordered">
<tr>
<th>No</th><th>Nama</th><th>No HP</th><th>Aksi</th>
</tr>

<?php
$no=1;
$data=mysqli_query($conn,"SELECT * FROM anggota");
while($d=mysqli_fetch_array($data)){
?>
<tr>
<td><?= $no++ ?></td>
<td><?= $d['nama'] ?></td>
<td><?= $d['no_hp'] ?></td>
<td>
<a href="edit.php?id=<?= $d['id_anggota'] ?>" class="btn btn-warning btn-sm">Edit</a>
<a href="hapus.php?id=<?= $d['id_anggota'] ?>" class="btn btn-danger btn-sm">Hapus</a>
</td>
</tr>
<?php } ?>
</table>