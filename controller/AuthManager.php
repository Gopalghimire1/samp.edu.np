<?php
namespace Controllers;
use Models\Attendance;
use Models\Student;
use Models\Teacher;
use Models\Studentparent;
use Models\Auth;
class AuthManager{
    private $auth;
    public function __construct(){
        if($this->isLoged()){
            $this->auth=new Auth();
            $this->auth->id=$_SESSION['auth']['id'];
            $this->auth->role=$_SESSION['auth']['role'];
            $this->auth->session_key=$_SESSION['auth']['session_key'];
            $this->auth->refrence_id=$_SESSION['auth']['refrence_id'];
        }else{
            $this->auth=null;
        }
    }

    public function isLoged(){
        if(isset($_SESSION['auth']) || $this->auth!=null){
            return true;
        }else{
            return false;
        }
    }


    public function login($role,$uname,$pass){
        $sucess =false;
        $date=date_create();
        $key =md5( date_timestamp_get($date));
        switch ($role) {
            case student:
            $std = Student::where('email',$uname)->where('password',$pass)->first();
            if($std!=null){
                $sucess=true;
                $this->auth = new Auth();
                $this->auth->role=$role;
                $this->auth->session_key=$key;
                $this->auth->refrence_id=$std->id;
                $this->auth->save();
                $_SESSION['auth']=$this->auth->toArray();
            }
            break;
            case studentparent:
            $stdparent = Studentparent:: where('email',$uname)->where('password',$pass)->first();
            if($stdparent!=null){
                $sucess = true;
                $this->auth = new Auth();
                $this->auth->role=$role;
                $this->auth->session_key=$key;
                $this->auth->refrence_id = $stdparent->id;
                $this->auth->save();
                $_SESSION['auth']=$this->auth->toArray();
            }
            break;
            case teacher:
            $teacher = Teacher:: where('email',$uname)->where('password',$pass)->first();
            if($teacher!=null){
                $sucess = true;
                $this->auth = new Auth();
                $this->auth->role=$role;
                $this->auth->session_key=$key;
                $this->auth->refrence_id = $teacher->id;
                $this->auth->save();
                $_SESSION['auth']=$this->auth->toArray();
            }
            break;
            default:
                $sucess=false;
                break;
        }

        return $sucess;
    }

    public function getUser(){
        if($this->isLoged()){
            switch ($this->auth->role) {
                case student:
                    $std = Student::where('id',$this->auth->refrence_id)->first();
                    return $std;
                    break;
                case studentparent:
                    $stdparent = Studentparent::where('id',$this->auth->refrence_id)->first();
                    return $stdparent;
                    break;
                case teacher:
                    $teacher = Teacher::where('id', $this->auth->refrence_id)->first();
                    return $teacher;
                default:
                    return null;
                    break;
            }
        }else{
            return null;
        }
    }

    public function role($role){
        if($this->isLoged()){
            if($this->auth->role==$role){
                return true;
            }
        }
        return false;
    }

    public function loadAuth($session_key){
        $this->auth=Auth::where('session_key',$session_key)->first();
        if($this->auth==null){
            return false;
        }else{
            return true;
        }
    }
    public function getAuth(){
        return $this->auth;
    }

    public function setCaptcha(){
        $time=$time_milli = (int) round(microtime(true) * 100000); 
        $_SESSION['cap']=substr($time,-5);
    }

    public function isCaptcha($input){
        if(isset($_SESSION['cap'])){
            $cap=$_SESSION['cap'];
            unset($_SESSION['cap']);
            return $cap==$input;
        }else{
            return false;
        }
    }
}