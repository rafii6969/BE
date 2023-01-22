<?php
require_once('connect.php');

parse_str(file_get_contents('php://input'), $VALUE);

$id = $VALUE['id'];
$name = $VALUE['nama'];
$telp = $VALUE['no_telp'];
$email = $VALUE['email'];
$pass = $VALUE['password'];

$querry = "UPDATE user SET nama = '$name', no_telp = '$telp', email = '$email', password = '$pass' WHERE id = '$id'";
$sql = mysqli_query($db_connect, $querry);

if ($sql) {
    $response = [
        "error" => false,
        "message" => "Profil Telah Diperbaharui",
    ];
} else {
    $response = [
        "error" => true,
        "message" => "Tidak Dapat Memperbaharui Profil",
    ];
}

echo json_encode($response);