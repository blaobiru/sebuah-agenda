<?php
require 'fungsi.php';

session_start();

if( isset($_POST["login"]) ){

    $username = $_POST["username"];
    $password = $_POST["password"];

    $sql = "SELECT * FROM user WHERE username='$username' AND password='$password'";
    $result = $conn->query($sql);

    if ($result->num_rows == 1) {
        $row = $result->fetch_assoc();
        $_SESSION['username'] = $username;
        $_SESSION['role'] = $row['status'];

        if ($row['status'] == 'admin') {
            header("location: adminhome.php");
        } else {
            header("location: home.php");
        }
        exit;
    } else {
        $error = "gagal login";
    }
}

?>
<!DOCTYPE html>
<html>
<head>
    <title>sebuah halaman login</title>
</head>
<body>

<h1>halaman login</h1>

<?php if(isset($error)): ?>
<p style="color: red;"><?php echo $error; ?></p>
<?php endif; ?>

<form action="" method="post">

    <ul>
        <li>
            <label for="username">Username :</label>
            <input type="text" name="username" id="username" required>
        </li>
        <li>
            <label for="password">Password :</label>
            <input type="password" name="password" id="password" required>
        </li>
        <li>
            <button type="submit" name="login">Login</button>
        </li>
    </ul>

</form>

</body>
</html>