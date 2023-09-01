<?php

class personal{
    public static $name = "arun";
    public static function getname(){
        echo self::$name;
    } 
}

$obj = new personal();

personal::$name;
personal::getname();
// $obj->getname();

?>