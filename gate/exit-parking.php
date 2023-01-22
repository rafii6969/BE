<?php
require_once('../connect.php');

parse_str(file_get_contents('php://input'), $VALUE);
date_default_timezone_set('Asia/Jakarta');

$id = $VALUE['id'];
$placeID = $VALUE['place-id'];
$dateNow = date("Y-m-d H:i:s");

$querry = "UPDATE parkir 
SET parkir.waktu_keluar = '$dateNow', parkir.status = 'K'
WHERE parkir.id = '$id' AND parkir.status = 'P' AND parkir.id_tempat = '$placeID'";

$sql = mysqli_query($db_connect, $querry);

if (mysqli_affected_rows($db_connect) > 0) {
    $response = [
        "error" => false,
        "message" => "Pembayaran berhasil diverivikasi. Pengunjung dapat keluar dari area parkir, sampai jumpa lagi...",
    ];
} else {
    $response = [
        "error" => true,
        "message" => "Pembayaran gagal diverivikasi. Pengunjung tidak dapat keluar dari area parkir!",
    ];
}

echo json_encode($response);