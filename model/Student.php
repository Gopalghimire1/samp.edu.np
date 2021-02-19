<?php

namespace Models;

use Illuminate\Database\Eloquent\Model as Eloquent;

class Student extends Eloquent
{
    protected $fillable = [
        'id', 'name', 'level_id', 'classroom_id', 'studentparent_id', 'roll', 'adress', 'email', 'password', 'isarchived', 'created_at', 'updated_at', 'phone',
        "symbolno",
        "dob_bs",
        "dob_ad",
        "gender",
        "fathername",
        "mothername",
        "province",
        "mun",
        "muntype",
        "wardno",
        "religion",
        "caste",
        "name_dev",
        "isregisterd",
        "photo",
        "district"
    ];

    public function getAdmissionParent(){
        if($this->fathername==null){
            return $this->mothername;
        }
        return $this->fathername;
    }

    public function getaddress(){
        return $this->mun." ward no ".$this->wardno.", ".$this->district.", ".$this->province;
    }
    public function fillForms(){
        $data=[];
        foreach (\Models\Openadmission::where('enabled',1)->get() as $openadmission) {
            if(!$this->hasFilled($openadmission->id)){
                array_push($data,$openadmission);
            }
        }
        return $data;
    }


    public function getAdmissions(){
        return \Models\Admission::where('student_id', $this->id)->get();

    }
    public function admissions(){
        return \Models\Admission::where('student_id', $this->id)->count()>0;

    }

    Public function hasFilled($id){
      
        return \Models\Admission::where('student_id', $this->id)->where('openadmission_id',$id)->whereNotIn('status', [2])->count()>0;

    }

    public function uploads(){
        return \Models\Studentupload::where('student_id', $this->id)->get();
    }

    

    public function academics()
    {
        return \Models\Studentacademic::where('student_id', $this->id)->get();
    }

    public function academicsRender(){
        $academics=$this->academics();
        $str="";
        foreach ($academics as  $value) {
            $str.=$value->getRow();

        }
        return $str;
    }
    public function level()
    {
        return \Models\Level::where('id', $this->level_id)->first();
    }
    public function classroom()
    {
        return \Models\Classroom::where('id', $this->classroom_id)->first();
    }
    public function studentparent()
    {
        return \Models\Studentparent::where('id', $this->studentparent_id)->first();
    }
    public function Results()
    {

        return $this->hasMany('Models\Result');
    }
    public function Studentinboxes()
    {
        return $this->hasMany('Models\Studentinbox');
    }
    public function Bill()
    {
        return $this->hasMany('Models\Bill');
    }
    public function AttendanceOverview()
    {
        $total = \Models\Attendance::where('student_id', $this->id)->count();
        $attended = \Models\Attendance::where('student_id', $this->id)->where('att', 1)->count();
        $absent = \Models\Attendance::where('student_id', $this->id)->where('att', 0)->count();
        return [$total, $attended, $absent];
    }

    public function resultOverview()
    {
        $rc = new \Controllers\ResultViwer($this->id);
        $result = $rc->get();
        $maxper = 0;
        $passed = 0;
        $failed = 0;
        $maxmarks = 0;
        $maxmarksub = [];
        $absentexams = 0;
        foreach ($result as $key => $exam) {
            foreach ($exam['result'] as $subs) {
                if ($subs['marks'] != "Absent") {
                    $absentexams += 1;
                } else {
                    if ($maxmarks < $subs['marks']) {
                        $maxmarksub = $subs;
                        $maxmarks = $subs['marks'];
                    }
                }
            }

            if ($exam['summary']['percentage'] != "NA") {
                if ($exam['summary']['percentage'] > $maxper) {
                    $maxper = $exam['summary']['percentage'];
                }
                $passed += 1;
            } else {
                $failed += 1;
            }
        }
        $total = $passed + $failed;
        return [$result, $total, $passed, $failed, $maxper, $maxmarks, $maxmarksub, $absentexams];
    }
    public function Parentfees()
    {
        return $this->hasMany('Models\Parentfee');
    }
}
