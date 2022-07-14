<?php

date_default_timezone_set('Asia/Taipei');

$year = $_POST['year'];
$month = $_POST['month'];

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

$num = 0;
while ( $row = mysqli_fetch_row( $result ) )
{
    $num++;
}

print("<table><tr><th>姓名</th><th>工作時數</th><th>小計</th></tr>");
for ($i=1;$i<=$num;$i++)
{
    $query = "SELECT  SUM(checksys.dutyTime) FROM checksys INNER JOIN admin on admin.AdminId=checksys.userId WHERE userId='$i' AND checksys.year='$year' AND checksys.month='$month' ";
    $res =mysqli_fetch_row(mysqli_query($database, $query));
    $tot=$res[0];
    $query = "SELECT admin.AdminName FROM admin  WHERE admin.Adminid =$i";
    $res =mysqli_fetch_row(mysqli_query($database, $query));
    $name=$res[0];
    if($tot==NULL)
        $tot =0;
    $totM = $tot*168;
    print("<tr><td>$name</td><td>$tot</td><td>$totM</td></tr>");
}
print("</table>");



?>