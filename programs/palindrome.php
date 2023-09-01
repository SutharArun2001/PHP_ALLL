<?php
$number = 1221;
$rvsnumber=0;
$num=$number;

while(floor($num)!=0){
    $reminder = $num % 10;
    $rvsnumber = $rvsnumber*10+$reminder;
    $num = $num / 10;
}
if($rvsnumber==$number){    
    echo $number . " is palindrome number";
}else{
    echo $number . "is not palindrome number";
}

?>