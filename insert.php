<?php
require 'fungsi.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $title = $_POST['title'];
    $start_event = $_POST['start_event'];
    $end_event = $_POST['end_event'];
    $keterangan = $_POST['keterangan'];

    $query = "INSERT INTO info (title, start_event, end_event, keterangan) VALUES (?, ?, ?, ?)";
    $stmt = mysqli_prepare($conn, $query);
    mysqli_stmt_bind_param($stmt, 'ssss', $title, $start_event, $end_event, $keterangan);

    if (mysqli_stmt_execute($stmt)) {
        header("Location: index.php");
        exit();
    } else {
        echo "Error: " . mysqli_error($conn);
    }

    mysqli_stmt_close($stmt);
}

mysqli_close($conn);
?>