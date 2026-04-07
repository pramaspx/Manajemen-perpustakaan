<?php
include '../koneksi.php';
include '../layout.php';

$id = $_GET['id'];
$data = mysqli_fetch_array(mysqli_query($conn, "SELECT * FROM anggota WHERE id_anggota=$id"));
?>

<div class="card-box">
<h3>Edit Anggota</h3>

<form method="POST">

    <div class="mb-3">
        <label>Nama</label>
        <input type="text" name="nama" class="form-control" 
        value="<?= $data['nama'] ?>" required>
    </div>

    <div class="mb-3">
        <label>No HP</label>
        <input type="text" name="no_hp" class="form-control" 
        value="<?= $data['no_hp'] ?>">
    </div>

    <button type="submit" name="update" class="btn btn-success">Update</button>
    <a href="/perpustakaan/anggota/anggota.php" class="btn btn-secondary">Kembali</a>

</form>
</div>

<?php
if(isset($_POST['update'])){
    $nama = $_POST['nama'];
    $no_hp = $_POST['no_hp'];

    mysqli_query($conn, "
    UPDATE anggota SET 
        nama='$nama',
        no_hp='$no_hp'
    WHERE id_anggota=$id
    ");

    echo "<script>
    alert('Data anggota berhasil diupdate');
    window.location='/perpustakaan/anggota/anggota.php';
    </script>";
}
?>

<?php include '../footer.php'; ?>