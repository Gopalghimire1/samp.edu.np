<?php
namespace Controllers;
use Models\Studentparent;
use Models\Student;
use Models\Parentfee;
use Models\Parentpaid;
use Models\Studentparentinbox;

class ParentController{
    private $parent_id;
    public $parent;
    public $students;

    public $duefees;
    public $paidfees;
    public $paids;
    public function __construct($parent_id){
        $this->parent_id=$parent_id;
        $this->parent=Studentparent::where('id',$parent_id)->first();
        $this->students=$this->parent->Students;
        $this->duefees=Parentfee::where('studentparent_id',$this->parent->id)->where('due','>',0)->latest()->get();
        $this->paidfees=Parentfee::where('studentparent_id',$this->parent->id)->where('due',0)->latest()->get();
    }   

    public function studentCount(){
        return count($this->students);
    }

    public static function countUnreadMessage($parent_id){
        return Studentparentinbox::where('studentparent_id',$parent_id)->where('hasread',false)->count();
    }

    public static function getMessages($parent_id){
        return Studentparentinbox::where('studentparent_id',$parent_id)->where('hasread',false)->get();
    }

    public static function readMessages($parent_id){
         Studentparentinbox::where('studentparent_id',$parent_id)->where('hasread',false)->update(['hasread'=>true]);
    }

    




    
}