<?php
use \Controllers\ResultViwer;
use \Controllers\ParentController;
// $app->get('/parent/', function ($request,  $response) use($Views) {
//     print_r($this->auth->getUser());
//     // echo $Views->make('parentpanel.dashboard');
// });

// $app->group("/student",function($app)use($Views){
//     $app->get('/', function ($request,  $response) use($Views) {
//         echo $Views->make('studentpanel.dashboard',['student'=>$this->auth->getUser()]);
//     });
//     $app->get('/result/', function ($request,  $response) use($Views) {
//         $student=$this->auth->getUser();
//         $resultviwer=new ResultViwer($student->id);
//         $results =$resultviwer->get();
//         echo $Views->make('studentpanel.result',['results'=>$results,'student'=>$student]);
        
//     });
// })->add(function($request,$response,$next){
//     if($this->auth->isLoged()){
//         if($this->auth->role(student)){
//             return $next($request,$response);
//         }
//     }
//     return $response->withRedirect("/");
// });

$app->group("/parent",function($app)use($Views){
    $app->get('/', function ($request,  $response) use($Views) {
          echo $Views->make('parentpanel.dashboard',['parent'=>$this->auth->getUser()]);
        });
        $app->get('/result/', function ($request,  $response) use($Views) {
                    $parent=$this->auth->getUser();
                    $pc=new ParentController($parent->id);
                    if($pc->studentCount()==1){
                        $student_id=$pc->students[0]->id;
                        $resultviwer=new ResultViwer($student_id);
                        $results =$resultviwer->get();
                        echo $Views->make('parentpanel.result',['results'=>$results]);
                    }else{
                        echo $Views->make('parentpanel.studentselect',['type'=>1,'students'=>$pc->students]);  
                    }
        });
        $app->get('/attendance/', function ($request,  $response) use($Views) {
            $parent=$this->auth->getUser();
            $pc=new ParentController($parent->id);
            if($pc->studentCount()==1){
                $student_id=$pc->students[0]->id;
                echo $Views->make('parentpanel.attendence',['student_id'=>$student_id]);
            }else{
                echo $Views->make('parentpanel.studentselect',['type'=>2,'students'=>$pc->students]);  
            }
        });
        $app->get('/result/student/{id}/', function ($request,  $response,$args) use($Views) {
            $resultviwer=new ResultViwer($args['id']);
            $results =$resultviwer->get();
            echo $Views->make('parentpanel.result',['results'=>$results]);
        });
        
        $app->get('/attendance/student/{id}/', function ($request,  $response,$args) use($Views) {  
            echo $Views->make('parentpanel.attendence',['student_id'=>$args['id']]); 
        });

        // $app->get('/attendance/student/{id}/', function ($request,  $response,$args) use($Views) {  
        //     echo $Views->make('parentpanel.attendence',['student_id'=>$args['id']]); 
        // });
        $app->get('/fees/', function ($request,  $response,$args) use($Views) {  
            $parent=$this->auth->getUser();
            $pc=new ParentController($parent->id);
            echo $Views->make('parentpanel.fee',['pc'=>$pc]);
        });
        $app->post('/changepassword/',function ($request,  $response,$args){
            $parent=$this->auth->getUser();
            
            $pc=new ParentController($parent->id);
            $parsed=$request->getParsedBody();
            $oldpass=md5($parsed['oldpass']);
            $newpass=md5($parsed['newpass']);
            if($oldpass==$pc->parent->password){
                $pc->parent->password=$newpass;
                $pc->parent->save();
                $_SESSION['successchangepass']="Password changed";
            }else{
                $_SESSION['errorchangepass']="Wrong password";
            }
            return $response->withRedirect("/parent/");
        });

        $app->get('/notifications/',function ($request,  $response,$args)use($Views){
            $parent=$this->auth->getUser();
            echo $Views->make('parentpanel.notification',['parent'=>$parent]) ;          
        });

        $app->get('/notifications/count/',function ($request,  $response,$args)use($Views){
            $count=ParentController::countUnreadMessage($this->auth->getUser()->id);
            return   $response->withJson(new Callback(['unread'=>$count]));
        });

})->add(function($request,$response,$next){
        if($this->auth->isLoged()){
            if($this->auth->role(studentparent)){
                return $next($request,$response);
            }else{

                return $response->withRedirect("/");
            }
        }else{
            return $response->withRedirect("/login/");
        }
    });

    $app->get('/parent/logout/', function ($request,  $response) use($Views) {
        unset($_SESSION['auth']);
        return $response->withRedirect('/');
    });




// $app->get('/parent/result/student/0/', function ($request,  $response) use($Views) {
//     $resultviwer=new ResultViwer(5);
//     $results =$resultviwer->get();
//     //e
//     echo $Views->make('parentpanel.result',['results'=>$results]);
// });

