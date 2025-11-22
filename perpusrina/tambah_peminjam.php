<?php 
include 'config.php';

$buku = mysqli_query($conn, "SELECT * FROM buku WHERE stok > 0");

if(isset($_POST['simpan'])){
    $nama = $_POST['nama'];
    $kelas = $_POST['kelas'];
    $id_buku = $_POST['id_buku'];

    mysqli_query($conn, "INSERT INTO peminjam(nama,kelas,id_buku,tanggal) 
                         VALUES('$nama','$kelas','$id_buku',NOW())");

    mysqli_query($conn, "UPDATE buku SET stok = stok - 1 WHERE id=$id_buku");

    header("Location: peminjam_index.php");
}
?>
<!DOCTYPE html>
<html>
<head><title>Tambah Peminjam</title><link rel="stylesheet" href="style.css"></head>
<body>

<h2>Tambah Peminjam</h2>

<form method="POST" class="form-box">

    <label>Nama</label>
    <input name="nama" required>

    <label>Kelas</label>
    <input name="kelas" required>

    <label>Pilih Buku</label>
    <select name="id_buku">
        <?php while($b = mysqli_fetch_assoc($buku)){ ?>
        <option value="<?= $b['id'] ?>"><?= $b['judul'] ?></option>
        <?php } ?>
    </select>

    <button class="btn" name="simpan">Simpan</button>
</form>

</body>
</html>
