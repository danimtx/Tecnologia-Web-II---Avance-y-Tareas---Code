<?php

//date_default_timezone_set('UTC');
$x = $_GET['x'];
$y = $_GET['y'];
$date1 = date_create($x);  
$date2 = date_create($y);

$interval = date_diff($date1, $date2);

echo "La diferencia de dias entre ". $x . " y " . $y. " son ";
echo $interval->format('%R%a días');
?>