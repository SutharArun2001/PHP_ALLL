<?php


interface A{
    function hell($a);
}

interface B{
    function by($b);
}
/**
 * In Interface only declaration is done Not implementation or call
 * means that interface must have abstract methods
 * we can't use access modified except public in interface
 * use to implement multiple inheritance
 * 
 * PHP does not support multiple inheritance by using interface it can be done
 */

class C implements A, B{
    /**
     * Summary of hell
     * @param mixed $a
     * @return void
     */
    public function hell($a){
        echo $a;
    }
    /**
     * Summary of by
     * @param mixed $b
     * @return void
     */
    public function by($b){
        echo $b;
    }
}

$test = new C();
$test->hell('a');
$test->by('b');
?>