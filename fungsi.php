<?php

$server = "localhost";
$username = "root";
$password = "";
$db = "agenda";

$conn = mysqli_connect($server, $username, $password, $db);

if (!$conn){
    die("koneksi gagal" . myqsli_connect_error());
}

$query = "SELECT * FROM info";
$result = mysqli_query($conn, $query);

?>