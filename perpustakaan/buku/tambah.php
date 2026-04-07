<?php include '../layout.php'; ?>
<?php include '../koneksi.php'; ?>

<div class="card-box">
    <h3>Tambah Buku</h3>

    <form method="POST" action="">
        <div class="mb-3">
            <label>Judul Buku</label>
            <input type="text" name="judul" class="form-control" required>
        </div>

        <div class="mb-3">
            <label>Pengarang</label>
            <input type="text" name="penulis" class="form-control" required>
        </div>

        <div class="mb-3">
            <label>Penerbit</label>
            <input type="text" name="penerbit" class="form-control">
        </div>

        <div class="mb-3">
            <label>Tahun</label>
            <input type="number" name="tahun" class="form-control">
        </div>

        <div class="mb-3">
            <label>Stok</label>
            <input type="number" name="stok" class="form-control" required>
        </div>

        <button type="submit" name="simpan" class="btn btn-primary">Simpan</button>
        <a href="/perpustakaan/buku/buku.php" class="btn btn-secondary">Kembali</a>
    </form>
</div>

<?php
if(isset($_POST['simpan'])){
    $judul = $_POST['judul'];
    $penulis = $_POST['penulis'];
    $penerbit = $_POST['penerbit'];
    $tahun = $_POST['tahun'];
    $stok = $_POST['stok'];

    mysqli_query($conn, "
    INSERT INTO buku (judul, penulis, penerbit, tahun, stok)
    VALUES ('$judul','$pengarang','$penerbit','$tahun','$stok')
    ");

    echo "<script>
    alert('Data buku berhasil ditambahkan');
    window.location='/perpustakaan/buku/buku.php';
    </script>";
}
?>

<?php include '../footer.php'; ?>