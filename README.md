<h1>📚 Project API Perpustakaan – perpusrina</h1>

<p>
Proyek ini adalah API sederhana untuk mengelola data perpustakaan menggunakan <b>PHP Native</b> dan <b>MySQL</b>.  
Semua endpoint diuji menggunakan aplikasi <b>Postman</b>.
</p>

<hr>

<h2>📁 Struktur Folder</h2>

<pre>
perpusrina/
│── api.php
│── config.php
│── index.php
│── buku_index.php
│── tambah_buku.php
│── edit_buku.php
│── hapus_buku.php
│── peminjam_index.php
│── tambah_peminjam.php
│── hapus_peminjam.php
│── pinjam_form.php
│── pinjam_proses.php
└── style.css
</pre>

<hr>

<h2>📝 Penjelasan File</h2>

<ul>
  <li><b>config.php</b> → Koneksi MySQL.</li>
  <li><b>api.php</b> → Endpoint CRUD (GET, POST, PUT, DELETE) dalam satu file.</li>

  <li><b>buku_index.php</b> → Menampilkan daftar buku.</li>
  <li><b>tambah_buku.php</b> → Halaman tambah buku.</li>
  <li><b>edit_buku.php</b> → Edit data buku.</li>
  <li><b>hapus_buku.php</b> → Hapus buku.</li>

  <li><b>peminjam_index.php</b> → Daftar peminjam.</li>
  <li><b>tambah_peminjam.php</b> → Menambah peminjam.</li>
  <li><b>hapus_peminjam.php</b> → Menghapus peminjam.</li>

  <li><b>pinjam_form.php</b> → Form peminjaman buku.</li>
  <li><b>pinjam_proses.php</b> → Proses simpan peminjaman.</li>

  <li><b>style.css</b> → Desain tampilan.</li>
</ul>

<hr>

<h2>🛠️ Setup Database</h2>

<pre>
CREATE TABLE buku (
    id INT AUTO_INCREMENT PRIMARY KEY,
    judul VARCHAR(255),
    penulis VARCHAR(255),
    tahun INT
);

CREATE TABLE peminjam (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nama VARCHAR(255),
    alamat VARCHAR(255),
    buku_id INT
);
</pre>

<hr>

<h2>📌 Endpoint API</h2>

<table border="1" cellpadding="6" cellspacing="0">
<thead>
<tr>
<th>Method</th>
<th>URL</th>
<th>Keterangan</th>
</tr>
</thead>
<tbody>
<tr>
<td>GET</td>
<td>/api.php?table=buku</td>
<td>Ambil seluruh data buku</td>
</tr>

<tr>
<td>POST</td>
<td>/api.php</td>
<td>Tambah buku</td>
</tr>

<tr>
<td>PUT</td>
<td>/api.php</td>
<td>Update buku berdasarkan ID</td>
</tr>

<tr>
<td>DELETE</td>
<td>/api.php?id=ID</td>
<td>Hapus buku berdasarkan ID</td>
</tr>
</tbody>
</table>

<hr>

<h2>📬 Pengujian API Menggunakan Postman</h2>

<!-- POSTMAN 1 -->
<h3>POSTMAN 1 – GET DATA</h3>
<pre>
Method: GET
URL: http://localhost/perpusrina/api.php?table=buku
</pre>
<img src="assets/images/postman1.png" width="600">

<hr>

<!-- POSTMAN 2 -->
<h3>POSTMAN 2 – POST DATA</h3>
<pre>
Method: POST
URL: http://localhost/perpusrina/api.php

Body (JSON):
{
  "aksi": "tambah",
  "judul": "Laskar Pelangi",
  "penulis": "Andrea Hirata",
  "tahun": 2005
}
</pre>
<img src="assets/images/postman2.png" width="600">

<hr>

<!-- POSTMAN 3 -->
<h3>POSTMAN 3 – UPDATE DATA</h3>
<pre>
Method: PUT
URL: http://localhost/perpusrina/api.php

Body (JSON):
{
  "aksi": "update",
  "id": 1,
  "judul": "Bumi Manusia",
  "penulis": "Pramoedya Ananta Toer",
  "tahun": 1980
}
</pre>
<img src="assets/images/postman3.png" width="600">

<hr>

<!-- POSTMAN 4 -->
<h3>POSTMAN 4 – DELETE DATA</h3>
<pre>
Method: DELETE
URL: http://localhost/perpusrina/api.php?id=1
</pre>
<img src="assets/images/postman4.png" width="600">

<hr>

<h2>✔️ Kesimpulan</h2>
<p>
API <b>perpusrina</b> ini sudah lengkap untuk kebutuhan CRUD perpustakaan dan dapat diuji langsung menggunakan Postman.
README ini sudah dilengkapi dengan screenshot POSTMAN 1–4 untuk memudahkan dokumentasi di GitHub.
</p>
