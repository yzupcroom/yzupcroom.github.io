<?php
date_default_timezone_set('Asia/Taipei');
$userId = $_POST['userId'];
$year = date("Y");
$month = date("n");

$host = "localhost";
$dbuser = "root";
$dbpassword = "1688";
$dbname = "check_sys";


$query = "SELECT * FROM `checksys` WHERE `userId` = '$userId' and `month`=$month and `year`=$year ORDER BY `checkId` DESC ";

if (!($database = mysqli_connect("$host", "$dbuser", "$dbpassword")))
    die("Could not connect to database ");
if (!mysqli_select_db($database, $dbname))
    die("Could not open database");
if (!($result = mysqli_query($database, $query))) {
    echo "error";
}

print("<table id='info'><tr><th>日期</th><th>上班時間</th><th>下班時間</th><th>上班打卡ip</th><th>下班打卡ip</th><th>工作時數</th></tr>");
while ( $row = mysqli_fetch_row( $result ) )
{
    $startTime =date("G:i:s",$row[5]); ;
    if($row[6]==0 or $row[6]==-1)
    {
        $finishTime = '-';
        $offIp='-';
    }
    else
    {
        $finishTime=date("G:i:s",$row[6]); 
        $offIp=$row[8];
    }
    $date=$row[2]."/".$row[3]."/".$row[4];
    $onIp=$row[7];
    $workhour=$row[9];
    
    print("<tr><td>$date</td><td>$startTime</td><td>$finishTime</td><td>$onIp</td><td>$offIp</td><td>$workhour</td></tr>");

}
print("</table>");

mysqli_close($database);
