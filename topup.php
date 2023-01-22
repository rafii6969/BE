<?php
require_once('connect.php');

parse_str(file_get_contents('php://input'), $VALUE);

$id = $VALUE['id'];
$saldo = $VALUE['saldo'];

$querry = "UPDATE user SET saldo = saldo + '$saldo' WHERE id = '$id'";
$sql = mysqli_query($db_connect, $querry);

if ($sql) {
    $response = [
        "error" => false,
        "message" => "Pengisian Saldo Berhasil",
    ];
} else {
    $response = [
        "error" => true,
        "message" => "Gagal Melakukan Pengisian Saldo",
    ];
}

echo json_encode($response);