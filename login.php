<?php
require_once('connect.php');

$email = $_POST['email'];
$password = $_POST['password'];


$querry = "SELECT * FROM user WHERE email = '$email' AND password = '$password'";
$sql = mysqli_query($db_connect, $querry);

$error = true;
$message = "Terjadi Kesalahan!";
$result;

while ($fetchData = $sql->fetch_assoc()) {
	if ($fetchData != null) {
		$error = false;
		$message = "Login Berhasil";
		$result = $fetchData;
	}
}

$response = [
	"error" => $error,
	"message" => $message,
	"result" => $result
];

echo json_encode($response);