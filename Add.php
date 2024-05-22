<?php
require 'fungsi.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset=UTF-8>
    <title>tambah data</title>
</head>
<body>
    <h2>form tambah data</h2>
    <form action="insert.php" method="post" >
        <label for="title">Title:</label>
        <input type="text" name="title" id="title" required><br>

        <label for="start_event">mulai:</label>
        <input type="datetime-local" name="start_event" id="start_event" required><br>

        <label for="end_event">kelar:</label>
        <input type="datetime-local" name="end_event" id="end_event" required><br>
        
        <label for="keterangan">keterangan:</label>
        <textarea name="keterangan" id="keterangan" required></textarea><br>

        <input type="submit" value="add info">
    </form>
</body>

