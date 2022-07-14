<?php
date_default_timezone_set('Asia/Taipei');


$host = "localhost";
$dbuser = "root";
$dbpassword = "1688";
$dbname = "check_sys";


$query = "UPDATE `checksys` SET `offIp`='140.138.3.243',`onIp`='140.138.3.243' WHERE `offIp`!='-1'";

if (!($database = mysqli_connect("$host", "$dbuser", "$dbpassword")))
    die("Could not connect to database ");
if (!mysqli_select_db($database, $dbname))
    die("Could not open database");
if (!($result = mysqli_query($database, $query))) {
    echo "error";
}

mysqli_close($database);
?>
