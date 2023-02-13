<?php
$servername = "localhost";
$username = "root";
$pass = "";
$dbname = "investment_tracker";

$conn = mysqli_connect($servername, $username, $pass, $dbname);

// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}
// echo "Connected successfully";

?>