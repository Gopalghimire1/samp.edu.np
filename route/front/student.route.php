<?php

use Models\Note;
use \Controllers\ResultViwer;
use Models\Admission;
use Models\Mockquestion;
use Models\Student;
use Models\Studentacademic;
use Models\Studentupload;

$app->group('/student', function ($app) use ($Views) {

    //admission form fill up
    $app->get('/academics/', function ($request,  $response) use ($Views) {
        $std=$this->auth->getUser();

        echo $Views->make('studentpanel.academics',['student'=>$std]);
    });

    $app->post("/academic/add/",function ($request,  $response) use ($Views) {
        $data=$request->getParsedBody();
        $data['student_id']=$this->auth->getAuth()->refrence_id;
    
        Studentacademic::create($data);
        return $response->withRedirect('/student/academics/');
    });
    $app->get("/academic/del/{id}/",function ($request,  $response,$vars) use ($Views) {
        $data=$request->getParsedBody();
       $academic=Studentacademic::find($vars['id']);
       $academic->delete();
        return $response->withRedirect('/student/academics/');
    });

    $app->get('/uploads/', function ($request,  $response) use ($Views) {
        $std=$this->auth->getUser();

        echo $Views->make('studentpanel.uploads',['student'=>$std]);
    });

    $app->post('/upload/add/',function ($request,  $response) use ($Views) {
        $std=$this->auth->getUser();
        $data=$request->getParsedBody();
        $image=$request->getUploadedFiles()['image'];
        $imagename=time()."_".$image->getClientFilename();
        $image->moveTo("assets/img/student/".$imagename);
        $data['file']=$imagename;
        $data['student_id']=$std->id;
        
        Studentupload::create($data);
        return $response->withRedirect('/student/uploads/');

    });
    $app->get("/upload/del/{id}/",function ($request,  $response,$vars) use ($Views) {
        $data=$request->getParsedBody();
       $upload=Studentupload::find($vars['id']);
       $upload->delete();
        return $response->withRedirect('/student/uploads/');
    });


    $app->get('/admission/', function ($request,  $response) use ($Views) {
        $std=$this->auth->getUser();

        echo $Views->make('studentpanel.admission',['student'=>$std]);
    });

    $app->post('/admission/add/',function ($request,  $response) use ($Views) {
        $std=$this->auth->getUser();
        $data=$request->getParsedBody();
        $image=$request->getUploadedFiles()['image'];
        $imagename=time()."_".$image->getClientFilename();
        $image->moveTo("assets/img/student/".$imagename);
        $data['voucher']=$imagename;
        $data['student_id']=$std->id;
        $data['status']=0;
        
        Admission::create($data);
        return $response->withRedirect('/student/admission/');

    });
    $app->get("/admission/del/{id}/",function ($request,  $response,$vars) use ($Views) {
        $data=$request->getParsedBody();
       $upload=Studentupload::find($vars['id']);
       $upload->delete();
        return $response->withRedirect('/student/uploads/');
    });



    //end admission form fillup
    $app->get('/', function ($request,  $response) use ($Views) {
        echo $Views->make('studentpanel.dashboard', ['student' => $this->auth->getUser()]);
    });
    $app->get('/result/', function ($request,  $response) use ($Views) {
        // print_r($this->auth->getUser());
        $student = $this->auth->getUser();
        $resultviwer = new ResultViwer($student->id);
        $results = $resultviwer->get();
        echo $Views->make('studentpanel.result', ['results' => $results, 'student' => $student]);
    });
    $app->get('/notes/', function ($request, $response) use ($Views) {
        $note = Note::all();
        echo $Views->make('studentpanel.note', ['notes' => $note]);
    });

    $app->get('/mocktest/', function ($request, $response) use ($Views) {
        echo $Views->make('studentpanel.mocktest', ['mockquestion' => Mockquestion::all()]);
    });

    $app->post('/changepassword/', function ($request,  $response, $args) use ($Views) {
        $std = $this->auth->getUser();
        $pc = Models\Student::where('id', $std->id)->first();
        $parsed = $request->getParsedBody();
        $oldpass = md5($parsed['oldpass']);
        $newpass = md5($parsed['newpass']);
        if ($oldpass == $pc->password) {
            $pc->password = $newpass;
            $pc->save();
            $_SESSION['successchangepass'] = "Password changed";
        } else {
            $_SESSION['errorchangepass'] = "Wrong password";
        }
        return $response->withRedirect("/student/");
    });
})->add(function ($request, $response, $next) {
    if ($this->auth->isLoged()) {
        if ($this->auth->role(student)) {
            return $next($request, $response);
        }
    }
    return $response->withRedirect("/login/");
});

