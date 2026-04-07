<?php include '../layout.php'; ?>
<?php include '../koneksi.php'; ?>

<div class="card-box">
<h3>Peminjaman Buku</h3>

<form method="POST" action="proses_pinjam.php">

<!-- Pilih Anggota -->
<div class="mb-3">
<label>Anggota</label>
<select name="id_anggota" class="form-control" required>
<option value="">-- Pilih Anggota --</option>
<?php
$data = mysqli_query($conn, "SELECT * FROM anggota");
while($d = mysqli_fetch_array($data)){
    echo "<option value='$d[id_anggota]'>$d[nama]</option>";
}
?>
</select>
</div>

<!-- Pilih Buku -->
<div class="mb-3">
<label>Buku</label>
<select name="id_buku" class="form-control" required>
<option value="">-- Pilih Buku --</option>
<?php
$data = mysqli_query($conn, "SELECT * FROM buku WHERE stok > 0");
while($d = mysqli_fetch_array($data)){
    echo "<option value='$d[id_buku]'>$d[judul] (Stok: $d[stok])</option>";
}
?>
</select>
</div>

<!-- Jumlah -->
<div class="mb-3">
<label>Jumlah</label>
<input type="number" name="jumlah" class="form-control" min="1" required>
</div>

<!-- Tanggal -->
<div class="mb-3">
<label>Tanggal Pinjam</label>
<input type="date" name="tanggal_pinjam" class="form-control" required>
</div>

<div class="mb-3">
<label>Tanggal Kembali</label>
<input type="date" name="tanggal_kembali" class="form-control" required>
</div>

<button href="proses_pinjam.php?id=<?= $d['id_anggota'] ?>" class="btn btn-primary">Simpan</button>

</form>
</div>
<h4 class="mt-4">Data Peminjaman</h4>

<table class="table table-bordered">
<tr>
<th>No</th>
<th>Nama</th>
<th>Buku</th>
<th>Jumlah</th>
<th>Status</th>
</tr>

<?php
$no=1;
$data=mysqli_query($conn,"
SELECT p.*, a.nama, b.judul, d.jumlah
FROM peminjaman p
JOIN anggota a ON p.id_anggota=a.id_anggota
JOIN detail_pinjam d ON p.id_pinjam=d.id_pinjam
JOIN buku b ON d.id_buku=b.id_buku
");

while($d=mysqli_fetch_array($data)){
?>
<tr>
<td><?= $no++ ?></td>
<td><?= $d['nama'] ?></td>
<td><?= $d['judul'] ?></td>
<td><?= $d['jumlah'] ?></td>
<td><?= $d['status'] ?></td>
</tr>
<?php } ?>
</table>

<?php include '../footer.php'; ?>