<?php

$host = "localhost";
$db = "SS5";
$user = "root";
$pwd = "";
$conn = mysqli_connect($host, $user, $pwd, $db) or die("Error in connection");
mysqli_set_charset($conn,"utf8");
$sql = "SELECT * FROM tbl_property";
$result = mysqli_query($conn, $sql) or die("Error in Selecting DB");
if(!$conn){
    die("Error in connection db".mysqli_connect_error());
    exit();
}
?>