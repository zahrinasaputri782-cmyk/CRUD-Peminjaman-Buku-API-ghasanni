<?php
include 'config.php';
$id = $_GET['id'];

mysqli_query($conn, "DELETE FROM peminjam WHERE id=$id");
header("Location: peminjam_index.php");
?>
