<?php
require_once('connect.php');

$name = $_POST['nama'];
$telp = $_POST['no_telp'];
$email = $_POST['email'];
$pass = $_POST['password'];


$querry = "INSERT INTO user (nama, no_telp, email, password) VALUES ('$name', '$telp', '$email', '$pass')";
$sql = mysqli_query($db_connect, $querry);

if ($sql) {
    $response = [
        "error" => false,
        "message" => "Pendaftaran Berhasil",
    ];
} else {
    $response = [
        "error" => true,
        "message" => "Terjadi Kesalahan!",
    ];
}

echo json_encode($response);