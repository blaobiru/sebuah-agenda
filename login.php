<?php

require 'fungsi.php';

if( isset($_POST["login"]) ){

    $username = $_POST["username"];
    $password = $_POST["password"];

    $result = mysqli_query($conn, "SELECT * FROM user WHERE username = '$username' ");

    //untuk cek username
    if( mysqli_num_rows($result) === 1 ){

        //untuk cek password
        $row = mysqli_fetch_assoc($result);
        if(password_verify($password, $row["password"]) ){
            header("Location: index.php");
            exit;
        }
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

<form action="" method="post">

    <ul>
        <li>
            <label for="username">Username :</label>
            <input type="text" name="username" id="username">
        </li>
        <li>
        <label for="password">Password :</label>
            <input type="password" name="password" id="password">
        </li>
        <li>
            <button type="submit" name="login">Login</button>
        </li>
    </ul>

</form>


</body>
</html>