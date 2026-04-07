<?php
include '../koneksi.php';

$id = $_GET['id'];

// Hapus data
mysqli_query($conn, "DELETE FROM buku WHERE id_buku=$id");

echo "<script>
alert('Data buku berhasil dihapus');
window.location='/perpustakaan/buku/buku.php';
</script>";
?>