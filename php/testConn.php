<?php

$host = "140.138.77.70";
$dbuser = "CS380B";
$dbpassword = "CS380B";
$dbname = "CS380B";

$query = "NSEIRT INTO S1103301 (userId, todaydate, startTime, finishTime, yr, mon) VALUES ('$userId','$date','$startTime','0','$year','$month')";

if (!($database = mysqli_connect("$host", "$dbuser", "$dbpassword")))
    echo "Could not connect to database";
if (!mysqli_select_db($database, $dbname))
    echo  "Could not open products database </body></html>";
if (!($result = mysqli_query($database, $query))) {
    echo "queryerror";
}

mysqli_close($database);
