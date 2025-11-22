<?php include 'config.php'; ?>
<!DOCTYPE html>
<html>
<head><title>Data Peminjam</title><link rel="stylesheet" href="style.css"></head>
<body>

<h1>🧑‍🤝‍🧑 Data Peminjam</h1>
<a class="btn" href="tambah_peminjam.php">Tambah Peminjam</a>
<a class="btn" href="index.php">Kembali</a>

<table>
<tr>
    <th>ID</th><th>Nama</th><th>Kelas</th><th>Buku</th><th>Tanggal</th><th>Aksi</th>
</tr>

<?php
$q = mysqli_query($conn, 
"SELECT p.id,p.nama,p.kelas,b.judul,p.tanggal 
 FROM peminjam p 
 JOIN buku b ON p.id_buku=b.id
 ORDER BY p.id DESC");

while($r = mysqli_fetch_assoc($q)) {
?>
<tr>
    <td><?= $r['id'] ?></td>
    <td><?= $r['nama'] ?></td>
    <td><?= $r['kelas'] ?></td>
    <td><?= $r['judul'] ?></td>
    <td><?= $r['tanggal'] ?></td>
    <td>
        <a class="hapus" href="hapus_peminjam.php?id=<?= $r['id'] ?>" onclick="return confirm('Hapus data ini?')">Hapus</a>
    </td>
</tr>
<?php } ?>

</table>

</body>
</html>
