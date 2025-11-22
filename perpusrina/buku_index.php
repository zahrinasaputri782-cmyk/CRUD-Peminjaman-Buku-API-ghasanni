<?php include 'config.php'; ?>
<!DOCTYPE html>
<html>
<head><title>Data Buku</title><link rel="stylesheet" href="style.css"></head>
<body>

<h1>📘 Data Buku</h1>
<a class="btn" href="tambah_buku.php">Tambah Buku</a>
<a class="btn" href="index.php">Kembali</a>

<table>
<tr>
    <th>ID</th><th>Judul</th><th>Pengarang</th><th>Stok</th><th>Aksi</th>
</tr>

<?php
$q = mysqli_query($conn, "SELECT * FROM buku ORDER BY id DESC");
while($r = mysqli_fetch_assoc($q)) {
?>
<tr>
    <td><?= $r['id'] ?></td>
    <td><?= $r['judul'] ?></td>
    <td><?= $r['pengarang'] ?></td>
    <td><?= $r['stok'] ?></td>
    <td>
        <a class="edit" href="edit_buku.php?id=<?= $r['id'] ?>">Edit</a>
        <a class="hapus" href="hapus_buku.php?id=<?= $r['id'] ?>" onclick="return confirm('Hapus buku ini?')">Hapus</a>
    </td>
</tr>
<?php } ?>

</table>

</body>
</html>
