<?php

$year = date("Y");
$month = date("n");
print("<form><select id ='year'>");
for ($i=2;$i>=0;$i--)
{
    $temp = $year -$i;
    if($temp ==$year)
    {
        print('<option value ="'.$temp.'" selected="selected" >'.$temp.'</option>');
    }
    else
    {
        print('<option value ="'.$temp.'" >'.$temp.'</option>');
    }
}
print("</select>");


print("<select id ='month'>");
for ($i=1;$i<=12;$i++)
{
    if($i==$month)
    {
        print('<option value ="'.$i.'" selected="selected">'.$i.'</option>');
    }
    else
    {
        print('<option value ="'.$i.'" >'.$i.'</option>');
    }
}

print("</select>");
print('<input type="button" onclick="hist()" value="Query"/></form>');



?>