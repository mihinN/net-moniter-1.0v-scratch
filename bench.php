<?php
$kb=1024;
echo "streaming $kb Kb...<!-";
flush();
$time = explode(" ",microtime());
$start = $time[0] + $time[1];
for($x=0;$x<$kb;$x++){
    echo str_pad('', 1024, '.');
    flush();
}
$time = explode(" ",microtime());
$finish = $time[0] + $time[1];
$deltat = $finish - $start;
echo "-> Test finished in $deltat seconds. Your speed is ". round($kb / $deltat, 3)."Kb/s";
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="refresh" content="1" >
    <title></title>
</head>
<body>

</body>
</html>