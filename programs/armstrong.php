<?php
$number = 407;
$testnumber=$number;
$sum=0;
$rem;
while($testnumber!=0){
    $rem = $testnumber % 10;
    $sum = $sum + ($rem * $rem * $rem);
    $testnumber = $testnumber / 10;
}

echo $sum."<br>";
echo $number;
if($number == $sum){
    echo $number . " is armstrong number";
}else{
    echo $number . " is not armstrong number";
}   
?>