<?php
session_start();

require 'fungsi.php';
$query = "SELECT * FROM info";
$result = mysqli_query($conn, $query);

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Sebuah agenda</title>
</head>
<body>
    <h1>Selamat datang di sebuah agenda</h1>

    <h2><a href="add.php">tambah data</a></h2>
    <h2><a href="logout.php">logout</a></h2>
    <table border = "1" cellpadding= "50" cellspacing="0">
        <tr>
            <th>Mod</th>
            <th>title</th>
            <th>mulai</th>
            <th>kelar</th>
            <th>ket.</th>
        </tr>
        <?php
    
          
        while ($row = mysqli_fetch_assoc($result)) { ?>
            <tr>
                <td>
                    <a href="edit.php?id=<?php echo $row['id']; ?>">edit</a> || 
                    <a href="delete.php?id=<?php echo $row['id']; ?>">delete</a>
                </td>
                <td><?php echo $row['title']; ?></td>
                <td><?php echo $row['start_event']; ?></td>
                <td><?php echo $row['end_event']; ?></td>
                <td><?php echo $row['keterangan']; ?></td>
            </tr>
            <?php }
        
        ?>
        
    </table>
</body>
</html> 