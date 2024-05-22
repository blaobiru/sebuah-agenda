<?php
require 'fungsi.php';

if (isset($_GET['id'])) {
    $info_id = $_GET['id'];

    $query = "SELECT * FROM info WHERE id = ?";
    $stmt = mysqli_prepare($conn, $query);
    mysqli_stmt_bind_param($stmt, 'i', $info_id);
    mysqli_stmt_execute($stmt);
    $result = mysqli_stmt_get_result($stmt);

    if (mysqli_num_rows($result) == 1) {
        $row = mysqli_fetch_assoc($result);
        $title = $row['title'];
        $start_event = $row['start_event'];
        $end_event = $row['end_event'];
        $keterangan = $row['keterangan'];
    } else {
        echo "info yang dicari tidak ada";
        exit();
    }

    mysqli_stmt_close($stmt);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $columns_to_update = [];
    $params = [];
    $types = '';

    if (!empty($_POST['title'])) {
        $title = $_POST['title'];
        $columns_to_update[] = "title = ?";
        $params[] = $title;
        $types .= 's';
    }
    if (!empty($_POST['start_event'])) {
        $start_event = $_POST['start_event'];
        $columns_to_update[] = "start_event = ?";
        $params[] = $start_event;
        $types .= 's';
    }
    if (!empty($_POST['end_event'])) {
        $end_event = $_POST['end_event'];
        $columns_to_update[] = "end_event = ?";
        $params[] = $end_event;
        $types .= 's';
    }
    if (!empty($_POST['keterangan'])) {
        $keterangan = $_POST['keterangan'];
        $columns_to_update[] = "keterangan = ?";
        $params[] = $keterangan;
        $types .= 's';
    }

    if (!empty($columns_to_update)) {
        $update_query = "UPDATE info SET " . implode(", ", $columns_to_update) . " WHERE id = ?";
        $stmt = mysqli_prepare($conn, $update_query);
        $params[] = $info_id;
        $types .= 'i';
        mysqli_stmt_bind_param($stmt, $types, ...$params);

        if (mysqli_stmt_execute($stmt)) {
            header("Location: index.php");
            exit();
        } else {
            echo "Error: " . mysqli_error($conn);
        }

        mysqli_stmt_close($stmt);
    } else {
        echo "No changes made.";
    }
}

mysqli_close($conn);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Data</title>
</head>
<body>
    <h2>Form Edit Data</h2>
    <form action="" method="post">
        <label for="title">Title:</label>
        <input type="text" name="title" id="title" value="<?php echo htmlspecialchars($title); ?>"><br>

        <label for="start_event">Mulai:</label>
        <input type="datetime-local" name="start_event" id="start_event" value="<?php echo htmlspecialchars($start_event); ?>"><br>

        <label for="end_event">Kelar:</label>
        <input type="datetime-local" name="end_event" id="end_event" value="<?php echo htmlspecialchars($end_event); ?>"><br>
        
        <label for="keterangan">Keterangan:</label>
        <textarea name="keterangan" id="keterangan"><?php echo htmlspecialchars($keterangan); ?></textarea><br>

        <input type="submit" value="Update">
    </form>
    <a href="index.php">Kembali</a>
</body>
</html>