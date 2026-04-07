<?php
include '../koneksi.php';

$id = $_GET['id'];

// Hapus data
mysqli_query($conn, "DELETE FROM anggota WHERE id_anggota=$id");

echo "<script>
alert('Data anggota berhasil dihapus');
window.location='/perpustakaan/anggota/anggota.php';
</script>";
?>