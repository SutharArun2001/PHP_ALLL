<?php
$num = 1234;
$rvsnum;
$reminder;
while(floor($num)!=0){
    $reminder = $num % 10;
    $rvsnum = $rvsnum * 10 + $reminder;
    $num = $num / 10;
}

echo $rvsnum;
?>