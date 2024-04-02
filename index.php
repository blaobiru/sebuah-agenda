<?php
require 'fungsi.php';
$query = "SELECT * FROM info";
$result;
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
            <th>mulai</th>
            <th>kelar</th>
            <th>ket.</th>
        </tr>
        <?php
        while ($rows) {?>
            <tr>
                <td><?php echo $row['title']; ?></td>
                <td><?php echo $row['keterangan']; ?></td>
                <td><?php echo $row['start_event']; ?></td>
                <td><?php echo $row['end_event']; ?></td>
            </tr>
            <?php }
        ?>
    </table>
</body>
</html>