<?php
date_default_timezone_set('Asia/Taipei');
$userId = $_POST['userId'];
// $userId = 1;

$now = date("U");
// $now = 1654422774;
function getRequestIp()
{
    $ip_keys = [
        'HTTP_CLIENT_IP',
        'HTTP_X_FORWARDED_FOR',
        'HTTP_X_FORWARDED',
        'HTTP_X_CLUSTER_CLIENT_IP',
        'HTTP_FORWARDED_FOR',
        'HTTP_FORWARDED',
        'REMOTE_ADDR'
    ];

    foreach ($ip_keys as $key) {
        if (array_key_exists($key, $_SERVER) === true) {
            foreach (explode(',', $_SERVER[$key]) as $ip) {
                $ip = trim($ip);
                if ((bool) filter_var($ip, FILTER_VALIDATE_IP, FILTER_FLAG_IPV4 | FILTER_FLAG_NO_PRIV_RANGE | FILTER_FLAG_NO_RES_RANGE)) {
                    return $ip;
                }
            }
        }
    }

    return isset($_SERVER['REMOTE_ADDR']) ? $_SERVER['REMOTE_ADDR'] : '-';
}

$ip = getRequestIp();
$host = "localhost";
$dbuser = "root";
$dbpassword = "1688";
$dbname = "check_sys";


$query = "UPDATE `checksys` SET `finishTime`='$now',`OffIp`='$ip' WHERE `userId`=$userId AND `finishTime`=0 ORDER BY `checkId` DESC LIMIT 1";

if (!($database = mysqli_connect("$host", "$dbuser", "$dbpassword")))
    die("Could not connect to database ");
if (!mysqli_select_db($database, $dbname))
    die("Could not open database");
if (!($result = mysqli_query($database, $query))) {
    echo "error";
}


$query = "SELECT checkId , (finishTime-startTime) FROM `checksys` WHERE userId=$userId ORDER by checkId desc limit 1 ";
$row = mysqli_fetch_row( mysqli_query($database, $query) );

$totalSecond = $row[1];
$checkId = $row[0];

$hour =  intval($totalSecond/3600);
$remaining = $totalSecond%3600;

if($remaining >=45*60 )
{
    $hour+=1;
}
else if($remaining > 14*60+59 )
{
    $hour+=0.5;
}

$query="UPDATE `checksys` SET `dutyTime`=$hour WHERE checkId = $checkId ";
mysqli_query($database, $query) ;

mysqli_close($database);
