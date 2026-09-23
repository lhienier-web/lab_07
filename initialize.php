<?php

session_start();

$host = getenv('DB_HOST');
$user = getenv('DB_USER');
$password = getenv('DB_PASSWORD');
$database = getenv('DB_NAME');
$port = getenv('DB_PORT');

$connection = new mysqli(
    $host,
    $user,
    $password,
    $database,
    $port
);

if ($connection->connect_error) {
    die("Connection failed: " . $connection->connect_error);
}
?>
