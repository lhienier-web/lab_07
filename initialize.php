<?php
session_start(); //[cite: 3]

// Replace these with your Aiven Database connection details
$host = "your-aiven-host.aivencloud.com"; 
$user = "avnadmin"; 
$password = "your-aiven-password"; 
$database = "defaultdb"; // Your Aiven DB name
$port = 25060; // Standard Aiven port

$connection = new mysqli($host, $user, $password, $database, $port); //[cite: 3]

if($connection->connect_error) { //[cite: 3]
    die("Connection failed: " . $connection->connect_error); //[cite: 3]
}
?>