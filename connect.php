<?php

define('HOST', 'localhost');
define('USERNAME', 'root');
define('PASSWORD', '');
define('DB', 'simple_parking_app');

$db_connect = mysqli_connect(HOST, USERNAME, PASSWORD, DB) or die('failed to connect database'); 

header('Content-Type: aplication/json');