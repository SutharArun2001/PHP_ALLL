<?php
$n1=0;
$n2 = 1;
$i=0;
$sum=0;
while($i<10){
    $sum = $n2 + $n1;
    echo $sum . "<br>";
    $n1 = $n2;
    $n2=$sum;
    $i=$i+1;
}
?>