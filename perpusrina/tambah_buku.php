<?php include 'config.php';

if(isset($_POST['simpan'])){
    $judul = $_POST['judul'];
    $pengarang = $_POST['pengarang'];
    $stok = $_POST['stok'];

    mysqli_query($conn, "INSERT INTO buku(judul,pengarang,stok) VALUES('$judul','$pengarang','$stok')");
    header("Location: buku_index.php");
}
?>
<!DOCTYPE html>
<html>
<head><title>Tambah Buku</title><link rel="stylesheet" href="style.css"></head>
<body>

<h2>Tambah Buku</h2>

<form method="POST" class="form-box">
    <label>Judul Buku</label>
    <input name="judul" required>

    <label>Pengarang</label>
    <input name="pengarang">

    <label>Stok</label>
    <input type="number" name="stok" value="1" min="1">

    <button class="btn" name="simpan">Simpan</button>
</form>

</body>
</html>
