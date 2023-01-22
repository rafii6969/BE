<?php
require_once('connect.php');

$querry = "SELECT * FROM tempat ORDER BY nama ASC";
$sql = mysqli_query($db_connect, $querry);

$error = true;
$message = "Data tidak ditemukan";
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
    "result" => $result,
];

echo json_encode($response);