<?php
namespace Controllers;
use Models\Studentparent;
use Models\Callback;
class SmsController{
    
    public static function sendParent($parent_id,$fee){

        $username = 'demotesting3';
        $password = 'demotesting3';
        $contacts = "";
        $from = 'TEXTID';
        $parent=Studentparent::where('id',$parent_id)->first();
        $sms_text = $fee->title .". Please refer To <a href='google.com'>".$fee->id."</a> for detail.";
        $ch = curl_init();
        curl_setopt($ch,CURLOPT_URL, "http://sms.bulksmssale.com/app/smsapi/index.php");
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($ch, CURLOPT_POST, 1);
        curl_setopt($ch, CURLOPT_POSTFIELDS, "username=".$username."&password=".$password."&campaign=6563&routeid=100233&type=text&contacts=".$parent->phone."&senderid=".$from."&msg=".$sms_text);
        $response = curl_exec($ch);
        $err = curl_error($ch);
        curl_close($ch);

        if ($err) {
            $c=new Callback();
            $c->notok($err);
            return $c;
        } else {
            return new Callback(['response'=>$response]);
        }
    }

    public static function sendMessage($phone,$sms_text){
        $username = 'demotesting3';
        $password = 'demotesting3';
        $from = 'TEXTID';
        $ch = curl_init();
        curl_setopt($ch,CURLOPT_URL, "http://sms.bulksmssale.com/app/smsapi/index.php");
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($ch, CURLOPT_POST, 1);
        curl_setopt($ch, CURLOPT_POSTFIELDS, "username=".$username."&password=".$password."&campaign=6563&routeid=100233&type=text&contacts=".$phone."&senderid=".$from."&msg=".$sms_text);
        $response = curl_exec($ch);
        $err = curl_error($ch);
        curl_close($ch);

        if ($err) {
            $c=new Callback();
            $c->notok($err);
            return $c;
        } else {
            return new Callback(['response'=>$response]);
        }
    } 
}