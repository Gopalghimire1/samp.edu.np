<?php 

namespace Controllers;

use Models\Parentfee;
use Models\StudentParent;
use Models\Receit;
use Controllers\FirebaseController;
use Controllers\SmsController;

class ReceiptController{
    private $receipt;
    private $paid;
    private $due;
    public function __construct($receipt){
        $this->receipt=$receipt;
        $this->paid=Parentfee::where('receit_id',$receipt->id)->where('due',0)->get();
        $this->due=Parentfee::where('receit_id',$receipt->id)->where('due','>',0)->get();
    }

    public function getOverView(){
        $paids=0;
        $dues=0;

        if($this->paid!=null){
            $paids=$this->paid->count();
        }
        if($this->due!=null){
            $dues=$this->due->count();
        }
        return ['paids'=>$paids,'dues'=>$dues];
    }

    public function sendDueMessage(){
        foreach($this->due as $duefee){
            $parent=Studentparent::find($duefee->studentparent_id);
            $message="Reminder For Due, Receit no #". $duefee->id;
            $title="Due Fee";
            FirebaseController::sendMessageToParent($parent->id,$message,$title,$duefee);
            // SmsController::sendMessage($parent->phone,$message);
        }
    }
}