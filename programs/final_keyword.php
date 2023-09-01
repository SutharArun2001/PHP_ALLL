<?php
/**
 * Summary of A
 */
class A
{
    /**
     * Final keyword is user to prevent from overriding function 
     * When final keyword is used on class that class can't be inherit 
     * @return mixed  
     */
    final function getname(){
        echo "arun";
    }
}


/**
 * 
 */
class B extends A
{
    /**
     * Summary of getname
     * @return mixed 
     */
    function getname(){
        echo "suthar";
    }
    
}

$obj = new B();

$obj->getname();
?>