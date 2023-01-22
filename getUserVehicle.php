<?php
require_once('connect.php');

$idUser = $_GET['id_user'];

$querry = "SELECT * FROM kendaraan WHERE id_user = '$idUser' ORDER BY jenis ASC";
$sql = mysqli_query($db_connect, $querry);

$error = true;
$message = "Anda belum memiliki kendaraan";
$result = array();

while ($fetchData = $sql->fetch_assoc()) {
	if ($fetchData != null) {
		$error = false;
		$message = "Success";
		$result[] = $fetchData;
	}
}

$response = [
	"error" => $error,
	"message" => $message,
	"result" => $result
];

echo json_encode($response);