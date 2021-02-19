<?php
namespace Models;

class Callback{
    public $success;
    public $data;
    public $erroecode;
    public $error;
   

    public function __construct($array=[]){
        foreach ($array as $key => $value) {
            $this->data[$key]=$value;
        }
        $this->success=true;
    }
    public function loaddata($array){
        foreach ($array as $key => $value) {
            $this->data[$key]=$value;
        }
    }

    public function ok(){
        $this->success=true;
    }

    public function notok($error){
        $this->success=false;
        $this->error=$error;
    }
}