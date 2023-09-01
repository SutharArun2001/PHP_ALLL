<?php
$number = 1414214;
$reminder;
$sum=0;
for($i=0;$i<strlen($number);$i++){
    $reminder = $number % 10;
    $sum = $sum + $reminder;
    $number = $number / 10;
}
echo $sum;  
?>