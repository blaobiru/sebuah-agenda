<?php
require 'fungsi.php';
query("SELECT * FROM user");

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Sebuah agenda</title>
</head>
<body>
    <h1>Selamat datang di sebuah agenda</h1>

    <table border = "1" cellpadding= "50" cellspacing="0">

        <tr>
            <th>Mod</th>
            <th>Tanggal</th>
            <th>Bulan</th>
            <th>Tahun</th>
            <th>Ket.</th>
        </tr>

    </table>
</body>
</html>