<?php
date_default_timezone_set('Asia/Taipei');
$userId = $_POST['userId'];

$day = date("d");
$startTime = date("U");
$year = date("Y");
$month = date("n");

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

$host = "localhost";
$dbuser = "root";
$dbpassword = "1688";
$dbname = "check_sys";

if (!($database = mysqli_connect("$host", "$dbuser", "$dbpassword")))
    die("Could not connect to database </body></html>");
if (!mysqli_select_db($database, $dbname))
    die("Could not open products database </body></html>");

$ip = getRequestIp();
$query = "UPDATE `checksys` SET `finishTime`=-1,`offIp`='-1',`dutyTime`=0 WHERE `finishTime`= 0 and `userId`=$userId";
mysqli_query($database, $query);


$query = "INSERT INTO `checksys`(`userId`, `year`, `month`, `day`, `startTime`, `finishTime`,`onIp`,`offIp`) VALUES ('$userId','$year','$month',' $day','$startTime','0','$ip','0')";
mysqli_query($database, $query);

mysqli_close($database);
