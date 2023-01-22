<?php
require_once('connect.php');

$idUser = $_GET['id_user'];

$conn = $db_connect;

$error = true;
$message = "Data tidak ditemukan";
$result;

$querryParkir = "SELECT * FROM parkir WHERE id_user = '$idUser' AND (status = 'M' OR status = 'P')";
$sqlParkir = mysqli_query($conn, $querryParkir);
while ($data = $sqlParkir->fetch_assoc()) {
    if ($data != null) {
        $error = false;
        $message = "Success";
        $result = [
            "id" => $data['id'],
            "id_user" => $data['id_user'],
            "kendaraan" => getKendaraan($data['id_kendaraan']),
            "tempat" => getTempat($data['id_tempat']),
            "waktu_masuk" => $data['waktu_masuk'],
            "waktu_bayar" => $data['waktu_bayar'],
            "waktu_keluar" => $data['waktu_keluar'],
            "biaya" => $data['biaya'],
            "status" => $data['status']
        ];
    }
}

function getKendaraan($id)
{
    global $conn;
    $querryKendaraan = "SELECT merek, model, no_polisi, jenis FROM kendaraan WHERE id = '$id'";
    $sqlKendaraan = mysqli_query($conn, $querryKendaraan);
    while ($data = $sqlKendaraan->fetch_assoc()) {
        if ($data != null) {
            $kendaraan = $data;
        }
    }
    return $kendaraan;
}

function getTempat($id)
{
    global $conn;
    $querryTempat = "SELECT nama, kota, tarif_mobil, tarif_motor FROM tempat WHERE id = '$id'";
    $sqlTempat = mysqli_query($conn, $querryTempat);
    while ($data = $sqlTempat->fetch_assoc()) {
        if ($data != null) {
            $tempat = $data;
        }
    }
    return $tempat;
}

$response = [
    "error" => $error,
    "message" => $message,
    "result" => $result
];

echo json_encode($response);
