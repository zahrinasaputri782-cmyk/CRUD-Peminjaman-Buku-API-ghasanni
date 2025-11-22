<?php
include 'config.php';

header("Content-Type: application/json");
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Methods: GET, POST, PUT, DELETE, OPTIONS");
header("Access-Control-Allow-Headers: Content-Type");

$method = $_SERVER['REQUEST_METHOD'];

// Tangkap data JSON body
$input = json_decode(file_get_contents("php://input"), true);

// =============== READ (GET) ===============
if ($method == "GET") {

    // Jika ada id → GET detail buku
    if (isset($_GET['id'])) {
        $id = $_GET['id'];
        $q = mysqli_query($conn, "SELECT * FROM buku WHERE id='$id'");
        $data = mysqli_fetch_assoc($q);

        echo json_encode([
            "status" => $data ? "success" : "error",
            "data" => $data
        ]);
        exit;
    }

    // Jika tanpa id → GET semua buku
    $q = mysqli_query($conn, "SELECT * FROM buku ORDER BY id DESC");
    $list = [];
    while ($r = mysqli_fetch_assoc($q)) {
        $list[] = $r;
    }

    echo json_encode([
        "status" => "success",
        "total" => count($list),
        "data" => $list
    ]);
    exit;
}

// =============== CREATE (POST) ===============
if ($method == "POST") {
    $judul = $input['judul'];
    $pengarang = $input['pengarang'];
    $stok = $input['stok'];

    $q = mysqli_query($conn, 
        "INSERT INTO buku (judul, pengarang, stok) 
         VALUES ('$judul', '$pengarang', '$stok')"
    );

    echo json_encode([
        "status" => $q ? "success" : "error",
        "message" => $q ? "Buku berhasil ditambahkan" : "Gagal menambah buku"
    ]);
    exit;
}

// =============== UPDATE (PUT) ===============
if ($method == "PUT") {
    if (!isset($_GET['id'])) {
        echo json_encode([
            "status" => "error",
            "message" => "ID wajib dikirim untuk update"
        ]);
        exit;
    }

    $id = $_GET['id'];
    $judul = $input['judul'];
    $pengarang = $input['pengarang'];
    $stok = $input['stok'];

    $q = mysqli_query($conn, 
        "UPDATE buku SET 
            judul='$judul', 
            pengarang='$pengarang', 
            stok='$stok' 
        WHERE id='$id'"
    );

    echo json_encode([
        "status" => $q ? "success" : "error",
        "message" => $q ? "Buku berhasil diupdate" : "Gagal update"
    ]);
    exit;
}

// =============== DELETE (DELETE) ===============
if ($method == "DELETE") {
    if (!isset($_GET['id'])) {
        echo json_encode([
            "status" => "error",
            "message" => "ID wajib dikirim untuk delete"
        ]);
        exit;
    }

    $id = $_GET['id'];
    $q = mysqli_query($conn, "DELETE FROM buku WHERE id='$id'");

    echo json_encode([
        "status" => $q ? "success" : "error",
        "message" => $q ? "Buku berhasil dihapus" : "Gagal hapus buku"
    ]);
    exit;
}

?>
