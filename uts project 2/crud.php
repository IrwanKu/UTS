<?php
include 'koneksi.php';

header('Content-Type: application/json');

// CREATE
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $data = json_decode(file_get_contents("php://input"));

    $nama = $data->nama;
    $deskripsi = $data->deskripsi;

    $stmt = $db->prepare("INSERT INTO tabel_data (nama, deskripsi) VALUES (:nama, :deskripsi)");
    $stmt->bindParam(':nama', $nama);
    $stmt->bindParam(':deskripsi', $deskripsi);

    if ($stmt->execute()) {
        echo json_encode(['message' => 'Data berhasil ditambahkan']);
    } else {
        echo json_encode(['message' => 'Gagal menambahkan data']);
    }
}

// READ
elseif ($_SERVER['REQUEST_METHOD'] === 'GET') {
    $stmt = $db->query("SELECT * FROM tabel_data");
    $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
    echo json_encode($result);
}

// UPDATE
elseif ($_SERVER['REQUEST_METHOD'] === 'PUT') {
    parse_str(file_get_contents("php://input"), $data);
    $id = $data['id'];
    $nama = $data['nama'];
    $deskripsi = $data['deskripsi'];

    $stmt = $db->prepare("UPDATE tabel_data SET nama = :nama, deskripsi = :deskripsi WHERE id = :id");
    $stmt->bindParam(':id', $id);
    $stmt->bindParam(':nama', $nama);
    $stmt->bindParam(':deskripsi', $deskripsi);

    if ($stmt->execute()) {
        echo json_encode(['message' => 'Data berhasil diperbarui']);
    } else {
        echo json_encode(['message' => 'Gagal memperbarui data']);
    }
}

// DELETE
elseif ($_SERVER['REQUEST_METHOD'] === 'DELETE') {
    parse_str(file_get_contents("php://input"), $data);
    $id = $data['id'];

    $stmt = $db->prepare("DELETE FROM tabel_data WHERE id = :id");
    $stmt->bindParam(':id', $id);

    if ($stmt->execute()) {
        echo json_encode(['message' => 'Data berhasil dihapus']);
    } else {
        echo json_encode(['message' => 'Gagal menghapus data']);
    }
}
?>
