<?php
require_once('../connect.php');

$userId = $_POST['user-id'];
$vehicleId = $_POST['vehicle-id'];
$placeId = $_POST['place-id'];

$querry = "INSERT INTO parkir (id_user, id_kendaraan, id_tempat) VALUES ('$userId', '$vehicleId', '$placeId')";
$sql = mysqli_query($db_connect, $querry);

if ($sql) {
    $response = [
        "error" => false,
        "message" => "Pengunjung berhasil memasuki area parkir. Selamat datang!",
    ];
} else {
    $response = [
        "error" => true,
        "message" => "Pengunjung tidak dapat memasuki area parkir!",
    ];
}

echo json_encode($response);