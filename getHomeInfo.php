<?php
require_once('connect.php');

$idUser = $_GET['id_user'];

$querry = "SELECT 
user.id,
user.nama, 
user.saldo, 
(SELECT COUNT(*) FROM kendaraan 
    WHERE kendaraan.id_user = user.id AND kendaraan.jenis = 'B') 
AS jml_mobil, 
(SELECT COUNT(*) FROM kendaraan 
    WHERE kendaraan.id_user = user.id AND kendaraan.jenis = 'T') 
AS jml_motor 
FROM user WHERE user.id = '$idUser'";

$sql1 = mysqli_query($db_connect, $querry);

$error = true;
$message = "Data tidak ditemukan";
$result;

while ($fetchData = $sql1->fetch_assoc()) {
    if ($fetchData != null) {
        $error = false;
        $message = "Success";
        $result = $fetchData;
    }
}

$response = [
    "error" => $error,
    "message" => $message,
    "result" => $result
];

echo json_encode($response);