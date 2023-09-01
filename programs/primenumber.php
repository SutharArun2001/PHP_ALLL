<?php
$number = 12;
$flag = 0;
for ($i = 2; $i <= $number - 1; $i++) {
    if ($number % $i == 0) {
        $flag = 1;
    }
}
if ($flag == 0) {
    echo $number . " is prime number";
} else {
    echo $number . " is not prime number";
}
?>