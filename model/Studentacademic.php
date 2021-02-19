<?php

namespace Models;

use Illuminate\Database\Eloquent\Model as Eloquent;

class Studentacademic extends Eloquent
{
    protected $fillable = [
        'id',
        "title",
        "org_name",
        "org_phone",
        "org_type",
        "passedyear",
        "symbolno",
        "e_gpa",
        "m_gpa",
        "s_gpa",
        "gpa",
        "division",
        "marks",
        "percentage",
        "student_id",
        "type","orf_address"
    ];

    public function getRow(){
        $str="<tr>";
        $str.="<td rowspan='2' >".$this->title."<br> <a href='/student/academic/del/".$this->id."/' class='btn btn-danger'>Delete</a></td>";
        $str.="<td rowspan='2'>".$this->org_name.",<br>".$this->orf_address.",<br>".$this->org_phone.",<br>".$this->org_type.",</td>";
        $str.="<td rowspan='2'>".$this->passedyear."</td>";
        $str.="<td rowspan='2'>".$this->symbolno."</td>";
        
        if($this->type==0){
            $str.="<td>Division</td>";
            $str.="<td>Total Marks</td>";
            $str.="<td> Percentage</td>";
            $str.="<td></td>";
        }else{

            $str.="<td>English</td>";
            $str.="<td>Math</td>";
            $str.="<td>Science</td>";
            $str.="<td>GPA</td>";
        }
        
        $str.="</tr><tr>";
        if($this->type==0){
            $str.="<td>". $this->division."</td>";
            $str.="<td>".$this->marks."</td>";
            $str.="<td>".$this->percentage."</td>";
            $str.="<td></td>";
            
        }else{

            $str.="<td>".$this->e_gpa."</td>";
            $str.="<td>".$this->m_gpa."</td>";
            $str.="<td>".$this->s_gpa."</td>";
            $str.="<td>".$this->gpa."</td>";

        }
        $str.="</tr>";
        return $str;

    }
}
