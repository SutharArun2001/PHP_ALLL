<?php
namespace App\Http\Service;


class DemoService
{
    private $id;
    public function __construct($id){
        $this->id = $id;
    }   
    public function test($id){
        // $info = $this->id;
        $info = $this->$id;
        return $info;
    }
}

?>