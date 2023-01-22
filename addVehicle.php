<?php
require_once('connect.php');

$idUser = $_POST['id_user'];
$brand = $_POST['merek'];
$model = $_POST['model'];
$color = $_POST['warna'];
$number = $_POST['no_polisi'];
$type = $_POST['jenis'];

$id = $idUser."-".$type.$number;

$querry = "INSERT INTO kendaraan VALUES ('$id', '$idUser', '$brand', '$model', '$color','$number', '$type')";
$sql = mysqli_query($db_connect, $querry);

if ($sql) {
    $response = [
        "error" => false,
        "message" => "Kendaraan berhasil ditambahkan",
    ];
} else {
    $response = [
        "error" => true,
        "message" => "Gagal menambahkan kendaraan",
    ];
}

echo json_encode($response);