<?php
// Include the database connection file
require 'fungsi.php';

// Get id parameter value
$id = $_GET['id'];

// Delete row from the database table
$result = mysqli_query($conn, "DELETE FROM info WHERE id = $id");

// Redirect to the main display page
header("Location: home.php");
?>