$app->get('/student/logout/', function ($request,  $response) use ($Views) {
    unset($_SESSION['auth']);
    return $response->withRedirect('/');
});

$app->get('/student/register/', function ($request,  $response) use ($Views) {
    $this->auth->setCaptcha();
    if(isset($_SESSION['error'])){
        $var=['error'=>$_SESSION['error'],'old'=>$_SESSION['old']];
        unset($_SESSION['error']);
        unset($_SESSION['old']);
        
        echo $Views->make('front.students.register',$var);

    }else{

        echo $Views->make('front.students.register');
    }
});

$app->get('/student/register-nepali/', function ($request,  $response) use ($Views) {

    if(isset($_SESSION['error'])){
        $var=['error'=>$_SESSION['error'],'old'=>$_SESSION['old']];
        unset($_SESSION['error']);
        unset($_SESSION['old']);

        echo $Views->make('front.students.register',);

    }else{

    }
    echo $Views->make('front.students.register');
});

$app->post('/student/save/', function ($request,  $response) use ($Views) {
   
    $error=[];
    $data=$request->getParsedBody();
  
    if(!($this->auth->isCaptcha($data['captcha']))){
        array_push($error,"Wrong Captcha");
    }

    $image=$request->getUploadedFiles()['image'];
    $imagename=time()."_".$image->getClientFilename();
    $image->moveTo("assets/img/student/".$imagename);
    $data['photo']=$imagename;
    if($data['name']==""){
        array_push($error,"Please Enter Fullname");
    }

    if($data['fathername']=="" && $data['mothername']==""){
        array_push($error,"Please Enter at least one of Father name or Mother name");

    }

    if($data['gender']=="" || $data['caste']==""|| $data['religion']=="" ){
        array_push($error,"Please Enter Gender, Cast, religion Correctly");

    }

    if($data['province']=="" || $data['district']=="" || $data['mun']=="" || $data['wardno']==""|| $data['phone']=="" || $data['email']==""){
        array_push($error,"Please Enter Address / Contact info properly Correctly");
    }
    
    if($data['password']!=$data['repassword']){
        array_push($error,"Passwords Do not match");
    }

   
    if(count($error)==0){
       
        $data['password']=md5($data['password']);
        $std=Student::create($data);
        $this->auth->login(student,$std->email,$std->password);
//         if(){
//             echo "done";
//         }else{
// echo "not done";
//         }
        return $response->withRedirect('/student/academics/');
    }else{
        $_SESSION['error']=$error;
        $_SESSION['old']=$data;
        return $response->withRedirect('/student/register/');


    }

});

$app->get('/captcha/', function ($request, $response) {
    if ($_SESSION['cap']) {
        $im = imagecreate(50, 20);
        // White background and blue text
        $bg = imagecolorallocate($im, 255, 255, 255);
        $textcolor = imagecolorallocate($im, 0, 0, 255);
        // Write the string at the top left
        imagestring($im, 5, 0, 0, $_SESSION['cap'], $textcolor);
        // Output the image
        header('Content-type: image/png');
        imagepng($im);
        imagedestroy($im);
    }
});


