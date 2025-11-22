<?php 
include 'config.php';

$id = $_GET['id'];
$data = mysqli_query($conn, "SELECT * FROM buku WHERE id=$id");
$book = mysqli_fetch_assoc($data);

if (isset($_POST['update'])) {
    $judul = $_POST['judul'];
    $pengarang = $_POST['pengarang'];
    $stok = $_POST['stok'];

    mysqli_query($conn, "UPDATE buku SET judul='$judul', pengarang='$pengarang', stok='$stok' WHERE id=$id");
    header("Location: buku_index.php");
}
?>
<!DOCTYPE html>
<html>
<head><title>Edit Buku</title><link rel="stylesheet" href="style.css"></head>
<body>

<h2>Edit Buku</h2>

<form method="POST" class="form-box">
    <label>Judul</label>
    <input name="judul" value="<?= $book['judul'] ?>" required>

    <label>Pengarang</label>
    <input name="pengarang" value="<?= $book['pengarang'] ?>">

    <label>Stok</label>
    <input type="number" name="stok" value="<?= $book['stok'] ?>">

    <button class="btn" name="update">Update</button>
</form>

</body>
</html>
