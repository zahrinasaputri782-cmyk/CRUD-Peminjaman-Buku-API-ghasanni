<?php include 'config.php';

$buku = mysqli_query($conn, "SELECT * FROM buku WHERE stok>0");
?>
<!DOCTYPE html>
<html>
<head><title>Form Peminjaman</title><link rel="stylesheet" href="style.css"></head>
<body>

<h2>Form Peminjaman Buku</h2>

<form method="POST" action="pinjam_proses.php" class="form-box">

    <label>Nama Peminjam</label>
    <input name="nama" required>

    <label>Kelas</label>
    <input name="kelas" required>

    <label>Pilih Buku</label>
    <select name="id_buku" required>
        <?php while($b = mysqli_fetch_assoc($buku)){ ?>
            <option value="<?= $b['id'] ?>"><?= $b['judul'] ?></option>
        <?php } ?>
    </select>

    <button class="btn">Pinjam</button>
</form>

</body>
</html>
