<?php
require_once('connect.php');

parse_str(file_get_contents('php://input'), $VALUE);
date_default_timezone_set('Asia/Jakarta');

$id = $VALUE['id'];
$idUser = $VALUE['id_user'];
$cost = $VALUE['cost'];
$dateNow = date("Y-m-d H:i:s");

$querry = "UPDATE user, parkir 
SET user.saldo = user.saldo - '$cost', 
parkir.waktu_bayar = '$dateNow',
parkir.biaya = '$cost',
parkir.status = 'P'
WHERE user.id = '$idUser' AND parkir.id = '$id'";

$sql = mysqli_query($db_connect, $querry);

if ($sql) {
    $response = [
        "error" => false,
        "message" => "Pembayaran Berhasil",
    ];
} else {
    $response = [
        "error" => true,
        "message" => "Pembayaran Gagal",
    ];
}

echo json_encode($response);