<?php
include 'config.php';

$nama = $_POST['nama'];
$kelas = $_POST['kelas'];
$id_buku = $_POST['id_buku'];

mysqli_query($conn, "INSERT INTO peminjam(nama,kelas,id_buku,tanggal)
                     VALUES('$nama','$kelas','$id_buku',NOW())");

mysqli_query($conn, "UPDATE buku SET stok = stok - 1 WHERE id=$id_buku");

header("Location: peminjam_index.php");
?>
