<?php 
namespace Controllers;
use Models\Parentnotification;
use Models\Studentnotification;

use Models\Callback;
use Models\Studentparentinbox;
use Models\Studentinbox;
class FirebaseController{
    
    public static function sendMessageToParent($parent_id,$message,$title,$data=null){
        $serverkey="AIzaSyDO3d7Rey45KIoPyUbU_dgjh6rnVgNW-Ys";
        $tokens=[];
        if(Parentnotification::where('parent_id',$parent_id)->count()>0){

            foreach(Parentnotification::where('parent_id',$parent_id)->get() as $parentnotification){
                array_push($tokens,$parentnotification->authkey);
            }
            $header=['Authorization: key='.$serverkey,'Content-Type: Application/json'];
            $msg=[
                'title'=>$title,
                'body'=>$message,
                'data'=>$data
            ];
    
            $payload=[
                'registration_ids'=>$tokens,
                'data'=>$msg
            ];
    
            $studentparentinbox=new Studentparentinbox();
            $studentparentinbox->studentparent_id=$parent_id;
            $studentparentinbox->message=$message;
            $studentparentinbox->hasread=false;
            $studentparentinbox->save();
            $curl = curl_init();
            curl_setopt_array($curl, array(
            CURLOPT_URL => "https://fcm.googleapis.com/fcm/send",
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => "",
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 30,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => "POST",
            CURLOPT_POSTFIELDS => json_encode($payload),
            CURLOPT_HTTPHEADER =>$header,
            ));
    
            $response = curl_exec($curl);
            $err = curl_error($curl);
            curl_close($curl);
    
            if ($err) {
                $c=new Callback();
                $c->notok($err);
                return $c;
            } else {
                return new Callback(['response'=>$response]);
            }
        }else{
            $c=new Callback();
                $c->notok("There are no devices regsterd fro this account");
                return $c;
        }
    }


    public static function sendMessageToStudent($student_id,$message,$title,$data=null){
        $serverkey="AIzaSyDO3d7Rey45KIoPyUbU_dgjh6rnVgNW-Ys";
        $tokens=[];
        if(Studentnotification::where('parent_id',$student_id)->count()>0){

            foreach(Studentnotification::where('student_id',$student_id)->get() as $studentnotification){
                array_push($tokens,$studentnotification->authkey);
            }
            $header=['Authorization: key='.$serverkey,'Content-Type: Application/json'];
            $msg=[
                'title'=>$title,
                'body'=>$message,
                'data'=>$data
            ];
    
            $payload=[
                'registration_ids'=>$tokens,
                'data'=>$msg
            ];
    
            $studentinbox=new Studentinbox();
            $studentinbox->student_id=$student_id;
            $studentinbox->message=$message;
            $studentinbox->hasread=false;
            $studentinbox->save();
            $curl = curl_init();
            curl_setopt_array($curl, array(
            CURLOPT_URL => "https://fcm.googleapis.com/fcm/send",
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => "",
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 30,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => "POST",
            CURLOPT_POSTFIELDS => json_encode($payload),
            CURLOPT_HTTPHEADER =>$header,
            ));
    
            $response = curl_exec($curl);
            $err = curl_error($curl);
            curl_close($curl);
    
            if ($err) {
                $c=new Callback();
                $c->notok($err);
                return $c;
            } else {
                return new Callback(['response'=>$response]);
            }
        }else{
            $c=new Callback();
                $c->notok("There are no devices regsterd fro this account");
                return $c;
        }
    }

    public static function sendMessageToTeacher($teacher_id,$message,$title,$data=null){
        $serverkey="AIzaSyDO3d7Rey45KIoPyUbU_dgjh6rnVgNW-Ys";
        $tokens=[];
        if(Teachernotification::where('id',$teacher_id)->count()>0){

            foreach(Teachernotification::where('teacher_id',$teacher_id)->get() as $studentnotification){
                array_push($tokens,$studentnotification->authkey);
            }
            $header=['Authorization: key='.$serverkey,'Content-Type: Application/json'];
            $msg=[
                'title'=>$title,
                'body'=>$message,
                'data'=>$data
            ];
    
            $payload=[
                'registration_ids'=>$tokens,
                'data'=>$msg
            ];
    
            $studentinbox=new Studentinbox();
            $studentinbox->student_id=$student_id;
            $studentinbox->message=$message;
            $studentinbox->hasread=false;
            $studentinbox->save();
            $curl = curl_init();
            curl_setopt_array($curl, array(
            CURLOPT_URL => "https://fcm.googleapis.com/fcm/send",
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => "",
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 30,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => "POST",
            CURLOPT_POSTFIELDS => json_encode($payload),
            CURLOPT_HTTPHEADER =>$header,
            ));
    
            $response = curl_exec($curl);
            $err = curl_error($curl);
            curl_close($curl);
    
            if ($err) {
                $c=new Callback();
                $c->notok($err);
                return $c;
            } else {
                return new Callback(['response'=>$response]);
            }
        }else{
            $c=new Callback();
                $c->notok("There are no devices regsterd fro this account");
                return $c;
        }
    }

    public static function sendFeeMessageToParent($parent_id,$fee){
        $serverkey="AIzaSyDO3d7Rey45KIoPyUbU_dgjh6rnVgNW-Ys";
        $tokens=[];
        if(Parentnotification::where('parent_id',$parent_id)->count()>0){

            foreach(Parentnotification::where('parent_id',$parent_id)->get() as $parentnotification){
                array_push($tokens,$parentnotification->authkey);
            }
            $header=['Authorization: key='.$serverkey,'Content-Type: Application/json'];
            $msg=[
                'title'=>$fee->title,
                'body'=>'New Fee. Please refer to Fee Id #'.$fee->id.' for More Detail',
                'fee'=>$fee
            ];
    
            $payload=[
                'registration_ids'=>$tokens,
                'data'=>$msg
            ];
    
            $studentparentinbox=new Studentparentinbox();
            $studentparentinbox->studentparent_id=$parent_id;
            $studentparentinbox->message="New Fee. Please refer to Fee Id #'.$fee->id.' for More Detail";
            $studentparentinbox->hasread=false;
            $studentparentinbox->save();
            $curl = curl_init();
            curl_setopt_array($curl, array(
            CURLOPT_URL => "https://fcm.googleapis.com/fcm/send",
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => "",
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 30,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => "POST",
            CURLOPT_POSTFIELDS => json_encode($payload),
            CURLOPT_HTTPHEADER =>$header,
            ));
    
            $response = curl_exec($curl);
            $err = curl_error($curl);
            curl_close($curl);
    
            if ($err) {
                $c=new Callback();
                $c->notok($err);
                return $c;
            } else {
                return new Callback(['response'=>$response]);
            }
        }else{
            $c=new Callback();
                $c->notok("There are no devices regsterd fro this account");
                return $c;
        }
    }
}