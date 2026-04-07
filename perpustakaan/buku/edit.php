<?php
include '../koneksi.php';
include '../layout.php';

$id = $_GET['id'];
$data = mysqli_fetch_array(mysqli_query($conn, "SELECT * FROM buku WHERE id_buku=$id"));
?>

<div class="card-box">
<h3>Edit Buku</h3>

<form method="POST">

    <div class="mb-3">
        <label>Judul</label>
        <input type="text" name="judul" class="form-control" 
        value="<?= $data['judul'] ?>" required>
    </div>

    <div class="mb-3">
        <label>Pengarang</label>
        <input type="text" name="penulis" class="form-control" 
        value="<?= $data['penulis'] ?>" required>
    </div>

    <div class="mb-3">
        <label>Penerbit</label>
        <input type="text" name="penerbit" class="form-control" 
        value="<?= $data['penerbit'] ?>">
    </div>

    <div class="mb-3">
        <label>Tahun</label>
        <input type="number" name="tahun" class="form-control" 
        value="<?= $data['tahun'] ?>">
    </div>

    <div class="mb-3">
        <label>Stok</label>
        <input type="number" name="stok" class="form-control" 
        value="<?= $data['stok'] ?>" required>
    </div>

    <button type="submit" name="update" class="btn btn-primary">Update</button>
    <a href="/perpustakaan/buku/buku.php" class="btn btn-secondary">Kembali</a>

</form>
</div>

<?php
if(isset($_POST['update'])){
    $judul = $_POST['judul'];
    $pengarang = $_POST['penulis'];
    $penerbit = $_POST['penerbit'];
    $tahun = $_POST['tahun'];
    $stok = $_POST['stok'];

    mysqli_query($conn, "
    UPDATE buku SET 
        judul='$judul',
        penulis='$penulis',
        penerbit='$penerbit',
        tahun='$tahun',
        stok='$stok'
    WHERE id_buku=$id
    ");

    echo "<script>
    alert('Data buku berhasil diupdate');
    window.location='/perpustakaan/buku/buku.php';
    </script>";
}
?>

<?php include '../footer.php'; ?>