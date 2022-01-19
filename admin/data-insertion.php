<?php
include "conn.php";

function emptyChecker(){
    foreach ($_POST as $v) {
        if (empty($v)) {
            return true;
        }
    }
    return false;
}
if (emptyChecker()) {
    header('Content-Type: application/json; charset=utf-8');
    echo json_encode(array('status' => 'Failure', 'message' => "Input kosong"));
} else {
    $nama_pelanggan = $_POST["nama-pelanggan"];
    $nomor_telepon = $_POST["nomor-telepon"];
    $bulan_mulai = $_POST["bulan-mulai"];
    $paket_dipilih = $_POST["paket-dipilih"];

    $queries = "INSERT INTO tb_reservasi (nama_pelanggan, no_telephone, bulan_mulai, paket_dipilih) VALUES ('$nama_pelanggan', '$nomor_telepon', '$bulan_mulai', '$paket_dipilih')";

    $result = $conn->query($queries);
    header('Content-Type: application/json; charset=utf-8');
    if ($result === TRUE) {
        echo json_encode(array('status' => 'OK', 'message' => "Reservasi anda berhasil"));
    } else {
        echo json_encode(array('status' => 'Failure', 'message' => "Error: " . $sql . "<br>" . $conn->error));
    }

    $conn->close();
}