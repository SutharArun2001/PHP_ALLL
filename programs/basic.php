<?php
/*

    scope of variables
    $x =5;
    $y =10;

    function add(){
    $GLOBALS['x'] = 20;
    }
add();
echo "value of y is " . $x;
*/ 
// ------object and constructor-------
// class car{
//     public $color;
//     public $model;
//     public function __construct($color,$model){
//         $this->color=$color;
//         $this->model = $model;
//     }
//     public function msg(){
//         echo "Car is ".$this->model. " with " .$this->color. " color";
//     }
// }
// $mycar =new car('red','audi');
// echo $mycar->msg();
// -----These are String function-------
// $stringvalue = "Arun suthar";
// allstringfun($stringvalue);
// function allstringfun($strvalue){
//     echo "strlen() function return :-" . strlen($strvalue)."<br>";
//     echo "str_word_count() function return :-" . str_word_count($strvalue)."<br>";
//     echo "strrev() function return :-" . strrev($strvalue) . "<br>";
//     echo "strpos() function return :-" . strpos($strvalue, "suthar")."<br>";
//     echo "str_replace function return " . str_replace("suthar", "kumar", $strvalue);
// }
// -----These are math funcations ------
// echo pi()."<br>";
// echo min(0, 3, 55, 66, 3, 22, 11)."<br>";
// echo max(333, 6, 55, 44, 22, 11, 555)."<br>";
// echo abs(-5)."<br>";
// echo sqrt(16)."<br>";
// echo round(00.51)."<br>";
// echo round(00.49)."<br>";
// echo rand()."<br>";
// echo rand(10, 140)."<br>";

// ------ constant variable -------
// define('compnay', 'onGraph');
// echo compnay;
// define('friends', [
//     'arun',
//     'mahesh',
//     'muskan',
//     'nilabh'
// ]);
// echo friends[2];

// $x=5;
// $y=10;
// echo $x==$y?"true":"false";

// $colors = array('red', 'yellow', 'blue', 'white', 'orange');
// foreach($colors as $s){
//     echo $s . "<br>";
// }
// 
// function add(int $a, int $b){
//     return $a + $b;
// }
// echo add(5, "5");

$string = 'arun kumar';
// echo strpos($string,'kumar');
// echo preg_match('/kumar/i',$string);
function finder($stringg){
    if(preg_match('/kumar/i',$stringg)){
        echo "true";
    }
    else{
        echo "false";
    }
}
finder($string);


?>   
