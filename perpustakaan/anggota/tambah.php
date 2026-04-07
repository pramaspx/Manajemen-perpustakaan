<?php include '../layout.php'; ?>
<?php include '../koneksi.php'; ?>

<div class="card-box">
    <h3>Tambah Anggota</h3>

    <form method="POST" action="">
        <div class="mb-3">
            <label>Nama</label>
            <input type="text" name="nama" class="form-control" required>
        </div>

        <div class="mb-3">
            <label>No HP</label>
            <input type="text" name="no_hp" class="form-control">
        </div>

        <button type="submit" name="simpan" class="btn btn-success">Simpan</button>
        <a href="/perpustakaan/anggota/anggota.php" class="btn btn-secondary">Kembali</a>
    </form>
</div>

<?php
if(isset($_POST['simpan'])){
    $nama = $_POST['nama'];
    $no_hp = $_POST['no_hp'];

    mysqli_query($conn, "
    INSERT INTO anggota (nama, no_hp)
    VALUES ('$nama','$no_hp')
    ");

    echo "<script>
    alert('Data anggota berhasil ditambahkan');
    window.location='/perpustakaan/anggota/anggota.php';
    </script>";
}
?>

<?php include '../footer.php'; ?>