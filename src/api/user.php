<?php

header("Content-Type:application/json");

$host = "localhost";
$dbuser = "root";
$dbpassword = "1688";
$dbname = "check_sys";


$query = "SELECT * FROM admin ";

if (!($database = mysqli_connect("$host", "$dbuser", "$dbpassword")))
    die("Could not connect to database ");
if (!mysqli_select_db($database, $dbname))
    die("Could not open database");
if (!($result = mysqli_query($database, $query))) {
    echo "error";
}

$myArray = array();
while($row = $result->fetch_assoc()) {
    $myArray[] = $row;
}
echo json_encode($myArray);
?>